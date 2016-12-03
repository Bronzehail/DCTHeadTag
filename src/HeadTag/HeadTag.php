<?php

namespace HeadTag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use FactionsPro\Main1;
use HeadTag\TimeUpdate;
use Love\love;
use onebone\economyapi\EconomyAPI;

class HeadTag extends PluginBase{

    public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->info(TEXTFORMAT::GOLD . ">>  頭部顯示加載中")
			@mkdir($this->getDataFolder());
				$this->getServer()->getScheduler()->scheduleRepeatingTask(new TimeUpdate($this), 10);
    }
}

