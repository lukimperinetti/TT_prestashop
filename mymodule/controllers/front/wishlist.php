<?php
class MymodulewishlistModuleFrontController extends ModuleFrontController
{
    public function displayAjaxAdd()
{
    try {
        $productId = Tools::getValue('product_id');
        Db::getInstance()->insert('envie', array(
            'id_product' => pSQL($productId),
            'id_customer' => (int)$this->context->customer->id,
            // Add other product information here
        ));
        die(json_encode(array('success' => true)));
    } catch (Exception $e) {
        die(json_encode(array('success' => false, 'error' => $e->getMessage())));
    }
}
}