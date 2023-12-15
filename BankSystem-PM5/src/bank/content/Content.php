<?php

namespace bank\content;

use bank\Core;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use muqsit\invmenu\type\InvMenuTypeIds;

use pocketmine\player\Player;
use pocketmine\inventory\Inventory;
use pocketmine\utils\TextFormat;

final class Content {
  
  public static function edit(Player $player) : void {
    $menu = InvMenu::create(InvMenuTypeIds::TYPE_CHEST);
    
    $menu->getInventory()->setContents(Core::getInstance()->getInventory()->getContents());
    
    $menu->setName(TextFormat::colorize("&l&3Bank Content"));
    
    $menu->setInventoryCloseListener(function (Player $player, Inventory $inventory): void {
      Core::getInstance()->getInventory()->setContents($inventory->getContents())->save();
      $player->sendMessage(TextFormat::GREEN . 'You have saved the data of the items.');
            });
        $menu->send($player);
  }
}
?>