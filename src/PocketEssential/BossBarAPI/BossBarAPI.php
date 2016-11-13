<?php


#
#____                ____                    _____ _____
#|  _ \              |  _ \             /\   |  __ \_   _|
# | |_) | ___  ___ ___| |_) | __ _ _ __ /  \  | |__) || |
# |  _ < / _ \/ __/ __|  _ < / _` | '__/ /\ \ |  ___/ | |
# | |_) | (_) \__ \__ \ |_) | (_| | | / ____ \| |    _| |_
# |____/ \___/|___/___/____/ \__,_|_|/_/    \_\_|   |_____|
#
#      - Original created by: thebigsmileXD (https://github.com/thebigsmileXD)
#
# Made by PocketEssential Copyright 2016 ©
#
# This is a public software, you cannot redistribute it a and/or modify any way
# unless otherwise given permission to do so.
#
# Author: The PocketEssential Team
# Link: https://github.com/PocketEssential
#
#|------------------------------------------------- BossBarAPI -------------------------------------------------|
#| - If you want to suggest/contribute something, read our contributing guidelines on our Github Repo (Link Below)|
#| - If you find an issue, please report it at https://github.com/PocketEssential/UltraFaction/issues             |
#|----------------------------------------------------------------------------------------------------------------|
namespace PocketEssential\BossBarAPI;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\protocol\SetEntityDataPacket;
use pocketmine\entity\Entity;
use pocketmine\utils\UUID;

class BossBarAPI extends PluginBase implements Listener{
	public $eid = [], $i = 0;

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getNetwork()->registerPacket(BossEventPacket::NETWORK_ID, BossEventPacket::class);
		$this->getServer()->getNetwork()->registerPacket(UpdateAttributesPacket::NETWORK_ID, UpdateAttributesPacket::class);
		$this->getServer()->getNetwork()->registerPacket(SetEntityDataPacket::NETWORK_ID, SetEntityDataPacket::class);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new SendTask($this), 20);
	}

	public function sendBossBar(Player $player, $message){
		if(count($this->getServer()->getOnlinePlayers()) > 0) $this->i < 100?$this->i++:$this->i = 0;
		else return;
		$eid = 1000; /* $this->eid[$player->getName()]; */ // TODO: fix
		
		$upk = new UpdateAttributesPacket(); // Change health of fake wither -> bar progress
		$upk->entries[] = new BossBarValues(0, 300, max(1, min([$this->i, 100])) / 100 * 300, 'minecraft:health'); // Ensures that the number is between 0 and 100;
		$upk->entityId = $eid;
		$this->getServer()->broadcastPacket($this->getServer()->getOnlinePlayers(), $upk);
		
		$npk = new SetEntityDataPacket(); // change name of fake wither -> bar text
        $npk->metadata = [Entity::DATA_NAMETAG => [Entity::DATA_TYPE_STRING, "$message"]];
		$npk->eid = $eid;
		$this->getServer()->broadcastPacket($this->getServer()->getOnlinePlayers(), $npk);
		
		$state = 0;
		$bpk = new BossEventPacket(); // TODO: check if can be removed
		$bpk->eid = $eid;
		$bpk->state = 0;
        $this->getServer()->broadcastPacket($this->getServer()->getOnlinePlayers(), $bpk);
        $fakeboss = new FakeWither();
        $fakeboss->init();
        $fakeboss->spawnTo($player);
	}
}