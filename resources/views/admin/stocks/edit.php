


<div class="container">
    <h1 class="text-center">Edit Stocks</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/stocks/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="Item-name" class="form-label">Item-name:</label>
            <input type="text" name="name" class="form-control" id="Item-name" value="<?= $data->item->name?>">
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">cost:</label>
            <input type="text" name="cost" class="form-control" id="cost" value="<?= $data->item->cost?>">
        </div>
        <div class="mb-3">
            <label for="selling-price" class="form-label">selling-price:</label>
            <input type="text" name="selling-price" class="form-control" id="selling-price"  value="<?= $data->item->selling_price?>">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">	stock available quantity:</label>
            <input type="quantity" name="quantity" class="form-control" id="quantity" value="<?= $data->item->quantity ?>">
        </div>
        <div class="mb-3">
            <label for="created-at" class="form-label">	created-at:</label>
            <input type="date" name="created-at" class="form-control" id="created-at" value="<?= $data->item->created_at ?>">
        </div>
        <div class="mb-3">
            <label for="updated-at " class="form-label">updated-at:</label>
            <input type="date" name="quantity" class="form-control" id="updated-at " value="<?= $data->item->updated_at ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="/admin/stocks " class="btn btn-danger my-3">Cancel</a>

</div>