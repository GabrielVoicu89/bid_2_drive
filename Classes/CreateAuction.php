<?php

namespace Classes;

session_start();

include_once __DIR__ . "/../DB/Database.php";

use Db\Database;


class CreateAuction
{
    protected $make;
    protected $model;
    protected $power;
    protected $year;
    protected $description;
    protected $price;
    protected $auction_start;
    protected $auction_end;


    public function __construct($make, $model, $power, $year, $description,  $price,  $auction_start, $auction_end)
    {
        $this->make = $make;
        $this->model = $model;
        $this->power = $power;
        $this->year = $year;
        $this->description = $description;
        $this->price = $price;
        $this->auction_start = $auction_start;
        $this->auction_end = $auction_end;
    }


    public function create_auction($make, $model, $power, $year, $description, $seller_id, $price, $auction_start, $auction_end)
    {
        $dbh = Database::createDBConnection();

        //insert in cars
        $query = $dbh->prepare("INSERT 
            INTO `cars` (`make`, `model`, `power`,`year`,`description`,`seller_id`,`price`, `auction_start` , `auction_end`) VALUES (?,?,?,?,?,?,?,?,?) 
            ");
        $query->execute([$make, $model, $power, $year, $description, $seller_id, $price, $auction_start, $auction_end]);
    }
}
// var_export
