<?php

namespace HeadTag;

use HeadTag\TimeUpdateTask;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class HeadTag extends PluginBase{

   public function onEnable(){
	$this->getServer()->getLogger()->info(TEXTFORMAT::GOLD . ">> 頭部顯示加載!!");
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new TimeUpdateTask($this), 20);
	}
	
	public function onDisable(){
	    $this->getServer()->getLogger()->info(TEXTFORMAT::RED . ">> 頭部顯示卸載!!");
	}

}

