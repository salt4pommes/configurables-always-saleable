<?php

class Pommes_ConfigurablesAlwaysSaleable_Model_Observer {

    /**
     * @param $observer Varien_Event_Observer
     */
    public function catalogProductIsSalableAfter($observer) {

        /* Is this a configurable product? */
        if(strcmp($observer->getEvent()->getProduct()->getData('type_id'), "configurable") === 0) {

            /* Is this configurable product not salable? */
            if(strcmp($observer->getEvent()->getProduct()->getData('is_salable'), "0") === 0) {

                /* Lets make it salable! */
                $observer->getEvent()->getSalable()->setIsSalable(1);
            }
        }
    }

}

?>