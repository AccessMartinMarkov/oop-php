<?php


namespace Model;


class Person
{
  public $name;

  public $age;

  public $sex;

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