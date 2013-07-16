<?php
/**
 * Class Pommes_ConfigurablesAlwaysSaleable_Block_Catalog_Product_View_Type_Configurable
 *
 * Rewrites getAllowProducts to also include non salable products in configurable product list
 */

class Pommes_ConfigurablesAlwaysSaleable_Block_Catalog_Product_View_Type_Configurable extends Mage_Catalog_Block_Product_View_Type_Configurable {

    public function getAllowProducts()
    {
        if (!$this->hasAllowProducts()) {
            $products = array();
            $allProducts = $this->getProduct()->getTypeInstance(true)
                ->getUsedProducts(null, $this->getProduct());
            foreach ($allProducts as $product) {
//                if ($product->isSaleable()) { // All Child-Products should be visible
                $products[] = $product;
//                }
            }
            $this->setAllowProducts($products);
        }
        return $this->getData('allow_products');
    }
}