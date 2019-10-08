<?php

use Telegram\Bot\Api;

class App{
    public function __construct()
    {
        $t = new Api("741381921:AAE3odJ1p1yzepZVjykdR6s8HSQ-R24jXwg");
        var_dump($t->getUpdates());
    }
}