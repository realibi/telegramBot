<?php

namespace Core;

use Telegram\Bot\Api;

class Telegram{
    private static $instance;

    private function __construct()
    {
        if(!self::$instance instanceof Api)
            self::$instance = new Api("741381921:AAE3odJ1p1yzepZVjykdR6s8HSQ-R24jXwg");
    }

    private static function init(){
        if(!self::$instance instanceof Api)
            new self();
    }

    static function getUpdates(array $params = [], $shouldEmitEvents = true){
       self::init();
       return self::$instance->getUpdates($params, $shouldEmitEvents);
    }

    static function eachUpdate(callable $callback){
        foreach(self::getUpdates() as $update){
            call_user_func($callback, $update);
        }
    }
}