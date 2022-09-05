
<html>


    <head>
  <link rel="stylesheet" href="./resources/css/style.css">
</head>



<div class="container">
  <h1 class="text-center">Transaction Page </h1>
  <hr>
 
  <div class="d-flex w-100 justify-content-end">
        <a href="/admin/transactions/add" class="btn btn-success">Add Transaction</a>
    </div>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">item_id</th>
        <th scope="col">quantity </th>
        <th scope="col">total </th>
     
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($data->transactions as $transaction) : ?>
         
            <tr>
            <td><?= $transaction->id ?></td>
            <td><?= $transaction->item_id ?></td>
            <td><?= $transaction->quantity ?></td>
            <td><?= $transaction->total ?></td>
            <td><?= $transaction->created_at ?></td>
            <td><?= $transaction->updated_at ?></td>
        
            <td class="d-flex">
              <a href="/admin/transactions/single?id=<?= $transaction->id ?>" class="mx-1 btn btn-primary btn-sm">
                <i class="fa-solid fa-eye"></i>
              </a>
              <a href="/admin/transactions/edit?id=<?= $transaction->id ?>" class="btn btn-warning btn-sm mx-1">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
             
              <form action="/admin/transactions/delete" method="post" class="mx-1">
                <input type="hidden" name="user_id" value="<?= $transaction->id ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
            </tr>
         
        <?php endforeach; ?>
     
    </tbody>
  </table>
</div>
</html>