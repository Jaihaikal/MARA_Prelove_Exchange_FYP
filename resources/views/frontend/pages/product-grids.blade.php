@extends('frontend.layouts.master')

@section('title', 'E-SHOP || PRODUCT PAGE')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Shop Grid</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <form id="shop-filter-form" action="{{ route('shop.filter') }}" method="POST">
        @csrf<section class="product-area shop-sidebar shop section">

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="shop-sidebar">
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Categories</h3>
                                <ul class="categor-list">
                                    @php
                                        $menu = App\Models\Category::getAllParentWithChild();
                                    @endphp
                                    @if ($menu)
                                        @foreach ($menu as $cat_info)
                                            <li class="has-dropdown">
                                                <a
                                                    href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                                                @if ($cat_info->brands->count() > 0)
                                                    <ul class="sub-category">
                                                        @foreach($cat_info->child_cat as $sub_menu)
                                                            <li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>                                                        
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
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
                                            $max = DB::table('products')->max('price');
                                            // dd($max);
                                        @endphp
                                        <div id="slider-range" data-min="0" data-max="{{ $max }}"></div>
                                        <div class="product_filter" style="margin-top: 10px;">
                                            <button type="submit" class="filter_button" style="margin-top: 10px;">Filter</button>
                                            <div class="label-input" style="margin-top: 10px;">
                                                <span>Range:</span>
                                                <input style="" type="text" id="amount" readonly />
                                                <input type="hidden" name="price_range" id="price_range"
                                                    value="@if (!empty($_GET['price'])) {{ $_GET['price'] }} @endif" />
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
                                @foreach ($recent_products as $product)
                                    <!-- Single Post -->
                                    @php
                                        $photo = explode(',', $product->photo);
                                    @endphp
                                    <div class="single-post first">
                                        <div class="image">
                                            <img src="{{ $photo[0] }}" alt="{{ $photo[0] }}" >
                                        </div>
                                        <div class="content">
                                            <h5><a
                                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                            </h5>
                                            @php
                                                $org = $product->price - ($product->price * $product->discount) / 100;
                                            @endphp
                                            <p class="price"><del
                                                    class="text-muted">${{ number_format($product->price, 2) }}</del>
                                                ${{ number_format($org, 2) }} </p>

                                        </div>
                                    </div>
                                    <!-- End Single Post -->
                                @endforeach
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget category">
                                <h3 class="title">Brands</h3>
                                <input type="text" id="searchBrand" onkeyup="filterBrands()" placeholder="Search for brands..." class="form-control mb-3">
                                
                                <div class="brand-slider-container">
                                    <ul id="brandList" class="categor-list">
                                        @php
                                            $brands = DB::table('brands')
                                                ->orderBy('title', 'ASC')
                                                ->where('status', 'active')
                                                ->get();
                                        @endphp
                                        @foreach ($brands as $brand)
                                            <li class="brand-item">
                                                <a href="{{ route('product-brand', $brand->slug) }}">{{ $brand->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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
                                                <option value="title" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'title') selected @endif>
                                                    Name</option>
                                                <option value="price" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'price') selected @endif>
                                                    Price</option>
                                                <option value="category" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'category') selected @endif>
                                                    Category</option>
                                                <option value="brand" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'brand') selected @endif>
                                                    Brand</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>
                                <!--/ End Shop Top -->
                            </div>
                        </div>
                        <div class="row" id="product-grid">
                            {{-- {{$products}} --}}
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('product-detail', $product->slug) }}">
                                                    @php
                                                        $photo = $product->photo ? explode(',', $product->photo) : [];
                                                    @endphp
                                                    <div class="image-wrapper">
                                                        @if (!empty($photo[0]))
                                                            <img class="product-image" src="{{ $photo[0] }}"
                                                                alt="Product Image">
                                                        @else
                                                            <div class="blank-frame"></div>
                                                        @endif
                                                    </div>
                                                    @if ($product->discount)
                                                        <span class="price-dec">{{ $product->discount }} % Off</span>
                                                    @endif
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action mr-4">
                                                        {{-- <a data-toggle="modal" data-target="#{{ $product->id }}"
                                                            title="Quick View" href="#"><i
                                                                class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                                        <a title="Wishlist"
                                                            href="{{ route('add-to-wishlist', $product->slug) }}"
                                                            class="wishlist" data-id="{{ $product->id }}"><i
                                                                class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a title="Add to cart"
                                                            href="{{ route('add-to-cart', $product->slug) }}">Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a
                                                        href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                                                </h3>
                                                @php
                                                    $after_discount =
                                                        $product->price - ($product->price * $product->discount) / 100;
                                                @endphp
                                                <span>${{ number_format($after_discount, 2) }}</span>

                                                @if ($product->discount && $product->discount > 0)
                                                    <del
                                                        style="padding-left:4%;">${{ number_format($product->price, 2) }}</del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                            @endif
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
    <!--/ End Product Style 1  -->

    <!-- Modal -->
    @if ($products)
        @foreach ($products as $key => $product)
            <div class="modal fade" id="{{ $product->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                    <div class="product-gallery">
                                        <div class="quickview-slider-active">
                                            @php
                                                $photo = explode(',', $product->photo);
                                                // dd($photo);
                                            @endphp
                                            @foreach ($photo as $data)
                                                <div class="single-slider">
                                                    <img src="{{ $data }}" alt="{{ $data }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{ $product->title }}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                        <i class="yellow fa fa-star"></i>
                                                        <i class="yellow fa fa-star"></i>
                                                        <i class="yellow fa fa-star"></i>
                                                        <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->avg('rate');
                                                        $rate_count = DB::table('product_reviews')
                                                            ->where('product_id', $product->id)
                                                            ->count();
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($rate >= $i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{ $rate_count }} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if ($product->stock > 0)
                                                    <span><i class="fa fa-check-circle-o"></i> {{ $product->stock }} in
                                                        stock</span>
                                                @else
                                                    <span><i class="fa fa-times-circle-o text-danger"></i>
                                                        {{ $product->stock }} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount =
                                                $product->price - ($product->price * $product->discount) / 100;
                                        @endphp
                                        <h3><small><del
                                                    class="text-muted">${{ number_format($product->price, 2) }}</del></small>
                                            ${{ number_format($after_discount, 2) }} </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        <div class="quickview-peragraph">
                                            <p><strong>Username:</strong> {{ $product->user->name ?? 'N/A' }}</p>
                                            <p><strong>ID:</strong> {{ $product->user->student_id }}</p </div>
                                            @if ($product->size)
                                                <div class="size">
                                                    <h4>Size</h4>
                                                    <ul>
                                                        @php
                                                            $sizes = explode(',', $product->size);
                                                            // dd($sizes);
                                                        @endphp
                                                        @foreach ($sizes as $size)
                                                            <li><a href="#" class="one">{{ $size }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form action="{{ route('single-add-to-cart') }}" method="POST">
                                                @csrf

                                                <div class="add-to-cart mt-4">
                                                    <button type="submit" class="btn">Add to cart</button>
                                                    <a href="{{ route('add-to-wishlist', $product->slug) }}"
                                                        class="btn min"><i class="ti-heart"></i></a>
                                                </div>
                                            </form>
                                            <div class="default-social">
                                                <!-- ShareThis BEGIN -->
                                                <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
    <!-- Modal end -->

@endsection
@push('styles')
    <style>
        
        /* Pagination Container */
        .pagination {
            display: inline-flex;
        }

        ul.pagination {
            display: flex;
            gap: 8px;
            /* Space between buttons */
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Pagination Links */
        ul.pagination li a {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #ddd;
            /* Light border */
            border-radius: 4px;
            text-decoration: none;
            color: #333;
            /* Neutral text color */
            font-size: 14px;
            transition: all 0.2s ease;
        }

        /* Active Pagination Link */
        ul.pagination li.active span {
            background-color: #F7941D;
            /* Highlight color */
            color: white;
            border: 1px solid #F7941D;
            border-radius: 4px;
            padding: 8px 12px;
        }

        /* Hover State for Links */
        ul.pagination li a:hover {
            background-color: #f0f0f0;
            /* Subtle hover effect */
            border-color: #F7941D;
            color: #F7941D;
        }

        /* Disable Links */
        ul.pagination li.disabled span {
            color: #999;
            /* Light gray for disabled links */
            cursor: not-allowed;
        }

        .single-product {
            border: 1px solid #e0e0e0;
            /* Subtle border */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            overflow: hidden;
            /* Ensures no overflow with rounded corners */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animation for hover */
            background-color: #fff;
            /* Optional: White background */
        }

        .single-product:hover {
            transform: translateY(-5px);
            /* Slight lift effect on hover */
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
            /* Increase shadow on hover */
        }

        .single-product .product-img img {
            border-radius: 8px 8px 0 0;
            /* Round top corners for images */
        }

        .product-content {
            padding: 15px;
            /* Add padding for content */
            text-align: center;
            /* Center-align content (optional) */
        }

        .brand-slider-container {
    max-height: 300px; /* Set a maximum height for the container */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 10px 0;
}

/* Style the list of brands */
.categor-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

/* Style individual brand items */
#searchBrand {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <script>
        $(document).ready(function() {
            /*----------------------------------------------------*/
            /*  Jquery Ui slider js
            /*----------------------------------------------------*/
            if ($("#slider-range").length > 0) {
                const max_value = parseInt($("#slider-range").data('max')) || 500;
                const min_value = parseInt($("#slider-range").data('min')) || 0;
                const currency = $("#slider-range").data('currency') || '';
                let price_range = min_value + '-' + max_value;
                if ($("#price_range").length > 0 && $("#price_range").val()) {
                    price_range = $("#price_range").val().trim();
                }

                let price = price_range.split('-');
                $("#slider-range").slider({
                    range: true,
                    min: min_value,
                    max: max_value,
                    values: price,
                    slide: function(event, ui) {
                        $("#amount").val(currency + ui.values[0] + " -  " + currency + ui.values[1]);
                        $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                    }
                });
            }
            if ($("#amount").length > 0) {
                const m_currency = $("#slider-range").data('currency') || '';
                $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                    "  -  " + m_currency + $("#slider-range").slider("values", 1));
            }
        })

        function filterBrands() {
    const input = document.getElementById('searchBrand');
    const filter = input.value.toLowerCase();
    const brandList = document.getElementById('brandList');
    const brands = brandList.getElementsByTagName('li');
    
    // Loop through all list items and hide those that don't match the search
    Array.from(brands).forEach(function(brand) {
        const brandName = brand.textContent || brand.innerText;
        if (brandName.toLowerCase().indexOf(filter) > -1) {
            brand.style.display = "";
        } else {
            brand.style.display = "none";
        }
    });
}
    </script>
@endpush
