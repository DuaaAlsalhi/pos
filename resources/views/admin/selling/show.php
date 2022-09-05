<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>







<body>
          <table id="table_id" class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">item_id</th>
        <th scope="col">user_id </th>
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
            <td><?= $transaction->item_id ?></td>
            <td><?= $transaction->quantity ?></td>
            <td><?= $transaction->total ?></td>
            <td><?= $transaction->created_at ?></td>
            <td><?= $transaction->updated_at ?></td>
        
        
              </form>
            </td>
            </tr>
         
        <?php endforeach; ?>
     
    </tbody>
  </table>
</div>
</body>
</html>
