<?php

namespace Core;

use Core\Commands\HelpCommand;
use Core\Commands\StartCommand;
use Models\Tables\Updates;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class Telegram{
    private static $instance;

    private function __construct($cfg)
    {
        self::$instance = new Api($cfg["token"]);

        if(isset($cfg["commands"]))
            self::$instance->addCommands($cfg["commands"]);
    }

    static function init($cfg){
        if(!self::$instance instanceof Api)
            new self($cfg);
    }

    static function getUpdates(array $params = [], $shouldEmitEvents = true){
       return self::$instance->getUpdates($params, $shouldEmitEvents);
    }

    static function handle(){
        $updates = self::$instance->commandsHandler(false);
    }

    static function sendMessage($chat_id, $message){
        return self::$instance->sendMessage([
            "chat_id"=>$chat_id,
            "text"=>$message
        ]);
    }

    static function getLastUpdateId(){
        return file_get_contents(Config::telegram("update_id_file"));
    }

    static function setLastUpdateId($id){
        file_put_contents(Config::telegram("update_id_file"), $id);
    }
}