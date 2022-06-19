<?php

namespace Model;

class BountyHunterShip extends AbstractShip
{
  use SettableJediFactorTrait;

  public function getType()
  {
    return 'Bounty Hunter';
  }

  public function isReadyToFlight()
  {
    return true;
  }

}