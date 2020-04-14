<?php

namespace xtakumatutix\sparkler;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\level\particle\SmokeParticle;
use pocketmine\level\particle\FlameParticle;
use pocketmine\scheduler\ClosureTask;

Class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getLogger()->notice("読み込み完了_ver.1.0.0");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

	public function tap(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$id = $event->getItem()->getId();
		if($id === 369){
			$player->sendMessage("検知完了");
			$x = $player->getX() + 0.5;
			$y = $player->getY() + 0.8;
		    $z = $player->getZ() + 0.9;
			$level = $player->getLevel();
			$pos = new Vector3($x, $y, $z);
			$smokeparticle = new SmokeParticle($pos);
			$fireparticle = new FlameParticle($pos);
            for($i = 0; $i < 50; $i++){ //for構文で10回ループ
            $level->addParticle($smokeparticle);
            $level->addParticle($fireparticle); //ワールドにパーティクルを発生
        }
		}
	}
}