<?php

namespace TRS;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\Server;
use pocketmine\Player;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\item\Emerald;
use pocketmine\scheduler\PluginTask;
use pocketmine\block\Block;
use pocketmine\level\sound\ExplodeSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class TRSWorker extends PluginBase implements Listener {
	public function onEnable() {
	  $this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
	  $this->economy = $this->getServer ()->getPluginManager ()->getPlugin ( "EconomyAPI" );
	}
	public function onInteract(PlayerInteractEvent $event) {
		$player = $event->getPlayer ();
		$inventory = $player->getInventory ();
		$level = $player->getLevel ();
		if($event->getBlock ()->getId () == 19 && $event->getBlock ()->getDamage () == 0) {
				$prize = rand ( 1, 5 );
				
				switch ($prize) {
					case 1 :
						$inventory->addItem ( Item::get ( 297, 0, 1 ) ); // 쿠키
						$player->sendPopup ( "§a[ §f시스템 §a] §6빵 §f1개를 지급 받았습니다." );
						$level->addSound ( new ClickSound ( $player ) );
						break;
					case 2 :
                        $inventory->addItem ( Item::get ( 297, 0, 2 ) ); // 쿠키
                        $player->sendPopup ( "§a[ §f시스템 §a] §6빵 §f2개를 지급 받았습니다." );
						$level->addSound ( new ClickSound ( $player ) );
						break;
					case 3 :
						$player->sendPopup ( "§a[ §f시스템 §a] §6빵§f이 지급 되지 않았습니다." );
						break;
					case 4 :
						$player->sendPopup ( "§a[ §f시스템 §a] §6빵§f이 지급 되지 않았습니다." );
						break;
					case 5 :
						$player->sendPopup ( "§a[ §f시스템 §a] §6빵§f이 지급 되지 않았습니다." );
						break;
				}
		}
	}
		public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if (strtolower ( $command->getName () ) == "플러그인정보") {
			if (! isset ( $args [0] )) {
				$sender->sendMessage ( "§a[ §f시스템 §a] §a/플러그인정보 출처 §f- 플러그인 출처를 볼 수 있다." );
				$sender->sendMessage ( "§a[ §f시스템 §a] §a/플러그인정보 일련번호 §f- 플러그인 오류신고 에 필요한 플러그인 일련번호를 볼 수 있다." );
				return true;
			}
			switch ($args [0]) {
				case "출처" :
					$sender->sendMessage ( "§a[ §f시스템 §a] §fT-Worker 는(은) GitHub 를 통해 무료 배포 된 상태 입니다." );
					return true;
				case "일련번호" :
					$sender->sendMessage ( "§a[ §f시스템 §a] §fT-Worker 의 일련번호는 PGI-17240557 입니다." );
					return true;
			}
		}
		}
}
			