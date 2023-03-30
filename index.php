<?php



$title = "Book Records Site";


ob_start();

include 'templates/addrecord.html.php';

$output = ob_get_clean();



include 'templates/layout.html.php';

?>