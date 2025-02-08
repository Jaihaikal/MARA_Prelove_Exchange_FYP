<div id="product-list" class="product-grid">
    @foreach($products as $product)
        <div class="product-item">
            <div class="product-image">
                <img src="{{ $product->image_url }}" alt="{{ $product->title }}">
            </div>
            <h3 class="product-title">{{ $product->title }}</h3>
            <p class="product-price">RM {{ $product->price }}</p>
            <a href="{{ route('product-detail', $product->id) }}" class="product-link">View Details</a>
        </div>
    @endforeach

    {{ $products->links() }} <!-- Pagination -->
</div>

{{ $products->links() }} <!-- For pagination -->

<style>
/* Product Grid Container */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

/* Product Item Card */
.product-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Hover Effect */
.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Product Image */
.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
    transition: transform 0.3s;
}

.product-item:hover .product-image img {
    transform: scale(1.05);
}

/* Product Title */
.product-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
}

/* Product Price */
.product-price {
    font-size: 1rem;
    color: #007bff;
    margin-bottom: 10px;
}

/* View Details Button */
.product-link {
    display: inline-block;
    padding: 8px 15px;
    font-size: 0.9rem;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.product-link:hover {
    background-color: #0056b3;
}

</style>
<script>
    $(document).ready(function () {
    // Trigger when a filter or sort option changes
    $('.filter, .sort, #show-per-page').on('change', function () {
        loadProducts();
    });

    // AJAX function to load products
    function loadProducts() {
        let filters = {
            category: $('#category-filter').val(),
            brand: $('#brand-filter').val(),
            sortBy: $('#sort-by').val(),
            price: $('#price-range').val(),
            show: $('#show-per-page').val(),
        };

        $.ajax({
            url: '/product-grids', // Adjust this URL to match your route
            method: 'GET',
            data: filters,
            success: function (response) {
                $('#product-list').html(response.products);
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    }
});

</script>