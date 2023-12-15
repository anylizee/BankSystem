<?php

namespace bank;

use bank\utils\Database;
use bank\utils\Inventory;
use bank\event\Handler;
use bank\commands\BankCommand;

use muqsit\invmenu\InvMenuHandler;
use CortexPE\Commando\PacketHooker;

use pocketmine\plugin\PluginBase;

class Core extends PluginBase {
  
  /** @static Core $instance **/
  public static Core $instance;
  
  /** @private Database $database **/
  private Database $inventory;
  
  protected function onLoad() : void {
    self::$instance = $this;
  }
  
  protected function onEnable() : void {
    $this->data();
    $this->events();
    $this->sources();
    $this->getServer()->getCommandMap()->register('/bank', new BankCommand($this));
  }
  
  private function sources() : void {
    if (!InvMenuHandler::isRegistered())
            InvMenuHandler::register($this);

        # Register Packets hooker
        if (!PacketHooker::isRegistered())
            PacketHooker::register($this);
  }
  
  public function data() : void {
    if (!file_exists($this->getDataFolder() . 'loot.js')){
    Filesystem::safeFilePutContents($this->getDataFolder() . 'loot.js', Inventory::serialize([19 => VanillaBlocks::AIR()->asItem()]));
            }
      $contents = file_get_contents($this->getDataFolder() . 'loot.js');
       $this->inventory = new Database(Inventory::deSerialize($contents));
  }
  
  public function events() : void {
    $this->getServer()->getPluginManager()->registerEvents(new Handler(), $this);
  }
  
  public function getInventory() : Database {
    return $this->inventory;
  }
  
  public static function getInstance() : Core {
    return self::$instance;
  }
}
?>