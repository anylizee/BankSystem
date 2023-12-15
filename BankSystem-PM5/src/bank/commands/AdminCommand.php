<?php

namespace bank\commands;

use bank\Core;

use CortexPE\Commando\args\TextArgument;
use CortexPE\Commando\BaseSubCommand;
use pocketmine\command\CommandSender;

class AdminCommand extends BaseSubCommand {

 public function __construct(Core $pl) {
  parent::__construct("admin", "adminhelp bank");
  }

	protected function prepare(): void {
		$this->setPermission('bank.command');
	}
	
	public function onRun(CommandSender $player, string $aliasUsed, array $args): void {
	 
	}
}