<?php

namespace Core\Model;

use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class UpdatesHandler{

    private $telegram;

    public function __construct(Api $telegram, $updates)
    {
        $this->telegram = $telegram;
    }

    private function handleAll($updates){
        foreach($updates as $update)
            $this->handleOne($update);
    }

    private function handleOne(Update $update){

        $type = $update->getMessage()->entities["type"];

        if(!$type != "bot_command"){
            $this->telegram->sendMessage([
                "chat_id" => $update->getChat()->id,
                "text" => $update->getMessage()->text
            ]);
        }
    }
}