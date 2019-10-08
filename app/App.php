<?php

use Core\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Methods\Update;

class App{
    public function __construct()
    {
        Telegram::eachUpdate(function (\Telegram\Bot\Objects\Update $update){
           var_dump($update->getMessage());

           echo "<br/>";
           echo "<br/>";
        });
    }
}