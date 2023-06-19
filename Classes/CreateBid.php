<?php

namespace Classes;

session_start();
include_once __DIR__ . "/../DB/Database.php";


use Db\Database;
use PDO;


class CreateBid
{
    protected $bid;

    public function __construct($bid)
    {
        $this->bid = $bid;
    }



    public function create_bid($car_id, $bid, $bidder_id)
    {
        // creating conection with database
        $dbh = Database::createDBConnection();
        $query = $dbh->prepare("SELECT * FROM `cars` WHERE `id` = ? ");
        $query->execute([$car_id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result[0]['auction_end'] < date('Y-m-d H:i:s')) {
            echo "You can't bid anymore since the auction ended.";
        } else {
            // select * from bids_history where car_id = GET['id']
            $query = $dbh->prepare("SELECT * FROM `bids_history` WHERE `car_id` = ? ");
            $query->execute([$car_id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // if count(array) = 0 means no bids
            if (count($result) === 0) {
                // if no bids for  car id
                // select from cars
                $query = $dbh->prepare("SELECT * FROM `cars` WHERE `id` = ? ");
                $query->execute([$car_id]);
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                // highest bid = price + bid
                $final_price = $result[0]['price'] + $bid;
                $query = $dbh->prepare("INSERT INTO `bids_history`(`car_id`,`bid`,`bidder_id`,`final_price`) VALUES (?,?,?,?)");
                $query->execute([$car_id, $bid, $bidder_id, $final_price]);
            } else {

                // $final_price = $bid + "last final price";
                $last_bid = end($result);
                $final_price = $last_bid['final_price'] + $bid;
                $query = $dbh->prepare("INSERT INTO `bids_history`(`car_id`,`bid`,`bidder_id`,`final_price`) VALUES (?,?,?,?)");
                $query->execute([$car_id, $bid, $bidder_id, $final_price]);
            }
            // show bids
            $query = $dbh->prepare("SELECT * FROM `bids_history` WHERE `car_id` = ? ");
            $query->execute([$car_id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            var_dump(end($result));
        }
    }

    public static function check_status($car_id)
    {
        $dbh = Database::createDBConnection();
        $query = $dbh->prepare("SELECT * FROM `cars` WHERE `id` = ? ");
        $query->execute([$car_id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result[0]['auction_end'] < date('Y-m-d H:i:s')) {
            echo "The auction ended.";
        }
    }

    public static function show_bids($car_id)
    {
        $dbh = Database::createDBConnection();
        $query = $dbh->prepare("SELECT * FROM `bids_history` WHERE `car_id` = ? ");
        $query->execute([$car_id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            echo "This auction has no bids yet.";
        } else {
            var_dump(end($result));
        }
    }
}
