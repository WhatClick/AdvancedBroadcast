<?php

namespace AdvancedBroadcast\task;

use pocketmine\scheduler\Task;
use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;

use AdvancedBroadcast\Main;
use AdvancedBroadcast\utils\MessageFormatter;

class BroadcastTask extends Task {
    use SingletonTrait;

    /** @var array<string, bool> */
    private array $optedOut = [];

    public function __construct() {
        self::setInstance($this);
    }

    public function onRun(): void {
        $config = Main::getInstance()->getConfig();
        $messages = $config->get("messages", []);
        if (empty($messages)) return;
        $message = MessageFormatter::getInstance()->format($messages[array_rand($messages)]);
        foreach (Main::getInstance()->getServer()->getOnlinePlayers() as $player) {
            if (!$this->isOptedOut($player)) {
                $player->sendMessage($message);
            }
        }
    }

    public function toggleOpt(Player $player): bool {
        $name = strtolower($player->getName());
        $this->optedOut[$name] = !$this->isOptedOut($player);
        return $this->optedOut[$name];
    }

    public function isOptedOut(Player $player): bool {
        return $this->optedOut[strtolower($player->getName())] ?? false;
    }
}
