<?php

namespace app\core;

class Cookie 
{
    private $name;
    private $value;
    private $time;
    private $secure = false;
    
    public const KEY_COOKIE = "fa53b91ccc1b78668d5af58e1ed3a485";
    public const TIME_COOKIE = 3600 * 24 * 30;

    public function __construct() {}

    public static function exists($key)
    {
		return (isset($_COOKIE[$key]));
	}   

    public function create($name, $value, $time, $secure) 
    {
        $this->name = $name;
        $this->value = $value;
        $this->time = $time;
        $this->secure = $secure;
        return setcookie($name, $value, $time, $secure);
    }

    public function destroy()
    {
        return setcookie($this->name, null, 0, $this->secure);
    }

    public function get()
    {
        return $_COOKIE[$this->name];
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function getTime()
    {
        return $this->time;
    }
}