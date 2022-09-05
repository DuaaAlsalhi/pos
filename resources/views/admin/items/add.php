<div class="container">
    <h1 class="text-center">Add items</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/news/store">
        <div class="mb-3">
            <label for="itemName" class="form-label">Item:</label>
            <input type="text" name="title" class="form-control" id="itemName">
        </div>
        <div class="mb-3">
            <label for="itemPrice" class="form-label">Price</label>
            <textarea name="content" class="form-control" id="itemPrice" rows="10"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/news" class="btn btn-danger my-3">Cancel</a>

</div>