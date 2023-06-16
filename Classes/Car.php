<?php

namespace Classes;

session_start();

include_once __DIR__ . "/../DB/Database.php";

use Db\Database;
use PDO;

class Car
{
    protected $make;
    protected $model;
    protected $power;
    protected $year;
    protected $description;
    protected $price;


    public function __construct($make, $model, $power, $year, $description,  $price)
    {
        $this->make = $make;
        $this->model = $model;
        $this->power = $power;
        $this->year = $year;
        $this->description = $description;
        $this->price = $price;
    }


    public function create_auction($make, $model, $power, $year, $description, $price, $seller_id)
    {
        $dbh = Database::createDBConnection();
        //insert in cars
        $query = $dbh->prepare("INSERT 
            INTO `cars` (`make`, `model`, `power`,`year`,`description`,`seller_id`,`price`) VALUES (?,?,?,?,?,?,?) 
            ");
        //select from cars to recover the car_id in SESSION variable
        //insert in auctions of car_id

        $query->execute([$make, $model, $power, $year, $description, $seller_id, $price]);
    }
}
