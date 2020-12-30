<div>
    @include('partials.nav-without-count')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Your Cart
            </div>
            <div class="card-body">
                <div class="position-relative">
                    @if (count($cart) > 0)
                        @foreach($cart as $row)
                            <div class="p-1 d-flex">
                                <div class="flex-1">
                                    {{ $row['amount'] }} &times; {{ $row['product_name'] }}
                                    (${{ number_format($row['total_price'], 2) }})

                                    <a href="#" class="text-danger" wire:click="remove('{{ $row['id'] }}')">
                                        🗑️
                                    </a>
                                    <hr/>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center h3 mt-1">
                            Total Cost: ${{ number_format($total_price, 2) }}
                        </div>
                    @else
                        <p class="p-3 m-0 text-center">No items in your cart :(</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
