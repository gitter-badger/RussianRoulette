<?php

namespace RouletteRemake\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase {
	
  public function onEnable() {
    $this->saveDefaultConfig();
  }

  public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
    if(strtolower($command->getName()) == "bang") {
      $chambers = $this->getConfig()->get("Chambers");
      if(mt_rand(1,$chambers) == 1) {
        $sender->kill();
        $sender->sendMessage("Unlucky...");
        return true;
      }
      $sender->sendMessage("You got lucky...");
    }
  }
}
