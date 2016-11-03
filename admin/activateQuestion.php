<?php

header( 'Location: http://localhost/quiz/admin/index.php?id='.$_POST["ID"].'&status=1');
$id = $_POST["ID"];

$server = "localhost";
$user = "allinone";
$pw = "cAf8HBs5EqvKppec";
$db = "Quiz";

$DB_ID = mysql_connect($server, $user, $pw);


    if($DB_ID == false) {
    echo "Öffnen der DB fehlgeschlagen<br>";
    } else {
        mysql_query("use $db", $DB_ID);
        mysql_query('set names utf8');
        mysql_query("UPDATE Fragen SET Active=0");
        mysql_query("UPDATE Fragen SET Active=1 WHERE ID=$id");
        if(mysql_errno()) {
            echo mysql_error();
        } else {
            //echo "Die daten wurden erfolgreich eingetragen";
        }
    }
?>