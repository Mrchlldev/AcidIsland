<?php

declare(strict_types=1);

namespace BeeAZ\AcidIsland\commands\subcommand;

use BeeAZ\AcidIsland\AcidIsland;
use pocketmine\command\CommandSender;
use function array_slice;
use function count;
use function implode;
use function strtolower;

class Setting {

	public function onCommand(CommandSender $player, array $args) {
		if (!$player->hasPermission("acidisland.setting")) {
			return true;
		}
		if (count($args) < 2) {
			return true;
		}
		$data = strtolower(implode(" ", array_slice($args, 1)));
		$ai = AcidIsland::getInstance();
		$name = strtolower($player->getName());
		if ($ai->isIsland($name)) {
			switch ($data) {
				case "lock":
					$name = strtolower($player->getName());
					$ai->setData($name, "lock", true);
					$player->sendMessage($ai->cfg->get("LOCK"));
					break;
				case "unlock":
					$name = strtolower($player->getName());
					$ai->setData($name, "lock", false);
					$player->sendMessage($ai->cfg->get("UNLOCK"));
					break;
			}
		} else {
			$player->sendMessage($ai->cfg->get("ISLAND-NOTFOUND"));
		}
	}
}
