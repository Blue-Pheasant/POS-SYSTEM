<?php

namespace app\core;

class Cookie 
{
    private $name;
    private $value;
    private $time;
    // private $path;
    // private $domain;
    private $secure = false;
    
    public const KEY_COOKIE = "fa53b91ccc1b78668d5af58e1ed3a485";
    public const TIME_COOKIE = 3600 * 24 * 30;

    public function __construct($name, $value, $time, $secure)
    {
        $this->name = $name;
        $this->value = $value;
        $this->time = $time;
        $this->secure = $secure;
    }

    public static function exists($key)
    {
		return (isset($_COOKIE[$key]));
	}   

    public function create() 
    {
        return setcookie($this->name, $this->value, $this->time, $this->secure);
    }

    public function destroy()
    {
        return setcookie($this->name, null, 0, $this->secure);
    }

    public function get()
    {
        return $_COOKIE[$this->name];
    }
}