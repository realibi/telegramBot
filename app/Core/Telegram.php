<?php

namespace Core;

use Core\Commands\HelpCommand;
use Core\Commands\StartCommand;
use Models\Tables\Updates;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class Telegram{
    private static $instance;

    private function __construct()
    {
        self::$instance = new Api("741381921:AAE3odJ1p1yzepZVjykdR6s8HSQ-R24jXwg");

        self::$instance->addCommands([StartCommand::class, HelpCommand::class]);
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

        $update_id = Updates::max("id");

        foreach(self::getUpdates([
            "offset" => $update_id + 1
        ]) as $update){

            self::$instance->commandsHandler(false);

            Updates::insert([
                "id" => $update["update_id"]
            ]);

            if($update->getMessage()["text"][0] != "/")
                call_user_func($callback, $update);
        }
    }

    static function sendMessage($chat_id, $message){
        return self::$instance->sendMessage([
            "chat_id"=>$chat_id,
            "text"=>$message
        ]);
    }
}