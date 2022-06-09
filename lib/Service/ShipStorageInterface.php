<?php

namespace Service;

interface ShipStorageInterface
{
  /**
   * Returns an array of ship arrays, with keys id, name, weaponPower, defense.
   * @return array
   */
  public function fetchAllShipsData();

  /**
   * @param $id
   * @return array
   */
  public function fetchSingleShipsData($id);
}