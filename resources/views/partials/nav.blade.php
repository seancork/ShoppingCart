<div class="bs-example">
    <nav class="navbar navbar-expand-md" style="background-color: #e3f2fd;">
        <a href="#" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('api') }}" class="nav-item nav-link">API</a>
            </div>

            <div class="navbar-nav">
                <a href="{{ url('cart') }}" class="btn btn-info" role="button">🛒 Amount: {{ $total }}</a>
            </div>
        </div>
    </nav>
</div>
