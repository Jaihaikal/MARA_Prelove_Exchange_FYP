<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['cat_info', 'sub_cat_info']);
        // return $products;
        return view('backend.product.index')->with('products', $products);
    }

    // retreive data for product-dataTables
    public function getProductsData(Request $request)
    {
        $query = Product::with(['cat_info', 'sub_cat_info']);

        return DataTables::of($query)
            ->addColumn('category', function ($product) {
                $category = $product->cat_info ? $product->cat_info->title : 'N/A';
                $subCategory = $product->sub_cat_info ? $product->sub_cat_info->title : 'N/A';
                return $category . ' / ' . $subCategory;  // Combine category and sub-category
            })
            ->addColumn('is_featured', function ($product) {
                return $product->is_featured ? 'Yes' : 'No';
            })
            ->addColumn('add_by', function ($product) {
                return $product->user_id ? $product->user->name : 'N/A';
            })
            ->addColumn('photo', function ($product) {
                if ($product->photo) {
                    $photo = explode(',', $product->photo)[0];
                    return '<img src="' . asset($photo) . '" class="img-fluid zoom" style="max-width:80px" alt="Product Photo">';
                } else {
                    return '<img src="' . asset('backend/img/thumbnail-default.jpg') . '" class="img-fluid" style="max-width:80px" alt="Default Avatar">';
                }
            })
            ->addColumn('action', function ($product) {
                return '
                    <a href="' . route('product.edit', $product->id) . '" class="btn btn-sm btn-primary" style="margin: 5px;" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="' . route('product.destroy', $product->id) . '" style="display: inline;" class="deleteForm">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="button" class="btn btn-danger btn-sm dltBtn" data-name="' . $product->title . '" style="margin: 5px; height:30px; width:30px; border-radius:50%;" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    ';
            })

            //filter search
            ->filterColumn('category', function ($query, $keyword) {
                $query->whereHas('cat_info', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                })->orWhereHas('sub_cat_info', function ($query) use ($keyword) {
                    $query->where('title', 'like', "%$keyword%");
                });
            })
            ->filterColumn('add_by', function ($query, $keyword) {
                $query->whereHas('user', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                });
            })

            ->rawColumns(['action']) // Allow raw HTML for action column
            ->orderColumn('category', function ($query, $order) {
                $query->join('categories', 'categories.id', '=', 'products.cat_id')
                    ->orderBy('categories.title', $order);
            })
            ->orderColumn('add_by', function ($query, $order) {
                $query->join('users', 'users.id', '=', 'products.user_id')
                    ->orderBy('users.name', $order);
            })
            ->rawColumns(['photo', 'action']) // Allows HTML in these columns
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::where('is_parent', 1)->get();
        // return $category;
        return view('backend.product.create')->with('categories', $category)->with('brands', $brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $this->validate($request, [
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'string|nullable',
            'photo' => 'required|string|',
            // 'size'=>'nullable',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,used',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ], [], [
            // Custom attribute names
            'cat_id' => 'category',
            'child_cat_id' => 'subcategory',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id(); // Automatically set the current user's ID

        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        $data['is_featured'] = $request->input('is_featured', 0);
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }
        // return $size;
        // return $data;
        $status = Product::create($data);
        if ($status) {
            request()->session()->flash('success', 'Product Successfully added');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::get();
        $product = Product::findOrFail($id);
        $category = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();

        return view('backend.product.edit')//+
            ->with('product', $product)//+
            ->with('brands', $brand)
            ->with('categories', $category)
            ->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'string|required',
            'size' => 'nullable',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric'
        ], [], [
            // Custom attribute names
            'cat_id' => 'category',
            'child_cat_id' => 'subcategory',
            // Add other custom names as needed
        ]);

        $data = $request->all();
        $data['is_featured'] = $request->input('is_featured', 0);
        $size = $request->input('size');
        if ($size) {
            $data['size'] = implode(',', $size);
        } else {
            $data['size'] = '';
        }
        // return $data;
        $status = $product->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Product Successfully updated');
            return redirect()->route('product.index');

        } else {
            request()->session()->flash('error', 'Please try again!!');
            return redirect()->route('product.edit', $id);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        if ($status) {
            request()->session()->flash('success', 'Product successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting product');
        }
        return redirect()->route('product.index');
    }



}
