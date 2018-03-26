<?php

/**
 * Class Mage_Core_Model_Config_Base
 */
class Mage_Core_Model_Config_Base extends Varien_Simplexml_Config
{

    /**
     * Mage_Core_Model_Config_Base constructor.
     *
     * @param null $sourceData
     */
    public function __construct($sourceData = null)
    {

        $this->_elementClass = 'Gracious_Core_Model_Config_Element';
        parent::__construct($sourceData);
        $this->sourceData = $sourceData;
    }
}
