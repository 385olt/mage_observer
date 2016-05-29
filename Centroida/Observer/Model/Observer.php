<?php
class Centroida_Observer_Model_Observer {

    public function execute($observer) {
        
        $sku = $observer->getSku();
        
        Mage::log($sku . " was saved!");
        
        $product = Mage::getModel('catalog/product');
        $product->load($product->getIdBySku($sku));
        
        if (!$product->getWebsite()) {
            if (Mage::app()->isSingleStoreMode()) {
                $product->setWebsiteIds(array(Mage::app()->getStore(true)->getWebsite()->getId()));
            }
            
            
            Mage::log((string)$product->getId() . " with name " . $product->getName() . "\n");
            $product->save(); 
        }
        
    }

}
?>