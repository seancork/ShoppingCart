<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product['product_name'] }}</h5>
            <p class="card-text">{{ $product['description'] }}</p>

            <livewire:add-to-cart :productId="$product['id']"/>
        </div>
    </div>
    <hr class="vertical-spacer visible-xs">
</div>

