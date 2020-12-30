<div>
    @include('partials.nav-without-count')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                API Endpoints
            </div>

            <div class="card-body">
                <h3>Removed products</h3>
                <p>This will get all removed products in the database</p>
                <p>/api/removed</p>

                <h3>Removed products by date range</h3>
                <p>This will get removed products by date range: hour, day, month, year</p>
                <p>Example:<br />
                /api/removed/hour<br />
                /api/removed/day<br />
                /api/removed/month<br />
                /api/removed/year</p>

                <h3>Removed by date and product name</h3>
                <p>use a date range and product name to get more refined data</p>
                <p>/api/removed/{range}/name/{product}<br /><br />
                Example:<br />
                    /api/removed/year/name/icetea
                </p>

                <h3>Removed products by product name</h3>
                <p>Get all removed products by just there product name</p>
                <p>/api/removed/name/{product}<br /><br />
                    Example:<br />
                    /api/removed/name/icetea
                </p>
            </div>
        </div>
    </div>
</div>
