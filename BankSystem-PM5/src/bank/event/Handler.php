<?php

namespace bank\event;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\block\tile\Chest as ChestTile;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\Chest;
use pocketmine\player\Player;

class Handler implements Listener {
  
  /**
   * @param PlayerInteractEvent
   * 
   * $event
   */
  public function onInteract(PlayerInteractEvent $event) : void {
    $player = $event->getPlayer();
    $block = $event->getBlock();
    $position = $block->getPosition();
    $tile = $block->getWorld()->getTile($position);
    if ($block instanceof Chest) {
      if ($tile instanceof ChestTile) {
        $tile->getInventory()->addItem(VanillaBlocks::CHEST()->asItem());
      }
    }
  }
}
?>