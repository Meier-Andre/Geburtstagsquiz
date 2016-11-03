<?php

header( 'Location: http://192.168.178.40/quiz/index.php?user='.$_POST["name"].'');
$name = $_POST["name"];
$frage = $_POST["frage"];

$server = "localhost";
$user = "allinone";
$pw = "cAf8HBs5EqvKppec";
$db = "Quiz";

$u_id = "0";
$DB_ID = mysql_connect($server, $user, $pw);
if($DB_ID == false) {
echo "Öffnen der DB fehlgeschlagen<br>";
} else {
    mysql_query("use $db", $DB_ID);
    mysql_query('set names utf8');
    $erg = mysql_query("select ID, Name from User WHERE Name='$name';");
    $anzahl = mysql_num_rows($erg);
    if ($anzahl == 1) {
        for ($i=0; $i < $anzahl; $i++) {
            $zeile = mysql_fetch_row($erg);
            $u_id = $zeile[0];
        }
    }
}
$antwort = "";
if (isset($_POST['A'])) {
    $antwort = 'A';
} else if (isset($_POST['B'])) {
    $antwort = 'B';
} else if (isset($_POST['C'])) {
    $antwort = 'C';
} else if (isset($_POST['D'])) {
    $antwort = 'D';
}
echo $antwort;

$DB_ID = mysql_connect($server, $user, $pw);
if($DB_ID == false) {
echo "Öffnen der DB fehlgeschlagen<br>";
} else {
    mysql_query("use $db", $DB_ID);
    mysql_query('set names utf8');
    mysql_query("insert into Antworten (F_ID, U_ID, Antwort) values ('$frage', '$u_id', '$antwort')");
    if(mysql_errno()) {
        echo mysql_error();
    } else {
        //echo "Die daten wurden erfolgreich eingetragen";
    }
}
?>