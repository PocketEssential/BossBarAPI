<?php

namespace PocketEssential\BossBarAPI;

use pocketmine\network\protocol\DataPacket;

class EventPacket extends DataPacket{
	const NETWORK_ID = 0x3f;
	public $eid;
	public $varint1;
	public $state;
	public $extra1;
	public $extra2;
	public $extra3;
	public $extra4;
	public $extra5;
	public $extra6;
	public $extra7;
	public $extra8;

	public function decode(){}

	public function encode(){
		$this->putEntityId($this->eid);
		$this->putVarInt($this->varint1);
		$this->putByte($this->state);
		switch($this->state){
			case 0:
			case 2:
				break;
			case 3:
			case 6:
				$this->putVarInt($this->extra1);
				break;
			case 1:
				$this->putVarInt($this->extra2);
				break;
			case 4:
				$this->putLong($this->extra3);
				$this->putLong($this->extra4);
				break;
			case 5:
				$this->putUnsignedVarInt($this->extra5);
				$this->putVarInt($this->extra6);
				break;
			case 7:
				$this->putLong($this->extra7);
				$this->putVarInt($this->extra8);
				break;
			default:
				break;
		}
		// 8 cases. 0,2 nothing. 3,6 -> putVarInt. 1 -> putVarInt. 4 -> writeVarInt64(long long) writeVarInt64(long long). 5 -> writeUnsignedVarInt(uint) writeVarInt(int). 7 -> writeVarInt64(long long) writeVarInt(int).
	}
}