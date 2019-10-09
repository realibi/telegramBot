<?php

use Core\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Methods\Update;

class App{
    public function __construct()
    {
        Telegram::eachUpdate(function (\Telegram\Bot\Objects\Update $update){
            $chat_id = $update->getMessage()["chat"]["id"];
            $text = $update->getMessage()["text"];

            Telegram::sendMessage($chat_id, $text);
        });
    }
}