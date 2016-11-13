<?php

namespace PocketEssential\BossBarAPI;

use pocketmine\utils\Binary;

class SetEntityDataPacket extends DataPacket{
	const NETWORK_ID = 0x26;
	public $eid;
	public $metadata;

	public function decode(){}

	public function encode(){
		$this->reset();
		$this->putEntityId($this->eid);
		$meta = Binary::writeMetadata($this->metadata);
		$this->put($meta);
	}
}
