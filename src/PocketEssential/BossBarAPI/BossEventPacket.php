<?php

namespace PocketEssential\BossBarAPI;

use pocketmine\network\protocol\DataPacket;

class BossEventPacket extends DataPacket{
	const NETWORK_ID = 0x4b;
	public $eid;
	public $state;

	public function decode(){
		$this->eid = $this->getUUID();
		$this->state = $this->getUnsignedVarInt();
		// $this->ka2 = $this->getString();
		// $this->ka3 = $this->getFloat();
		// $this->ka4 = $this->getShort();
		// $this->ka5 = $this->getUnsignedVarInt();
		// print $ka2 . '|' . $ka3 . '|' . $ka4 . '|' . $ka5 . '\n';
		print '|' . $this->eid . '|' . $this->state . '\n';
	}

	public function encode(){
		$this->reset();
		$this->putEntityId($this->eid);
		$this->putUnsignedVarInt($this->state);
	}
}
