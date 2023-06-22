<?php

namespace View;


?>
<div class="logo"><img src="https://media.discordapp.net/attachments/1118801753958264919/1121381014808317962/Capture_decran_1.png?width=561&height=561" height="60" alt="MDB Logo" loading="lazy" />
    <nav class="navbar navbar-expand-lg ">

        <div class="container-fluid">
            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <?php if (!isset($_SESSION['userid'])) {
                        echo ' <li class="breadcrumb-item">
                    <a href="index.php">Register/Index</a>
                </li>';
                    } ?>
                    <?php if (!isset($_SESSION['userid'])) {
                        echo '<li class="breadcrumb-item">
                    <a href="login_index.php">Login</a>
                </li>';
                    } ?>
                    <?php if (isset($_SESSION['userid'])) {
                        echo '<li class="breadcrumb-item">
                    <a href="createauction_index.php">Create Auction</a>
                </li>';
                    } ?>
                    <?php if (isset($_SESSION['userid'])) {
                        echo '<li class="breadcrumb-item">
                    <a href="auctions_index.php">Auctions</a>
                </li>';
                    } ?>

                    <?php if (isset($_SESSION['userid'])) {
                        echo '<li class="breadcrumb-item">
                    <a href="logout.php">Logout</a>
                </li>';
                    } ?>
                </ol>
            </nav>
        </div>
    </nav>
</div>