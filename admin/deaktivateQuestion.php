<?php
header( 'Location: http://localhost/quiz/admin/index.php?id='.$_POST["ID"].'&status=0');
$id = $_POST["ID"];

$server = "localhost";
$user = "allinone";
$pw = "cAf8HBs5EqvKppec";
$db = "quiz";

$DB_ID = mysql_connect($server, $user, $pw);

    if($DB_ID == false) {
    echo "Öffnen der DB fehlgeschlagen<br>";
    } else {
        mysql_query("use $db", $DB_ID);
        mysql_query('set names utf8');
        mysql_query("UPDATE Fragen SET Active=0");
        if(mysql_errno()) {
            echo mysql_error();
        } else {
            //echo "Die daten wurden erfolgreich eingetragen";
        }
}
?>