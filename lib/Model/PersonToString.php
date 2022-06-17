<?php


namespace Model;

// Showing how to turn Object to String and access it's private or protected properties.
class PersonToString
{
  private $name;

  private $age;

  private $sex;

  public function __construct($name, $age, $sex)
  {
    $this->name = $name;
    $this->age = $age;
    $this->sex = $sex;
  }

  public function __toString()
  {
    return $this->name . '<br>' . $this->age . '<br>' . $this->sex;
  }

  public function __get($prop)
  {
    return $this->$prop;
  }

  public function __set($prop, $value)
  {
    $this->$prop = $value;
  }

  public function __unset($prop)
  {
    echo "Unsetting '$prop'\n";
    unset($this->$prop);
  }
}
