<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];

    //insert in ps_wishlist
    $sql = "INSERT INTO "._DB_PREFIX_."envie (id_customer, id_product) VALUES (".$this->context->customer->id.", ".$productId.")";
    Db::getInstance()->execute($sql);
    echo "Product added to wishlist";
    exit;
    
}