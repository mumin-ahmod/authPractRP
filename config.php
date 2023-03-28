<?php

include 'login.php';

try {
    $pdo = new PDO("mysql:host=$hn; dbname=$db", "$un", "$pw");

    $output = 'Database connection established.';

//     $sql = 'CREATE TABLE joke(

//     id NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     joketext TEXT,
//     jokedate DATE NOT NULL
// )';

    // $pdo->exec($sql);

    $output = 'created successfully';

    if (isset($_POST['delete']) && isset($_POST['id'])) {

        //delete query

        $id = get_post($conn, 'id');

        $sql = "DELETE FROM classics WHERE id= '$id'"; //making query

        $result = $conn->query($query); //performing query/ take resutl
        if (!$result) {
            echo "DELETE failed<br><br>";
        }

        //if anything goes wrong
        // PUT DELTE CODE HERE

    }

    if (isset($_POST['author']) &&
        isset($_POST['title']) &&
        isset($_POST['category']) &&
        isset($_POST['year']) &&
        isset($_POST['isbn'])

    ) {

        $author = get_post($conn, 'author'); //take the author from
        // html form with get post and save it to the variable ($<-data<-post<html-Form)

        $title = get_post($conn, 'title');
        $category = get_post($conn, 'category');
        $year = get_post($conn, 'year');
        $isbn = get_post($conn, 'isbn');

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
    }
    $rows = $result->rowCount();

    function get_post($conn, $var)
    {
        return $conn->real_escape_string($_POST[$var]);
    }

} catch (PDOException $e) {

    $output = 'unable to connect to database' . e->getMessage() . 'in' .
    $e->getFile() . ':' . $e->getLine();

}
