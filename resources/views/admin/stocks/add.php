<div class="container">
    <h1 class="text-center">Add Stock</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/stocks/store">

  
        <div class="mb-3">
            <label for="itemname" class="form-label">Item Name:</label>
            <input type="text" name="item_name" class="form-control" id="itemname">
        </div>
        <div class="mb-3">
            <label for="Item" class="form-label">Quantity:</label>
            <input type="text" name="quantity" class="form-control" id="quantity">
        </div>
        <div class="mb-3">
            <label for="Item" class="form-label">Cost:</label>
            <input type="text" name="cost" class="form-control" id="cost">
        </div>
       
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/stocks" class="btn btn-danger my-3">Cancel</a>

</div>