<?php

namespace AdvancedBroadcast\utils;

use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;

use AdvancedBroadcast\Main;

class MessageFormatter {
    use SingletonTrait;

    public function __construct() {
        self::setInstance($this);
    }

    public function format(string $message): string {
        $online = count(Main::getInstance()->getServer()->getOnlinePlayers());
        $players = Main::getInstance()->getServer()->getOnlinePlayers();
        $randomPlayer = $online > 0 ? $players[array_rand($players)]->getName() : "Nadie";
        $message = str_replace(
            ["{online}", "{player}"],
            [$online, $randomPlayer],
            $message
        );

        $message = preg_replace("/&([0-9a-fk-or])/i", "§$1", $message);
        return $message;
    }
}
