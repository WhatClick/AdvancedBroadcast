<?php

namespace AdvancedBroadcast\config;

use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;

class ConfigManager {
    private $plugin;
    private $config;

    public function __construct(PluginBase $plugin) {
        $this->plugin = $plugin;
        $this->loadConfig();
    }

    public function loadConfig() {
        $this->config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML);
    }

    public function saveConfig() {
        $this->config->save();
    }

    public function getConfig() {
        return $this->config->getAll();
    }

    public function get($key, $default = null) {
        return $this->config->get($key, $default);
    }

    public function set($key, $value) {
        $this->config->set($key, $value);
        $this->saveConfig();
    }
}
