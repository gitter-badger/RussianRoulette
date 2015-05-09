<?php

namespace RussianRoulette\Main;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

class Main extends PluginBase {
	
  public function onEnable() {
    $this->saveDefaultConfig();
  }

  public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
    if(strtolower($command->getName()) == "bang") {
      if(!($sender->hasPermission("russianroulette") || $sender->hasPermission("russianroulette.command") || $sender->hasPermission("russianroulette.command.bang"))) {
      return false;
    }
      $chambers = $this->getConfig()->get("Chambers");
      if($chambers < 2) {
        $sender->sendMessage("Not enough chambers.");
        $this->getLogger()->warning("Not enough chambers.");
        return true;
      }
      if(mt_rand(1,$chambers) == 1) {
        $sender->kill();
        $sender->sendMessage("Unlucky...");
      } else {
        $sender->sendMessage("You got lucky...");
      }
    }
    return true;
  }
}
