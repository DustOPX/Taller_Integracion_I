<?php


$db_name = 'mysql:host=db.inf.uct.cl;dbname=apetey';
$user_name = 'apetey';
$user_password = 'Petey2022*';


// $db_name = 'mysql:host=localhost;dbname=mak4.0';
// $user_name = 'root';
// $user_password = '1234';




// $db_name = 'mysql:host=db.inf.uct.cl;dbname=A2022_bflores';
// $user_name = 'A2022_bflores';
// $user_password = 'A2022_bflores';

$conn = new PDO($db_name, $user_name, $user_password);

?>