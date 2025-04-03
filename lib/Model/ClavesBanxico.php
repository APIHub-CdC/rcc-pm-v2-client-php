<?php

namespace RCCPMV2\MX\Client\Model;

use \ArrayAccess;
use \RCCPMV2\MX\Client\ObjectSerializer;

class ClavesBanxico implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMV2ModelName = 'ClavesBanxico';
    
    protected static $RCCPMV2Types = [
        'clave_banxico1' => 'string',
        'clave_banxico2' => 'string',
        'clave_banxico3' => 'string'
    ];
    
    protected static $RCCPMV2Formats = [
        'clave_banxico1' => null,
        'clave_banxico2' => null,
        'clave_banxico3' => null
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
        'clave_banxico1' => 'claveBanxico1',
        'clave_banxico2' => 'claveBanxico2',
        'clave_banxico3' => 'claveBanxico3'
    ];
    
    protected static $setters = [
        'clave_banxico1' => 'setClaveBanxico1',
        'clave_banxico2' => 'setClaveBanxico2',
        'clave_banxico3' => 'setClaveBanxico3'
    ];
    
    protected static $getters = [
        'clave_banxico1' => 'getClaveBanxico1',
        'clave_banxico2' => 'getClaveBanxico2',
        'clave_banxico3' => 'getClaveBanxico3'
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
        $this->container['clave_banxico1'] = isset($data['clave_banxico1']) ? $data['clave_banxico1'] : null;
        $this->container['clave_banxico2'] = isset($data['clave_banxico2']) ? $data['clave_banxico2'] : null;
        $this->container['clave_banxico3'] = isset($data['clave_banxico3']) ? $data['clave_banxico3'] : null;
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
    
    public function getClaveBanxico1()
    {
        return $this->container['clave_banxico1'];
    }
    
    public function setClaveBanxico1($clave_banxico1)
    {
        $this->container['clave_banxico1'] = $clave_banxico1;
        return $this;
    }
    
    public function getClaveBanxico2()
    {
        return $this->container['clave_banxico2'];
    }
    
    public function setClaveBanxico2($clave_banxico2)
    {
        $this->container['clave_banxico2'] = $clave_banxico2;
        return $this;
    }
    
    public function getClaveBanxico3()
    {
        return $this->container['clave_banxico3'];
    }
    
    public function setClaveBanxico3($clave_banxico3)
    {
        $this->container['clave_banxico3'] = $clave_banxico3;
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
