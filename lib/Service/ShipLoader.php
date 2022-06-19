<?php

namespace Service;

use Model\BountyHunterShip;
use Model\RebelShip;
use Model\Ship;
use Model\AbstractShip;
use Model\ShipsCollection;

class ShipLoader
{
  private $shipStorage;

  private $ships = [];

  public function __construct(ShipStorageInterface $shipStorage)
  {
    $this->shipStorage = $shipStorage;
  }

  /**
   * @return ShipsCollection
   */
  public function loadShips()
  {

    try {
      $shipsData = $this->shipStorage->fetchAllShipsData();
    } catch (\PDOException $e) {
      trigger_error('Database Exception -> '. $e->getMessage());
      $shipsData = [];
    }

    foreach ($shipsData as $shipData) {
      $this->ships[] = $this->createShipFromData($shipData);
    }

    // Boba Fett's ship
    $this->ships[] = new BountyHunterShip('Slave 1');

    return new ShipsCollection($this->ships);
  }

  private function createShipFromData(array $shipData)
  {
    if ($shipData['team'] === 'rebel') {
      $ship = new RebelShip($shipData['name']);
    } else {
      $ship = new Ship($shipData['name']);
      $ship->setJediFactor($shipData['jedi_factor']);
    }

    $ship->setId($shipData['id']);
    $ship->setWeaponPower($shipData['weapon_power']);
    $ship->setStrength($shipData['strength']);

    return $ship;
  }

  /**
   * @param $id
   * @return AbstractShip|null
   */
  public function findOneById($id)
  {

    $shipArray = $this->shipStorage->fetchSingleShipsData($id);

    return $this->createShipFromData($shipArray);
  }

}