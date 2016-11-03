<?php

//header( 'Location: http://192.168.178.40/quiz/index.php?user='.$_POST["name"].'');
$name = $_POST["name"];

                $server = "localhost";
                $user = "allinone";
                $pw = "cAf8HBs5EqvKppec";
                $db = "allinone";

                $DB_ID = mysql_connect($server, $user, $pw);
                if($DB_ID == false) {
                    echo "<option>Öffnen der DB fehlgeschlagen</option>";
                } else {
                    mysql_query("use $db", $DB_ID);
                    mysql_query('set names utf8');
                    $erg = mysql_query("select ID, NAME, KATEGORY from places WHERE KATEGORY = '' order by ID ;");
                    $anzahl = mysql_num_rows($erg);
                    echo $anzahl;
                }
/*
$server = "localhost";
$user = "allinone";
$pw = "cAf8HBs5EqvKppec";
$db = "Quiz";


$DB_ID1 = mysql_connect($server, $user, $pw);
if($DB_ID1 == false) {
echo "Öffnen der DB fehlgeschlagen<br>";
} else {
    mysql_query("use $db", $DB_ID1);
    mysql_query('set names utf8');
    $erg = mysql_query("select ID, Name from User WHERE Name = $name");
    $anzahl = mysql_num_rows($erg);
    if ($anzahl > 0) {
        echo "User bereits vorhanden";
    }
}

$DB_ID = mysql_connect($server, $user, $pw);
    if($DB_ID == false) {
    echo "Öffnen der DB fehlgeschlagen<br>";
    } else {
        mysql_query("use $db", $DB_ID);
        mysql_query('set names utf8');
        mysql_query("insert into User (NAME) values ('$name')");
        if(mysql_errno()) {
            echo mysql_error();
        } else {
            //echo "Die daten wurden erfolgreich eingetragen";
        }
    }*/
?>