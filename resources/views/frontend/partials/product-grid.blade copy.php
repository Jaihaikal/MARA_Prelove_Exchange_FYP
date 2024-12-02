<form id="filterForm" action="{{ route('shop.filter') }}" method="POST">
    @csrf
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Categories</h3>
                                <ul class="categor-list">
                                    @php
                                        // $category = new Category();
                                        $menu=App\Models\Category::getAllParentWithChild();
                                    @endphp
                                    @if($menu)
                                    <li>
                                        @foreach($menu as $cat_info)
                                                @if($cat_info->child_cat->count()>0)
                                                    <li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                                        <ul>
                                                            @foreach($cat_info->child_cat as $sub_menu)
                                                                <li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
                                                @endif
                                        @endforeach
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Shop By Price -->
                                <div class="single-widget range">
                                    <h3 class="title">Shop by Price</h3>
                                    <div class="price-filter">
                                        <div class="price-filter-inner">
                                            @php
                                                $max=DB::table('products')->max('price');
                                                // dd($max);
                                            @endphp
                                            <div id="slider-range" data-min="0" data-max="{{$max}}"></div>
                                            <div class="product_filter">
                                            <button type="submit" class="filter_button">Filter</button>
                                            <div class="label-input">
                                                <span>Range:</span>
                                                <input style="" type="text" id="amount" readonly/>
                                                <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--/ End Shop By Price -->
                            <!-- Single Widget -->
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                {{-- {{dd($recent_products)}} --}}
                                @foreach($recent_products as $product)
                                    <!-- Single Post -->
                                    @php
                                        $photo=explode(',',$product->photo);
                                    @endphp
                                    <div class="single-post first">
                                        <div class="image">
                                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        </div>
                                        <div class="content">
                                            <h5><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h5>
                                            @php
                                                $org=($product->price-($product->price*$product->discount)/100);
                                            @endphp
                                            <p class="price"><del class="text-muted">${{number_format($product->price,2)}}</del>   ${{number_format($org,2)}}  </p>

                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                @endforeach
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Brands</h3>
                                <ul class="categor-list">
                                    @php
                                        $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                    @endphp
                                    @foreach($brands as $brand)
                                        <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>
                                            <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option>
                                            <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>
                                            <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-th-large"></i></a></li>
                                    <li><a href="{{route('product-lists')}}"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        {{-- {{$products}} --}}
                        @if(count($products)>0)
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-product border border-secondary rounded p-3 mb-3">
                                        <div class="product-img">
                                            <a href="{{route('product-detail',$product->slug)}}">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                @endphp
                                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                                @if($product->discount)
                                                            <span class="price-dec">{{$product->discount}} % Off</span>
                                                @endif
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                    <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" class="wishlist" data-id="{{$product->id}}"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                            @php
                                                $after_discount=($product->price-($product->price*$product->discount)/100);
                                            @endphp
                                            <span>${{number_format($after_discount,2)}}</span>
                                            <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                                <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                            {{$products->appends($_GET)->links()}}
                        </div>
                    </div>
                    

                </div>
                
            </div>
        </div>
    </section>
</form>

<script>
    $(document).ready(function () {
    $('#filterForm').on('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Serialize the form data
        let formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function (response) {
                // Replace the products container with the filtered results
                $('#filteredProducts').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');
            }
        });
    });
});

</script>
