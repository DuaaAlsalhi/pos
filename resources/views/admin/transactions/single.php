

<div class="container text-left">
 
    <h1 class="text-center"> <?= $data->item->name?> </h1>
    <hr>
    <div class="my-5 d-flex justify-content-end">
        <a href="/admin/transactions" class="mx-1 btn btn-primary btn-sm">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <a href="/admin/transactions/edit?id=<?= $data->item->id ?>" class="btn btn-warning btn-sm mx-1">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <form action="/admin/transactions/delete" method="post" class="mx-1">
            <input type="hidden" name="user_id" value="<?= $data->item->id ?>">
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
  
    <div class="my-3">
        <strong class="d-block">quantity</strong>
        <?= $data->item->quantity ?>
    </div>
    <div class="my-3">
        <strong class="d-block">total</strong>
        <?= $data->item->total ?>
    </div>
    <div class="my-3">
        <strong class="d-block">created-at</strong>
        <?= $data->item->created_at ?>
    </div>
    <div class="my-3">
        <strong class="d-block">updated-at</strong>
        <?= $data->item->updated_at ?>
    </div>

</div>