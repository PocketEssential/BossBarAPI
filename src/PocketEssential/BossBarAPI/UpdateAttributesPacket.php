<?php

namespace PocketEssential\BossBarAPI;

use PocketEssential\BossBarAPI\BossBarValues;
use pocketmine\network\protocol\DataPacket;

class UpdateAttributesPacket extends DataPacket{
	const NETWORK_ID = 0x1f;
	public $entityId;
	
	/** @var BossBarValues[] */
	public $entries = [];

	public function decode(){}

	public function encode(){
		$this->reset();
		$this->putEntityId($this->entityId);
		$this->putUnsignedVarInt(count($this->entries));
		foreach($this->entries as $entry){
			$this->putLFloat($entry->getMinValue());
			$this->putLFloat($entry->getMaxValue());
			$this->putLFloat($entry->getValue());
			$this->putLFloat($entry->getDefaultValue());
			$this->putString($entry->getName());
		}
	}
}