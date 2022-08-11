<div>
    <p>Search</p>
    <form method="post" action="/products/search" enctype="multipart/form-data" >
    @csrf  
        <input type="text" name="search" id="search">
        <button type="submit" name="test">Zoeken</button>
    </form>
</div>