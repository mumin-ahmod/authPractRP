<?php


// INCLUDED VIEW RECORDS AT LAST

// PROBLEM1: DELETE WORKING BUT NOTHING SHOWING AFTER DELETE
// PROBLEM2: GO TO COPY FOLDER , LINK IS NOT WORKING, DELETE IS NOT WORKING, ADD IS NOT WORKING, CONFIG.PHP IS NOT FOUND

include_once 'login.php';

try {
 

    // $pdo = new PDO("mysql:host=$hn; dbname=$db", "$un", "$pw");

    // $output = 'Database connection established.';

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



    if (isset($_POST['author']) && // INSERT SET
        isset($_POST['title']) &&
        isset($_POST['category']) &&
        isset($_POST['year']) &&
        isset($_POST['isbn'])

    ) {

        $author = $_POST['author']; //take the author from
        // html form with get post and save it to the variable ($<-data<-post<html-Form)

        $title = $_POST['title'];
        $category = $_POST['category'];
        $year = $_POST['year'];
        $isbn = $_POST['isbn'];

        // time to perform the query
        $sql = "INSERT INTO classics(author, title, year, isbn, category) VALUES('$author', '$title', '$year', '$isbn', '$category')";

        $result = $pdo->query($sql);

        if (!$result) {
            echo "insert failed <br> <br>";
        }

    } //-----INSERT DONE

    $sql = "SELECT * FROM classics"; // select
    $result = $pdo->query($sql);
    if (!$result) {
        die("Database access failed");
    }else{

        echo "selectdone";

        $rows = $result->rowCount();

        include 'templates/viewrecords.html.php';
    }
   

    // function get_post($conn, $var)
    // {
    //     return $conn->real_escape_string($_POST[$var]);
    // }

    

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}
