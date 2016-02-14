<?php
/**
 * Based on the great plugin 'BetaTester' made by shoghicp
 */
namespace PeratX\BetaTester;

use pocketmine\network\protocol\Info;
use pocketmine\plugin\PluginBase;

class BetaTester extends PluginBase{

	const CURRENT_PROTOCOL = 38;
	const TARGET_PROTOCOL = 44;

	const CURRENT_MINECRAFT_VERSION_NETWORK = "0.13.1";

	public function onEnable(){
		$this->saveDefaultConfig();

		$port = (int) $this->getConfig()->get("port");
		if($port === $this->getServer()->getPort()){
			$this->getLogger()->error("A different port must be set in config.yml");
			return;
		}

		if(Info::CURRENT_PROTOCOL !== self::TARGET_PROTOCOL){
			$this->getLogger()->error("Current protocol is different than the target protocol!");
			return;
		}

		$this->getLogger()->info("Starting Minecraft PE server ".$this->getDescription()->getVersion()." on port $port");
		$interface = new NewInterface($this->getServer(), $port);
		$this->getServer()->getNetwork()->registerInterface($interface);
	}
}