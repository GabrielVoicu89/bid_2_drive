<?php

namespace Classes;

session_start();
include_once __DIR__ . "/../DB/Database.php";


use Db\Database;



class CreateBid
{
    protected $bid;

    public function __construct($bid)
    {
        $this->bid = $bid;
    }



    public function create_bid($car_id, $bid, $bidder_id)
    {
        $dbh = Database::createDBConnection();
        $query = $dbh->prepare("INSERT INTO `bids_history`(`car_id`,`bid`,`bidder_id`) VALUES (?,?,?)");
        $query->execute([$car_id, $bid, $bidder_id]);
    }
}
