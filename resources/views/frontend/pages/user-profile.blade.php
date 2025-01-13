@extends('frontend.layouts.master')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    {{-- <meta name="description" content="{{$product_detail->summary}}"> --}}
    {{-- <meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}"> --}}
    {{-- <meta property="og:description" content="{{$product_detail->description}}"> --}}
@endsection
@section('title', 'E-SHOP || PRODUCT DETAIL')
@section('main-content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">User Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop single section">
        <div class="container">
            <div class="row align-items-start">
                <!-- User Details Section -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ $user->photo ?? 'https://via.placeholder.com/150' }}" alt="Profile Picture"
                                class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                            <h4 class="mt-3">{{ $user->name }}</h4>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
                            <p><strong>Student ID:</strong> {{ $user->student_id ?? 'Not Provided' }}</p>
                            <p><strong>Faculty:</strong> {{ $user->faculty_id ?? 'Not Provided' }}</p>
                        </div>
                    </div>
                </div>
        
                <!-- Products Section -->
                <div class="col-md-8">
                    <div class="row">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-12 mb-4">
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
                                                    <a data-toggle="modal" data-target="#{{ $product->id }}"
                                                        title="Quick View" href="#"><i class="ti-eye"></i><span>Quick Shop</span></a>
                                                    <a title="Wishlist"
                                                        href="{{ route('add-to-wishlist', $product->slug) }}"
                                                        class="wishlist" data-id="{{ $product->id }}"><i
                                                            class="ti-heart "></i><span>Add to Wishlist</span></a>
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
                                                $after_discount = $product->price - ($product->price * $product->discount) / 100;
                                            @endphp
                                            <span>${{ number_format($after_discount, 2) }}</span>
        
                                            @if ($product->discount && $product->discount > 0)
                                                <del style="padding-left:4%;">${{ number_format($product->price, 2) }}</del>
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
   

@endsection
