<?php

namespace AdvancedBroadcast\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;

use AdvancedBroadcast\Main;
use AdvancedBroadcast\utils\MessageFormatter;

class BroadcastCommand extends Command {
    use SingletonTrait;

    public function __construct() {
        parent::__construct("broadcast", "Broadcast a message to all players", "/broadcast <message>", ["bc"]);
        self::setInstance($this);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if (!$sender->hasPermission("advancedbroadcast.command.broadcast")) {
            $sender->sendMessage("§cNo tienes permiso para usar este comando.");
            return false;
        }
        if (count($args) < 1) {
            $sender->sendMessage("§eUso: /broadcast <mensaje>");
            return false;
        }
        $message = MessageFormatter::getInstance()->format(implode(" ", $args));
        foreach (Main::getInstance()->getServer()->getOnlinePlayers() as $player) {
            if (!BroadcastTask::getInstance()->isOptedOut($player)) {
                $player->sendMessage($message);
            }
        }
        return true;
    }
}
