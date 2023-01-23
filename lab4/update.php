<?php
$id=$_GET['id'];

$dom = new DOMDocument();
$dom->load('files/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$i=0;
$my_product=$product->item(1);
while (is_object($product->item($i++))){
    $prd=$product->item($i-1)->getElementsByTagName('id')->item(0);
    $prd_id= $prd->nodeValue;
    if( $prd_id== $id){
        $my_product = $product->item($i-1);
        break;
    }
}
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_prd = $dom->createElement('product');

    $node_id = $dom->createElement('id',$id);
    $new_prd->appendChild($node_id);

    $node_name = $dom->createElement('name',$prd_name);
    $new_prd->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_prd->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_prd->appendChild($node_description);
    $i=0;
    while (is_object($product->item($i++))){
        $prd=$product->item($i-1)->getElementsByTagName('id')->item(0);
        $prd_id= $prd->nodeValue;
        if( $prd_id== $id){
            $products->replaceChild($new_prd,$product->item($i-1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('files/data.xml')or die('Error');
    header('location: index.php?page_layout=list');
}
?>

<div class = "prod-content">
    <div class = "content-name">
        <h1>HOME</h1>
    </div>
    <div class = "prod-list">
        <form method = "POST" enctype="multipart/form-data">
            <div class = "items">
                <label for = "upd">Name</label>
                <textarea id = "upd" rows="1" name = "name" class="form-control" required><?php echo $get_to_upd['name']?></textarea>
            </div>
            <div class = "items">
                <label for = "upd">Price</label>
                <textarea id = "upd" rows="1" name = "price" class="form-control" required><?php echo $get_to_upd['price']?></textarea>
            </div>
            <div class = "items">
                <label for = "upd">Description</label>
                <textarea id = "upd" rows="3" name = "description" class="form-control" required><?php echo $get_to_upd['description']?></textarea>
            </div>
            <button name = "submit" type = "submit">Save</button>
        </form>
    </div>
</div>