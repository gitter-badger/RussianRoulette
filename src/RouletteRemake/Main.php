<?php

namespace RouletteRemake\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase{
	
	public function onEnable(){
		if(!file_exists($this->getDataFolder() . "config.yml")){
			@mkdir($this->getDataFolder());
			file_put_contents($this->getDataFolder() . "config.yml",$this->getResource("config.yml"));
		}
		$this->getLogger()->info(TextFormat::RED . "RouletteRemake enabled. Be carefull...");
	}
	public function onDisable(){
		$this->getLogget()->info(TextFormat::RED . "RouletteRemake disabled. You're safe, for now...");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if($command->getName() === "rr"){
			$chambers = $this->getConfig()->get('Chambers');
			if($chambers == 1){
				$sender->sendMessage("You don't have enough chambers!");
				$this->getLogger()->info(TextFormat::RED . "[RouletteRemake] You don't have enough chambers!");
			}elseif($chambers == 2){
				$chmb = array("1st", "2nd");
				if($sender instanceof Player){
					if($sender->hasPermission("roulette.command.rr")){
						$bullet = $chmb[array_rand($chmb)];
						if($bullet != $chmb[2]){
							$sender->sendMessage("You got lucky...");
						}elseif($bullet == $chmb[2]){
							$sender->setHealth(0);
							$sender->sendMessage("Unlucky...");
						}
					}
				}else{
					$sender->sendMessage("This command only works in-game!");
				}
			}elseif($chambers == 3){
				if($sender instanceof Player){
					if($sender->hasPermission("roulette.command.rr")){
						$chmb = array("1st", "2nd", "3rd");
						$bullet = $chmb[array_rand($chmb)];
						if($bullet != $chmb[2]){
							$sender->sendMessage("You got lucky...");
						}elseif($bullet == $chmb[2]){
							$sender->setHealth(0);
							$sender->sendMessage("Unlucky...");
						}
					}else{
						$sender->sendMessage("You don't have permission to do that!");
					}
				}else{
					$sender->sendMessage("This command only works in-game!");
				}
				
			}elseif($chambers == 4){
				if($sender instanceof Player){
					if($sender->hasPermission("roulette.command.rr")){
						$chmb = array("1st", "2nd", "3rd", "4th");
						$bullet = $chmb[array_rand($chmb)];
						if($bullet != $chmb[2]){
							$sender->sendMessage("You got lucky...");
						}elseif($bullet == $chmb[2]){
							$sender->setHealth(0);
							$sender->sendMessage("Unlucky...");
						}
					}else{
						$sender->sendMessage("You don't have permission to do that!");
					}
				}else{
					$sender->sendMessage("This command only works in-game!");
				}
			
				
			}elseif($chambers == 5){
				if($sender instanceof Player){
					if($sender->hasPermission("roulette.command.rr")){
						$chmb = array("1st", "2nd", "3rd", "4th", "5th");
						$bullet = $chmb[array_rand($chmb)];
						if($bullet != $chmb[2]){
							$sender->sendMessage("You got lucky...");
						}elseif($bullet == $chmb[2]){
							$sender->setHealth(0);
							$sender->sendMessage("Unlucky...");
						}
					}else{
						$sender->sendMessage("You don't have permission to do that!");
					}
				}else{
				$sender->sendMessage("[RouletteRamake] You must run that command in-game!");
				}
				
				
			}elseif($chambers == 6){
				if($sender instanceof Player){
					if($sender->hasPermission("roulette.command.rr")){
						$chmb = array("1st", "2nd", "3rd", "4th", "6th");
						$bullet = $chmb[array_rand($chmb)];
						if($bullet != $chmb[2]){
							$sender->sendMessage("You got lucky...");
						}else{
							$sender->setHealth(0);
							$sender->sendMessage("Unlucky...")
						}
					}else{
						$sender->sendMessage("You don't have permission to do that!")
					}
				}else{
					$sender->sendMessage("[RouletteRemake] You must run that command in-game")
				}
			}elseif($chambers <= 7){
				$sender->sendMessage("You have too many chambers!")
				$this->getLogger->info(TextFormat::RED . "[RouletteRamake] You have too many chambers! Please change this in the config file!")
			}
			
			
		}elseif($command->getName() === "rrinfo"){
			if($sender instanceof Player){
				if($sender hasPermission("roulette.command.rrinfo"){
					$sender->sendMessage("[RouletteRemake] Info: RouletteRemake lets you play a Russian Roulette game.");
					$sender->sendMessage("You have permission to play a Russian Roulette game. Use /rr to play!");
				}else{
					$sender->sendMessage("[RouletteRemake] Info: RouletteRemake lets you play a Russian Roulette game.");
					$sender->sendMessage("You don't have permission to play Russian Roulette.");
				}
			}else{
				$sender->sendMessage("[RouletteRemake] Info: RouletteRemake lets you play a Russian Roulette game.");
				$sender->sendMessage("You have to be in-game to play Russian Roulette");
			}
		}
	}
}
