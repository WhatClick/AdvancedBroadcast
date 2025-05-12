<?php

namespace AdvancedBroadcast;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\scheduler\TaskScheduler;

use AdvancedBroadcast\command\BroadcastCommand;
use AdvancedBroadcast\task\BroadcastTask;
use AdvancedBroadcast\config\ConfigManager;

class Main extends PluginBase {
    use SingletonTrait;

    private $configManager;

    protected function onEnable(): void {
        self::setInstance($this);
        $this->saveResource("config.yml");
        $this->configManager = new ConfigManager($this);
        $this->configManager->loadConfig();

        $this->getServer()->getCommandMap()->register("broadcast", new BroadcastCommand());
        $interval = $this->getConfig()->get("interval", 300);
        $this->getScheduler()->scheduleRepeatingTask(new BroadcastTask(), $interval * 20);
    }

    public function getConfigManager(): ConfigManager {
        return $this->configManager;
    }
}
