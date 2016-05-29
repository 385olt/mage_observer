observer reacts to "rest_api_product_save"

# in app/code/core/Mage/Catalog/Model/Api2/Product/Rest/Admin/V1.php, method _create(...)
Mage::dispatchEvent('rest_api_product_save', array('sku' => $product->getSku()));