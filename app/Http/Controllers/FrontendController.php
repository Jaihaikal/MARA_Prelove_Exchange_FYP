<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use PayPal;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


use App\Services\CollaborativeFilteringService;
use App\Models\UserProductInteraction;

use App\Models\Faculty;
class FrontendController extends Controller
{
   
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    //collaborative filtering
    protected $cfService;

    public function __construct(CollaborativeFilteringService $cfService)
    {
        $this->cfService = $cfService;
    }

    public function home()
    {

        $featured = Product::where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();
        $posts = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        $banners = Banner::where('status', 'active')->limit(3)->orderBy('id', 'DESC')->get();
        $products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $category = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();

        $userId = Auth::id();

        $recommended_products = collect(); // Initialize as an empty collection

        if ($userId) {
            $matrix = $this->cfService->getUserProductMatrix();
            $similarities = $this->cfService->calculateUserSimilarity($matrix);
            $recommendedProductIds = $this->cfService->getRecommendations($userId, $matrix, $similarities);

            // Fetch recommended products from the database
            $recommended_products = Product::whereIn('id', $recommendedProductIds)->get();
        }

        return view('frontend.index')
            ->with('featured', $featured)
            ->with('posts', $posts)
            ->with('banners', $banners)
            ->with('product_lists', $products)
            ->with('category_lists', $category)
            ->with('recommended_products', $recommended_products);

    }

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    // In ProductController or a specific service

