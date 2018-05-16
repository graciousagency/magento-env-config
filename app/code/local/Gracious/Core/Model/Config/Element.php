<?php

/**
 * Class Gracious_Core_Model_Config_Element
 */
class Gracious_Core_Model_Config_Element extends Mage_Core_Model_Config_Element
{

    /**
     * @param null $value
     *
     * @return array|bool|false|null|string
     */
    public function xmlentities($value = null)
    {

        $value = \trim(parent::xmlentities($value));
        if (\substr($value, 0, 1) !== "$") {
            return $value;
        }
        $defaultCharPos = \strpos($value, '||');
        if ($defaultCharPos == false) {
            return \trim(\getenv(\substr($value, 1)));
        }
        $envValue = \getenv(\substr($value, 1, $defaultCharPos - 1));
        if ($envValue) {
            return \trim($envValue);
        }
        return \trim(\substr($value, $defaultCharPos + 2));
    }
}
