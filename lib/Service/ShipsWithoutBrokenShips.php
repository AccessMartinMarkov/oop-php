<?php


namespace Service;


class ShipsWithoutBrokenShips
{
  private $allShips;

  public function __construct($allShips)
  {
    $this->allShips = $allShips;
  }

  public function getNoBrokenShips() {
    $noBrokenShips = [];

    foreach($this->allShips as $ship) {
      if ($ship->isReadyToFlight()) {
        $noBrokenShips[] = $ship;
      }
    }

    return $noBrokenShips;
  }
}