Fixing product's website and image using observer.
Observer reacts to "rest_api_product_save" and "rest_api_image_upload".

# in app/code/core/Mage/Catalog/Model/Api2/Product/Rest/Admin/V1.php, method _create(...)
Mage::dispatchEvent('rest_api_product_save', array('sku' => $product->getSku()));

# in app/code/core/Mage/Catalog/Model/Api2/Product/Image/Rest/Admin/V1.php, method _create(...)
Mage::dispatchEvent('rest_api_image_upload', array('sku' => $product->getSku(), 'image' => $imageFileUri));