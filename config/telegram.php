<?php

use Core\Commands\HelpCommand;
use Core\Commands\StartCommand;
use Core\Helpers;

return [
    "token" => "741381921:AAE3odJ1p1yzepZVjykdR6s8HSQ-R24jXwg",
    "commands" => [
        StartCommand::class,
        HelpCommand::class
    ],
    "update_id_file" => Helpers::path("data", "update_id.txt")
];