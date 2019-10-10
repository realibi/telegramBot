<?php

use Core\Config;
use Core\Model\UpdatesHandler;
use Core\Telegram;
use Telegram\Bot\Api;
use Telegram\Bot\Methods\Update;

class App{
    public function __construct()
    {
//      Telegram::init(Config::telegram());
//
//      Telegram::handle();

        $cfg = Config::telegram();

        $api = new Api($cfg["token"]);
        $api->addCommands($cfg["commands"]);
        $updates = $api->commandsHandler();

        new UpdatesHandler($api, $updates);

    }
}