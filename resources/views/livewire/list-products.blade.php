<div class="row">
    @foreach($products as $product)
            <livewire:single-product :product="$product" :key="$loop->index" />
    @endforeach
</div>
