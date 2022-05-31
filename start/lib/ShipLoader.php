<?php

class ShipLoader
{
  public function loadShips()
  {
    $ships = [];

    $shipOne = new Ship('Jedi Starfighter');
    $shipOne->setWeaponPower(5);
    $shipOne->setJediFactor(15);
    $shipOne->setStrength(30);
    $ships['star_fighter'] = $shipOne;

    $shipTwo = new Ship('CloakShape Fighter');
    $shipTwo->setWeaponPower(2);
    $shipTwo->setJediFactor(2);
    $shipTwo->setStrength(70);
    $ships['cloakshape_fighter'] = $shipTwo;

    $shipThree = new Ship('Super Star Destroyer');
    $shipThree->setWeaponPower(70);
    $shipThree->setJediFactor(0);
    $shipThree->setStrength(500);
    $ships['super_star_destroyer'] = $shipThree;

    $shipFour = new Ship('RZ-1 A-wing interceptor');
    $shipFour->setWeaponPower(4);
    $shipFour->setJediFactor(4);
    $shipFour->setStrength(50);
    $ships['rz1_a_wing_interceptor'] = $shipFour;

    return $ships;

  }
}