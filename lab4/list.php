<?php
$doc = new DOMDocument();
$doc -> load('product.xml');
$products = $doc -> getElementsByTagName('products') -> item(0);
?>

<div class = "prod-content">
    <div class = "content-name">
        <h1>Home</h1>
    </div>
    <div class = "prod-list" style="align-items: center">
        <table class = "table">
            <thead>
            <tr>
                <th>№</th>
                <th>Name</th>
                <th>Price (usd)</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php $cnt = 0;
            $product = $products -> getElementsByTagName('product');
            while (is_object($product -> item($cnt ++))){
                ?>
                <tr>
                    <td><?php echo $cnt?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('name') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('price') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('descr') -> item(0) -> nodeValue?></td>
                    <td><a href="index.php?page_layout=update&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>">Edit</a></td>
                    <td><a onclick="return confirmation('<?php echo $product->item($cnt-1)->getElementsByTagName('name')->item(0)->nodeValue;?>')" href= "index.php?page_layout=delete&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Delete</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <a href="index.php?page_layout=create" >
            Add new products
        </a>

    </div>
</div>

<script>
    function confirmation(name){
        return confirm("are you sure delete this cours\""+name+"\"?");
    }
</script>