


<div class="container">
    <h1 class="text-center">Edit transactions</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/transactions/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="usersUsername" class="form-label">item_id:</label>
            <input type="text" name="item_id" class="form-control" id="	item_id" value="<?= $data->item->item_id ?>">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">quantity:</label>
            <input type="text" name="quantity" class="form-control" id="quantity" value="<?= $data->item->quantity ?>">
        </div>
        <div class="mb-3">
            <label for="usersPassword" class="form-label">	total:</label>
            <input type="total" name="total" class="form-control" id="total" value="<?= $data->item->total ?>">>
        </div>
        <div class="mb-3">
            <label for="usersDisplayName" class="form-label">created_at:</label>
            <input type="text" name="created_at" class="form-control" id="created_at" value="<?= $data->item->created_at ?>">
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">updated_at:</label>
            <input type="text" name="updated_at" class="form-control" id="updated_at" value="<?= $data->item->updated_at ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="/admin/users" class="btn btn-danger my-3">Cancel</a>

</div>