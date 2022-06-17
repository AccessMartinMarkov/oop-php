<?php


namespace Model;

// Showing how to turn Object to Array and access it's private or protected properties using the core PHP Interface ArrayAccess.
class PersonToArray implements \ArrayAccess
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

  public function offsetExists($offset)
  {
    return isset($this->$offset);
  }

  public function offsetGet($offset)
  {
    return $this->$offset;
  }

  public function offsetSet($offset, $value)
  {
    $this->$offset = $value;
  }

  public function offsetUnset($offset)
  {
    echo 'Unsetting the value of the ' . $offset . ' property. Value of ' . $this->$offset . ' will be deleted!';
    unset($this->$offset);
  }
}