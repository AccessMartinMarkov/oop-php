<?php

namespace Service;

class Container
{
  private $db_configuration;

  private $pdo;

  private $shipLoader;

  private $battleManager;

  private $shipStorage;

  private $ShipsWithoutBrokenShips;

  public function __construct(array $db_configuration)
  {
    $this->db_configuration = $db_configuration;
  }

  /**
   * @return \PDO
   */
  public function getPDO()
  {
    if ($this->pdo === null) {
      $this->pdo = new \PDO($this->db_configuration['db_dsn'], $this->db_configuration['db_user'], $this->db_configuration['db_pass']);
    }
    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $this->pdo;
  }

  /**
   * @return ShipLoader
   */
  public function getShipLoader() {
    if ($this->shipLoader === null) {
      $this->shipLoader = new ShipLoader($this->getShipStorage());
    }

    return $this->shipLoader;
  }

  /**
   * @return ShipStorageInterface
   */
  public function getShipStorage() {
    if ($this->shipStorage === null) {
      $this->shipStorage = new PdoShipStorage($this->getPDO());
//        $this->shipStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
    }

    return $this->shipStorage;
  }

  /**
   * @return BattleManager
   */
  public function getBattleManager() {
    if ($this->battleManager === null) {
      $this->battleManager = new BattleManager();
    }

    return $this->battleManager;
  }

  /**
   * @return ShipsWithoutBrokenShips[]
   */
  public function getShipsWithoutBrokenShips() {
    if ($this->ShipsWithoutBrokenShips === null) {
      $allShips = $this->getShipLoader()->loadShips();
      $this->ShipsWithoutBrokenShips = new ShipsWithoutBrokenShips($allShips);
    }

    return $this->ShipsWithoutBrokenShips->getNoBrokenShips();
  }

}