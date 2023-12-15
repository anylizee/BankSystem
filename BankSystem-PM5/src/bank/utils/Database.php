<?php



namespace bank\utils;

use bank\Core;
use bank\utils\Inventory;
use pocketmine\utils\Filesystem;

final class Database {

    public function __construct(
        private array $contents
    ){}

    /**
     * @return array
     */
    public function getContents(): array{
        return $this->contents;
    }

    /**
     * @param array $contents
     * @return AirdropsInventory
     */
    public function setContents(array $contents): Database{
        $this->contents = $contents;
        return $this;
    }

    public function save(): void{
        Filesystem::safeFilePutContents(Core::getInstance()->getDataFolder() . 'loot.js', Inventory::serialize($this->getContents()));
    }

}