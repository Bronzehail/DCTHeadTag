<?php

namespace HeadTag;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;
use onebone\economyapi\EconomyAPI;
class HeadTag extends PluginBase{

    public function onEnable(){
		$this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		if(!$this->EconomyAPI){
			$this->getServer()->getPluginManager()->disablePlugin($this);
			$this->getLogger()->error("您沒有安裝EconomyAPI");
			return;
		}
		@mkdir($this->getDataFolder());
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new TimeUpdate($this), 10);
    }
}

class TimeUpdate extends PluginTask {
public function __construct(HeadTag $plugin)
    {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
	
	public function onRun($currentTick){
$result = array();
		foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
switch($player->getGamemode()){
				case 0: $gm = "生存";break;
				case 1: $gm = "創造";break;
				case 2: $gm = "冒險";break;
				case 3: $gm = "觀看";break;
			}
$h = $player->getHealth();
$m = $this->plugin->EconomyAPI->mymoney($player);
			$name = $player->getName();
			$player->setNameTag("$name \n $m \n $h \n $gm ");
			}
}
}
