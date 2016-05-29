<?php
class Centroida_Observer_Model_Observer {

    public function execute($observer) {
        
        Mage::log($observer);
        Mage::log('We just made an Observer!');
    
    }

}
?>