
<?php

include_once 'login.php';

try {

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

        ob_start();

        $title = 'Add New Record';

        include 'templates/addrecord.html.php';

        $output = ob_get_clean();

        include 'templates/layout.html.php';

    }

} catch (PDOException $e) {

    echo $e;

}
