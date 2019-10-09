<?php

namespace Core\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command{
    protected $name = "start";
    protected $description = "Start command to get you started";

    public function handle(){
        $this->replyWithMessage([
            "text" => "Hello! Welcome to our bot!"
        ]);

        $this->triggerCommand("help");
    }
}