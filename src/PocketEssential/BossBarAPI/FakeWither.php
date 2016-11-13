<?php

namespace PocketEssential\BossBarAPI;

use pocketmine\entity\Entity;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
use pocketmine\level\Location;
use pocketmine\network\protocol\RemoveEntityPacket;

class FakeWither extends Location{
	public $eid, $text, $health;
	public $entityId = 52;//69

	public function init(){
		$this->eid = /*Entity::$entityCount++*/ 1000;
	}

	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->eid;
		$pk->type = $this->entityId;
		$pk->x = $player->x;
		$pk->y = $player->y;
		$pk->z = $player->z;
		$pk->yaw = $player->yaw;
		$pk->pitch = $player->pitch;
		$pk->metadata = [Entity::DATA_LEAD_HOLDER_EID => [Entity::DATA_TYPE_LONG, -1]];
		$player->dataPacket($pk);
	}

	public function despawnFrom(Player $player){
		$pk = new RemoveEntityPacket();
		$pk->eid = $this->eid;
		$player->dataPacket($pk);
	}
}