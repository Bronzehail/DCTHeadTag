<?php
namespace HeadTag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerToggleSneakEvent;
use pocketmine\level\Level;
use pocketmine\level\position;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use onebone\economyapi\EconomyAPI;

/*
遊戲ID
模式
權限
錢
血量
IP
*/
class HeadTag extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getserver()->getPluginManager()->registerEvents($this,$this);
			@mkdir($this->getDataFolder());
				$this->join= new Config($this->getDataFolder()."Config.yml", Config::YAML, array("名子"=>"名子","模式"=>"模式","權限"=>"權限","錢"=>"錢","血量"=>"血量","IP"=>"IP","頭部顯示"=>"on"));
					$this->getLogger()->info(TEXTFORMAT::GOLD . "§cTSR.TW§e星童插件組 §6HeadTag 頭部顯示加載中");
	}
	public function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
	$n=$sender->getPlayer()->getName();
	$p=$sender->getPlayer();
	$vtag=$this->join->get("頭部");
	switch(strtolower($cmd->getName())){
		case "vtag":
			if($vtag=="on"){
				$this->join->set("頭部","off");
					$this->join->save();
			return true;
      }else{
      if($vtag=="off"){
       $this->join->set("頭部","on");
        $this->join->save();
         $sender->sendmessage("§a成功開啟");
         return true;
      }
	public function join(PlayerJoinEvent $e){
		$p=$e->getPlayer();
			$gm=$p->getgamemode();
				$ip=$p->getAddress();
			$p1=$this->join->get("名字");
		$p2=$this->join->get("模式");
	$p3=$this->join->get("權限");
		$p4=$this->join->get("錢");
			$p5=$this->join->get("血量");
				$p6=$this->join->get("IP");
			$op=$p->isOp();
		if($gm=="1"){
	$x="§a創造";
	}
		if($gm=="0"){
			$x="§c生存";
	}
				if($op){
		$o="§a管理員";
	}else{
	$o="§6玩家";
	}
			$h=$p->getHealth();
		$mh=$p->getMaxHealth();
	$m=EconomyAPI::getInstance()->myMoney(strtolower($p->getName()));
	}
	public function move(PlayerMoveEvent $e){
		$p=$e->getPlayer();
			$gm=$p->getgamemode();
				$ip=$p->getAddress();
			$p1=$this->join->get("名字");
		$p2=$this->join->get("模式");
	$p3=$this->join->get("權限");
		$p4=$this->join->get("錢");
			$p5=$this->join->get("血量");
				$p6=$this->join->get("IP");
			$op=$p->isOp();
		if($gm=="1"){
	$x="§a創造";
	}
		if($gm=="0"){
			$x="§c生存";
	}
		if($op){
			$o="§a管理員";
	}else{
		$o="§6玩家";
	}
	$h=$p->getHealth();
	$mh=$p->getMaxHealth();
	$m=EconomyAPI::getInstance()->myMoney(strtolower($p->getName()));
	$jj=$this->join->get("頭部");
	if($this->join->get("頭部")=="on"){
	$p->setNameTag("§a".$p1."§6".$p."\n§a".$p2.".".$x."\n§a".$p3.".".$o."\n§a".$p4."§6".$m."\n§a".$p5.".".$h."|".$mh."\n§a".$p6.". §c".$ip."");
	}
	if($this->join->get("頭部")=="off"){
	}
	}
	public function onDisable()
    {
		$this->getLogger()->info(TEXTFORMAT::RED . "HeadTag 頭部顯示卸載");
	}
}	

?>