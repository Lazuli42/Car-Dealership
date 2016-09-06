<?php
class Car
{
    public $make_model;
    public $price;
    public $miles;

    function __construct($make_model, $price, $miles) {
      $this->make_model = $make_model;
      $this->price = $price;
      $this->miles = $miles;
    }

    

    function setPrice($new_price)
    {
      $this->price = (float) $new_price;
    }

    function getPrice()
    {
      return $this->price();
    }

    function setMiles($new_miles)
    {
      $this->miles = (float) $new_miles;
    }

    function getMiles()
    {
      return $this->miles();
    }
}
?>
