<?php

namespace RCCPMV2\MX\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function RCCPMV2Types();
    
    public static function RCCPMV2Formats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
