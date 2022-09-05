<div class="container">
  <h1 class="text-center">Stock Page </h1>
  <hr>
  <div class="d-flex w-100 justify-content-end">
        <a href="/admin/stocks/add" class="btn btn-success">Add Item</a>
    </div>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Item-name</th>
        <th scope="col">cost </th>
        <th scope="col">selling-price </th>
        <th scope="col">stock available quantity</th>
        <th scope="col">created-at</th>
        <th scope="col">updated-at</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($data->items as $item) : ?>
          <?php if ($item->quantity > 0) : ?>
            <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->name ?></td>
            <td><?= $item->cost ?></td>
            <td><?= $item->selling_price ?></td>
            <td><?= $item->quantity ?></td>
            <td><?= $item->created_at ?></td>
            <td><?= $item->updated_at ?></td>
            <td class="d-flex">
              <a href="/admin/stocks/single?id=<?= $item->id ?>" class="mx-1 btn btn-primary btn-sm">
                <i class="fa-solid fa-eye"></i>
              </a>
              <a href="/admin/stocks/edit?id=<?= $item->id ?>" class="btn btn-warning btn-sm mx-1">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
             
              <form action="/admin/stocks/delete?id=<?= $item->id ?>" method="post" class="mx-1">
                <input type="hidden" name="name" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
            </tr>
          <?php endif ?>
        <?php endforeach; ?>
     
    </tbody>
  </table>
</div>