    public function productDetail($slug)
    {
      
        $product_detail = Product::getProductBySlug($slug);
        // dd($product_detail);

        if (auth()->check()) { // Ensure the user is authenticated
            UserProductInteraction::updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_detail->id,
                    'interaction' => 'view'
                ],
                [
                    'weight' => DB::raw('weight + 1') // Increment the weight for repeated views
                ]
            );
            // dd(DB::getQueryLog());

        }
        return view('frontend.pages.product_detail')->with('product_detail', $product_detail);
    }

    public function productGrids()
    {
        // Base query
        $products = Product::query()->where('status', 'active');
        
        // Filters
        if (request()->has('category')) {
            $slug = explode(',', request('category'));
            $cat_ids = Category::whereIn('slug', $slug)->pluck('id');
            $products->whereIn('cat_id', $cat_ids);
        }
    
        if (request()->has('brand')) {
            $slugs = explode(',', request('brand'));
            $brand_ids = Brand::whereIn('slug', $slugs)->pluck('id');
            $products->whereIn('brand_id', $brand_ids);
        }
    
        if (request()->has('sortBy')) {
            switch (request('sortBy')) {
                case 'title':
                    $products->orderBy('title', 'ASC');
                    break;
                case 'price':
                    $products->orderBy('price', 'ASC');
                    break;
            }
        }
    
        if (request()->has('price')) {
            $price = explode('-', request('price'));
            if (count($price) === 2 && is_numeric($price[0]) && is_numeric($price[1])) {
                $products->whereBetween('price', [floor($price[0]), ceil($price[1])]);
            }
        }
    
        // Pagination
        $perPage = request('show', 21);
        $products = $products->paginate($perPage);
    
        // Recent products (only used for the initial load)
        $recent_products = Product::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
    
        // Check if the request is AJAX
        if (request()->ajax()) {
            return response()->json([
                'products' => view('frontend.partials.product-items', compact('products'))->render(),
            ]);
        }
    
        // Return the full view for non-AJAX requests
        return view('frontend.pages.product-grids', compact('products', 'recent_products'));
    }
    
    
    public function productLists(){
        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids)->paginate;
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(6);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }
    public function productSearch(Request $request){
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $products=Product::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }

    public function productBrand(Request $request){
        $products=Brand::getProductByBrand($request->slug);
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if ($products) {
            return view('frontend.pages.product-grids')
                ->with('products', $products) // Paginated products
                ->with('recent_products', $recent_products);
        }
        return redirect()->back()->with('error', 'Brand not found.');
    }
    public function productCat(Request $request)
    {
        // Get products related to the category, and paginate them
        $products = Category::getProductByCat($request->slug);
    
        // Paginate the products (if 'products' is a relationship, you can paginate it like this)
        $paginatedProducts = $products->products()->paginate(9); // Assuming 'products' is a relationship
    
        // Fetch recent products
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
    
        return view('frontend.pages.product-grids')
            ->with('products', $paginatedProducts)
            ->with('recent_products', $recent_products);
    }

    public function productSubCat(Request $request)
    {
        // Get the products related to the subcategory, and paginate them
        $products = Category::getProductBySubCat($request->sub_slug);

        // Check if sub_products is a relationship
        $paginatedSubProducts = $products->sub_products()->paginate(9); // Assuming sub_products is a relationship

        // Fetch recent products
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.pages.product-grids')
            ->with('products', $paginatedSubProducts)
            ->with('recent_products', $recent_products);
    }

    public function blog(){
        $post=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        // return $tagURL;
            // return $catURL;
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    }

    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password please try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register()
    {
        $faculties = Faculty::all();
        return view('frontend.pages.register', compact('faculties'))->withErrors(session('errors'));
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'student_id' => 'string|required|unique:users,student_id',
            'phone' => 'required|string|max:255|unique:users',
            'password'=>'required|min:6|confirmed',
            'faculty_id' => 'required|string',
        ]);
        $data=$request->all();
        // dd($data);
        
        if ( $this->create($data)) {
            request()->session()->flash('success', 'Successfully registered');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', value: 'Please try again!');
            return redirect()->route('register.form');
        }
 
    }

    public function registerUser(Request $request)
    {
        try{ 
        
            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'student_id' => 'required|string|unique:users,student_id',
                'phone' => 'required|string|max:255|unique:users',
                'faculty_id' => 'required|string',
            ]);

            // Create a new user with the validated data
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request['phone'],
                'faculty_id' => $request['faculty_id'],
                'student_id' => $request['student_id'],
                'status' => 'active',
            ]);

                return redirect()->route('home')->with('success', 'Registration successful! Welcome to the platform.');
            } catch (\Exception $e) {
                // Redirect back to the login page with an error message if registration fails
                return redirect()->route('register.form')->with('error', 'Registration failed. Please try again.');
            }
        }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'faculty_id' => $data['faculty_id'],
            'student_id' => $data['student_id'],
            'status' => 'active',

        ]);

        
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    public function SellerDetails(User $user)
    {
        // Fetch the seller's products
        $products = $user->products; // This uses the relationship defined in User model

        return view('seller.show', compact('user', 'products'));
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your email');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }

    public function showProfile($id)
    {
        // Fetch the user
        $user = User::findOrFail($id);

        // Fetch the user's products
        $products = Product::where('user_id', $id)
        ->where('status', 'active')
        ->paginate(12); // Add pagination here

        $products ->appends(request()->query());
        // Return the view
        return view('frontend.pages.user-profile', compact('user', 'products'));
    }



    public function filter(Request $request)
{
    $query = Product::query();

    // Apply filters based on the received request
    if ($request->has('price_range')) {
        $priceRange = explode(',', $request->price_range);
        $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
    }

    if ($request->has('sortBy')) {
        $sortBy = $request->sortBy;
        if ($sortBy == 'price') {
            $query->orderBy('price');
        } elseif ($sortBy == 'title') {
            $query->orderBy('title');
        } elseif ($sortBy == 'category') {
            $query->orderBy('category_id');  // Assuming category is a foreign key
        } elseif ($sortBy == 'brand') {
            $query->orderBy('brand_id');  // Assuming brand is a foreign key
        }
    }

    // Get filtered products
    $products = $query->get();

    // Return only the product grid partial to be replaced
    return view('partials.product-grid', compact('products'));
}

}
