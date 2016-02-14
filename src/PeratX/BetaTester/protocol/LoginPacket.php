<?php
/**
 * Author: PeratX
 * QQ: 1215714524
 * Time: 2016/2/13 17:27
 * Copyright(C) 2011-2016 iTX Technologies LLC.
 * All rights reserved.
 *
 * OpenGenisys Project
 */
namespace PeratX\BetaTester\protocol;

use pocketmine\network\protocol\DataPacket;
use pocketmine\network\protocol\Info;

class LoginPacket extends DataPacket{
	const NETWORK_ID = Info::LOGIN_PACKET;

	public $username;
	public $protocol1;
	public $protocol2;
	public $clientId;

	public $clientUUID;
	public $serverAddress;
	public $clientSecret;

	public $skinName = null;
	public $skin = null;

	public function decode(){
		$this->username = $this->getString();
		$this->protocol1 = $this->getInt();
		$this->protocol2 = $this->getInt();
		$this->clientId = $this->getLong();
		$this->clientUUID = $this->getUUID();
		$this->serverAddress = $this->getString();
		$this->clientSecret = $this->getString();

		$this->skinName = $this->getString();
		$this->skin = $this->getString();
	}

	public function encode(){

	}

}