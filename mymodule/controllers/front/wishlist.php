<?php


/**
 * Controller for the wishlist module
 * store the product in the wishlist
 */
class MymodulewishlistModuleFrontController extends ModuleFrontController
{
    public function displayAjaxAdd()
    {
        try {
            $productId = Tools::getValue('product_id');
            $product = new Product((int)$productId);
            $price = $product->price;

            Db::getInstance()->insert('envie', array(
                'id_product' => pSQL($productId),
                'id_customer' => (int)$this->context->customer->id,
                'price' => pSQL($price),
            ));
            die(json_encode(array('success' => true)));
        } catch (Exception $e) {
            die(json_encode(array('success' => false, 'error' => $e->getMessage())));
        }
    }
    public function initContent()
    {
        parent::initContent();
    
        $sql = new DbQuery();
        $sql->select('*');
        $sql->from('envie');
        $wishlist = Db::getInstance()->executeS($sql);
    
        $this->context->smarty->assign('wishlist', $wishlist);
    
        $this->setTemplate('module:mymodule/views/templates/front/wishlist_page.tpl');
    }
}