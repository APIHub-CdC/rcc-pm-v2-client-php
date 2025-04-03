<?php

namespace RCCPMV2\MX\Client\Model;

use \ArrayAccess;
use \RCCPMV2\MX\Client\ObjectSerializer;

class DeclarativasRespuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMV2ModelName = 'DeclarativasRespuesta';
    
    protected static $RCCPMV2Types = [
        'declarativa' => 'string',
        'fecha_declarativa' => 'string'
    ];
    
    protected static $RCCPMV2Formats = [
        'declarativa' => null,
        'fecha_declarativa' => 'yyyy-MM-dd'
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
        'declarativa' => 'declarativa',
        'fecha_declarativa' => 'fechaDeclarativa'
    ];
    
    protected static $setters = [
        'declarativa' => 'setDeclarativa',
        'fecha_declarativa' => 'setFechaDeclarativa'
    ];
    
    protected static $getters = [
        'declarativa' => 'getDeclarativa',
        'fecha_declarativa' => 'getFechaDeclarativa'
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
    
    public function getDeclarativa()
    {
        return $this->container['declarativa'];
    }
    
    public function setDeclarativa($declarativa)
    {
        $this->container['declarativa'] = $declarativa;
        return $this;
    }
    
    public function getFechaDeclarativa()
    {
        return $this->container['fecha_declarativa'];
    }
    
    public function setFechaDeclarativa($fecha_declarativa)
    {
        $this->container['fecha_declarativa'] = $fecha_declarativa;
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
