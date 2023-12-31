<?php

namespace bank\commands;

use bank\Core;
use bank\content\Content;

use CortexPE\Commando\args\TextArgument;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;

class EditCommand extends BaseSubCommand {

 public function __construct(Core $pl) {
  parent::__construct("edit", "edit content loot");
  }

	protected function prepare(): void {
		$this->setPermission('bank.command');
	}
	
	public function onRun(CommandSender $player, string $aliasUsed, array $args): void {
	 if ($player instanceof Player) {
	   if ($player->hasPermission('bank.command')) {
	     Content::edit($player);
	     $player->sendMessage(TextFormat::YELLOW."You are editing the items");
	   }
	 }
	}
}