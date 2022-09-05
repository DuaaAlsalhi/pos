
       <div class="container text-left">
    <h1 class="text-center"><?= $data->item->name ?></h1>
    <hr>
    <div class="my-5 d-flex justify-content-end">
        <a href="/admin/stocks" class="mx-1 btn btn-primary btn-sm">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <a href="/admin/stocks/edit?id=<?= $data->item->id ?>" class="btn btn-warning btn-sm mx-1">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <form action="/admin/stocks/delete" method="post" class="mx-1">
            <input type="hidden" name="user_id" value="<?= $data->item->id ?>">
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
            </button>
       
       </form>
</div>

    <div class="my-3">
        <strong class="d-block">Item-name</strong>
        <?= $data->item->name?>
    </div>
    <div class="my-3">
        <strong class="d-block">cost</strong>
        <?= $data->item->cost ?>
    </div>
    <div class="my-3">
        <strong class="d-block">selling-price</strong>
        <?= $data->item->selling_price ?>
    </div>
   
    <div class="my-3">
        <strong class="d-block">stock available quantity</strong>
        <?= $data->item->quantity ?>
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