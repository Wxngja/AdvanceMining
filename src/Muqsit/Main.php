<?php

namespace AdvanceMining;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		    @mkdir($this->getDataFolder())
	       $this->getLogger()->info("AdvancedMining");
	}

	// Thanks to @PrimusLV
	public function onBlockBreak(BlockBreakEvent $event){
	   if($event->isCancelled()) return;
	   $player = $event->getPlayer();
	      if($this->breaks[$name] >= 128){
	         $event->getPlayer()->sendMessage(TF::YELLOW . "You broke 128 blocks, " . TF::AQUA . "WHOOOO!"));
	         $this->giveEffect($player, 3, 100, 5);
	         $this->breaks[$name] = 0; # Reset the counter, to avoid ^^ spam.
	      }else{
	        $this->breaks[$name]++;
	      }
	}
	
	/**
	 * @param Player $player
	 * @param int $id
	 * @param int $duration
	 * @param int $amplifier
	 */
	public function giveEffect(Player $player, $id, $duration, $amplifier){
		$effect = Effect::getEffect($id)->setDuration($duration)->setAmplifier($amplifier); # Fluent setters <3
		$player->addEffect($effect);
	}
