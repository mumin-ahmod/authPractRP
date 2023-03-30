<?php

// INCLUDED VIEW RECORDS AT LAST

// PROBLEM1: DELETE WORKING BUT NOTHING SHOWING AFTER DELETE
// PROBLEM2: GO TO COPY FOLDER , LINK IS NOT WORKING, DELETE IS NOT WORKING, ADD IS NOT WORKING, CONFIG.PHP IS NOT FOUND

include_once 'login.php';

try {

    if (isset($_POST['delete']) && isset($_POST['id'])) { //if delte set

        $id = $_POST['id'];

        $sql = "DELETE FROM classics WHERE id= '$id'"; //making query

        $result = $pdo->query($sql); //performing query/ take resutl
        if (!$result) {
            echo "DELETE failed<br><br>";
        }

        //if anything goes wrong
        // PUT DELTE CODE HERE

    }

    $sql = "SELECT * FROM classics"; // select AWLWAYS - EVERYTIME WORKS
    $result = $pdo->query($sql);
    if (!$result) {
        die("Database access failed");
    } else {

        $rows = $result->rowCount();

        ob_start();

        include 'templates/viewrecords.html.php';

        $title = "Show Records";

        $output = ob_get_clean(); // OB -S WORK IS ENDED & THE WHOLE HTML IS SHOWN
    }

    // function get_post($conn, $var)
    // {
    //     return $conn->real_escape_string($_POST[$var]);
    // }

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}

include 'templates/layout.html.php';
