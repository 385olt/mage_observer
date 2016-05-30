<?php
class Centroida_Observer_Model_Observer {

    public function product_save($observer) {
        
        $sku = $observer->getSku();
        
        $product = Mage::getModel('catalog/product');
        $product->load($product->getIdBySku($sku));
        
        if (!$product->getWebsite()) {
            if (Mage::app()->isSingleStoreMode()) {
                $product->setWebsiteIds(array(Mage::app()->getStore(true)->getWebsite()->getId()));
            }
            
            $product->save();
            
            Mage::log((string)$product->getId() . " with name " . $product->getName() . " was set website\n");
        }
        
    }
    
    public function image_upload($observer) {
        
        $sku = $observer->getSku();
        $image_url = $observer->getImage();
        
        $product = Mage::getModel('catalog/product');
        $product->load($product->getIdBySku($sku));
        
        if ($image_url) {
            $product->setImage($image_url)
                ->setSmallImage($image_url)
                ->setThumbnail($image_url)
                ->save();
        
            Mage::log((string)$product->getId() . " with name " . $product->getName() . " was fixed image\n");
        }
        
    }

}
?>