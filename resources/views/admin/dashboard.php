<div class="container">
    <h1 class="text-center"><?= $data->site_title; ?></h1>
    <p class="text-center"><?= $data->site_slogan; ?></p>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <p class="card-text"><?= $data->Transactions_count ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Item Number</h5>
                    <p class="card-text"> <?= $data->items_count ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Five Expensive Items To Buy</h5>
                    <p class="card-text"></p>
                 
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text"><?= $data->users_count ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

