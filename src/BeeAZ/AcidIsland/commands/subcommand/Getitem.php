<?php

declare(strict_types=1);

namespace BeeAZ\AcidIsland\commands\subcommand;

use BeeAZ\AcidIsland\AcidIsland;
use pocketmine\command\CommandSender;

class Getitem {

	public function onCommand(CommandSender $player) {
		AcidIsland::getInstance()->getItem($player);
                $player->sendMessage("§aSuccesfully get item");
	}
}
