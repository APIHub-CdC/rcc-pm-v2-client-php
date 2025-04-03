<?php

namespace RCCPMV2\MX\Client\Model;

use \ArrayAccess;
use \RCCPMV2\MX\Client\ObjectSerializer;

class PersonaRespuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $RCCPMV2ModelName = 'PersonaRespuesta';
    
    protected static $RCCPMV2Types = [
        'rfc' => 'string',
        'nombre' => 'string',
        'nacionalidad' => 'string',
        'domicilio' => '\RCCPMV2\MX\Client\Model\PersonaRespuestaDomicilio'
    ];
    
    protected static $RCCPMV2Formats = [
        'rfc' => null,
        'nombre' => null,
        'nacionalidad' => null,
        'domicilio' => null
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
        'rfc' => 'RFC',
        'nombre' => 'nombre',
        'nacionalidad' => 'nacionalidad',
        'domicilio' => 'domicilio'
    ];
    
    protected static $setters = [
        'rfc' => 'setRfc',
        'nombre' => 'setNombre',
        'nacionalidad' => 'setNacionalidad',
        'domicilio' => 'setDomicilio'
    ];
    
    protected static $getters = [
        'rfc' => 'getRfc',
        'nombre' => 'getNombre',
        'nacionalidad' => 'getNacionalidad',
        'domicilio' => 'getDomicilio'
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
    
    public function getRfc()
    {
        return $this->container['rfc'];
    }
    
    public function setRfc($rfc)
    {
        $this->container['rfc'] = $rfc;
        return $this;
    }
    
    public function getNombre()
    {
        return $this->container['nombre'];
    }
    
    public function setNombre($nombre)
    {
        $this->container['nombre'] = $nombre;
        return $this;
    }
    
    public function getNacionalidad()
    {
        return $this->container['nacionalidad'];
    }
    
    public function setNacionalidad($nacionalidad)
    {
        $this->container['nacionalidad'] = $nacionalidad;
        return $this;
    }
    
    public function getDomicilio()
    {
        return $this->container['domicilio'];
    }
    
    public function setDomicilio($domicilio)
    {
        $this->container['domicilio'] = $domicilio;
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
