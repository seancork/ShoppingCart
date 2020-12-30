<div x-data="{amount: 1}">
    <div class="d-flex">
        <div wire:model="amountToAdd">
            <button class="btn btn-secondary" @click="amount = Math.max(1, amount - 1); $dispatch('input', amount);">-</button>
            <button class="btn btn-secondary" x-html="amount" @click="promptForAmount('Please enter your quantity', (newAmount) => {amount = Math.max(1, newAmount)}); $dispatch('input', amount);"></button>
            <button class="btn btn-secondary" @click="amount = amount + 1; $dispatch('input', amount);">+</button>
        </div>
        <button class="ml-auto btn btn-primary" wire:click="addToCart()" wire:loading.attr="disabled" @click="amount = 1" wire:target="amountToAdd, addToCart">
            Add to cart (${{ number_format($price, 2) }})
        </button>
    </div>
</div>
