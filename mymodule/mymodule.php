<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MyModule extends Module
{
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Luk    imperinetti';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('My module', [], 'Modules.Mymodule.Admin');
        $this->description = $this->trans('Description of my module.', [], 'Modules.Mymodule.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Mymodule.Admin');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->trans('No name provided', [], 'Modules.Mymodule.Admin');
        }
    }

    /**
     * Install the module && register the hooks
     */
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        return (
            parent::install() 
            && Configuration::updateValue('MYMODULE_NAME', 'my module')
            && $this->registerHook('displayProductButtons')
            && $this->registerHook('displayCustomerAccount')
        ); 
    }

    /**
     * Uninstall the module && unregister the hooks
     */
    public function uninstall()
    {
        return (
            parent::uninstall() 
            && Configuration::deleteByName('MYMODULE_NAME')
            && $this->unregisterHook('displayProductButtons')
            && $this->unregisterHook('displayCustomerAccount')
        );
    }


    //Hooks

    /**
     * Hook that displays a button on the product page
     */
    public function hookDisplayProductButtons($params)
    {
        $this->context->smarty->assign([
            'product_id' => $params['product']['id_product'],
            'wishlist_link' => $this->context->link->getModuleLink('mymodule', 'wishlist', [])
        ]);

        return $this->display(__FILE__, 'wishlist_button.tpl');
    }

    /**
     * Hook that displays a link in the customer account page
     */
    public function hookDisplayCustomerAccount($params)
    {
        return $this->context->smarty->fetch($this->local_path.'views/templates/front/wishlist_link.tpl');
    }
}
