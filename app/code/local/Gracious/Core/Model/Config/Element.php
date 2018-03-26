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

        $value = parent::xmlentities($value);
        if (substr($value, 0, 1) !== "$") {
            return $value;
        }
        $defaultCharPos = strpos($value, '||');
        if ($defaultCharPos == false) {
            return getenv(substr($value, 1));
        }
        $envVarName = substr($value, 1, $defaultCharPos - 1);
        if ($envValue = getenv($envVarName)) {
            return $envValue;
        }
        return substr($value, $defaultCharPos + 2);
    }
}
