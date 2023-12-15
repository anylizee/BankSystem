<?php

namespace bank\commands;

use bank\Core;

use pocketmine\player\Player;

use CortexPE\Commando\BaseCommand;
use pocketmine\command\CommandSender;

class BankCommand extends BaseCommand {

  public function __construct(Core $pl) {
    parent::__construct('bank', 'banksystem');
  }
  
	protected function prepare(): void {
	 $this->setPermission('bank.command');
   $main = Loader::getInstance();
   $this->registerSubCommand(new EditCommand($main));
   $this->registerSubCommand(new AdminCommand($main));
	}
	
	public function onRun(CommandSender $sender, string $aliasUsed, array $args): void {
	  if ($sender instanceof Player) {
	    if ($sender->hasPermission('bank.command')) {
	      
	    }
	  }
	}
}