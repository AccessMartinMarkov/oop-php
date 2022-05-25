<?php

class Ship
{
  public $name;

  public $weaponPower = 0;

  public $jediFactor = 0;

  public $strength = 0;

  public function getName()
  {
    return $this->name;
  }

  public function getNameAndSpecs($useShortFormat)
  {
    if ($useShortFormat) {
      return sprintf(
        '%s: %s/%s/%s',
        $this->name,
        $this->weaponPower,
        $this->jediFactor,
        $this->strength
      );
    }
    else {
      return sprintf(
        '%s: w:%s, j:%s, s:%s',
        $this->name,
        $this->weaponPower,
        $this->jediFactor,
        $this->strength
      );
    }
  }
}

$myShip = new Ship();
$myShip->name = 'Jedi Starship';

echo $myShip->getNameAndSpecs(false);
echo '<hr>';
echo $myShip->getNameAndSpecs(true);

