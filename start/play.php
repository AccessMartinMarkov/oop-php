<?php

include_once __DIR__ . '/lib/Ship.php';

/**
 * @param Ship $SomeShip
 */
function printShipSummary($SomeShip) {
  echo $SomeShip->getName();
  echo '<hr>';
  echo $SomeShip->getNameAndSpecs(true);
  echo '<hr>';
  echo $SomeShip->getNameAndSpecs(false);
  echo '<hr>';
}

$myShip = new Ship();
$myShip->setName('Jedi Starship');
$myShip->setWeaponPower(10);
$myShip->setJediFactor(15);
$myShip->setStrength(20);

$otherShip = new Ship();
$otherShip->setName('Imperial Shuttle');
$otherShip->setWeaponPower(15);
$otherShip->setJediFactor(10);
$otherShip->setStrength(15);

if ($myShip->doesGivenShipHaveMoreStrength($otherShip)) 
{
  echo $otherShip->getName() . ' Has more strength.';
} else {
  echo $myShip->getName() . ' Has more strength.';
}
