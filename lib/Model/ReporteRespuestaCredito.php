<?php

namespace RCCPMV2\MX\Client\Model;

use \ArrayAccess;
use \RCCPMV2\MX\Client\ObjectSerializer;

class ReporteRespuestaCredito implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMV2ModelName = 'ReporteRespuesta_credito';
    
    protected static $RCCPMV2Types = [
        'cuentas_financieras' => '\RCCPMV2\MX\Client\Model\CuentasFinancierasRespuesta[]',
        'cuentas_comerciales' => '\RCCPMV2\MX\Client\Model\CuentasComercialesRespuesta[]'
    ];
    
    protected static $RCCPMV2Formats = [
        'cuentas_financieras' => null,
        'cuentas_comerciales' => null
    ];
    
    public static function RCCPMV2Types()
    {
        return self::$RCCPMV2Types;
    }
    
    public static function RCCPMV2Formats()
    {
        return self::$RCCPMV2Formats;
    }
    
    protected static $attributeMap = [
        'cuentas_financieras' => 'cuentasFinancieras',
        'cuentas_comerciales' => 'cuentasComerciales'
    ];
    
    protected static $setters = [
        'cuentas_financieras' => 'setCuentasFinancieras',
        'cuentas_comerciales' => 'setCuentasComerciales'
    ];
    
    protected static $getters = [
        'cuentas_financieras' => 'getCuentasFinancieras',
        'cuentas_comerciales' => 'getCuentasComerciales'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$RCCPMV2ModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getCuentasFinancieras()
    {
        return $this->container['cuentas_financieras'];
    }
    
    public function setCuentasFinancieras($cuentas_financieras)
    {
        $this->container['cuentas_financieras'] = $cuentas_financieras;
        return $this;
    }
    
    public function getCuentasComerciales()
    {
        return $this->container['cuentas_comerciales'];
    }
    
    public function setCuentasComerciales($cuentas_comerciales)
    {
        $this->container['cuentas_comerciales'] = $cuentas_comerciales;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
