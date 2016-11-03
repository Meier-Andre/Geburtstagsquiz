<?php
$id = '1';
$status = '0';
if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
    
    if (((int)$id) > 1) {
        
    }
    if(isset($_GET['status'])) {
        $status = $_GET['status'];
    }
}

echo "<h1 align='center'>Quiz</h1>";
$server = "localhost";
$user = "allinone";
$pw = "cAf8HBs5EqvKppec";
$db = "Quiz";

$DB_ID = mysql_connect($server, $user, $pw);
if($DB_ID == false) {
    echo "<option>Öffnen der DB fehlgeschlagen</option>";
} else {
    mysql_query("use $db", $DB_ID);
    mysql_query('set names utf8');
    $erg = mysql_query("select ID, FRAGE, A, B, C, D, Antwort, Active from Fragen WHERE ID = $id order by ID ;");
    $anzahl = mysql_num_rows($erg);
    if ($anzahl == 1) {
        for ($i=0; $i < $anzahl; $i++) {
            $zeile = mysql_fetch_row($erg);
            echo "<p>$zeile[0]</p>";
        }
        if ($status == '1') {
            ?>
        <form action='deaktivateQuestion.php' method='POST'>
                    <input type='text' name='ID' value='<?php echo $id; ?>'>
                    <input type='submit' value='Deaktivieren'>
        </form>
        <?php

        } else {
            ?>
            <form action='activateQuestion.php' method='POST'>
                    <input type='text' name='ID' value='<?php echo $id; ?>'>
                    <input type='submit' value='Aktivieren'>
        </form>
        <?php
        }

        $idInt = (int)$id;
        $idInt = $idInt + 1;

        ?>


        <form action='index.php' method='GET'>
                    <input hidden='true' type='text' name='id' value='<?php echo $idInt; ?>'>
                    <input hidden='true' type='text' name='status' value='0'>
                    <input type='submit' value='Next'>
        </form>
        <?php
        mysql_close($DB_ID);
    } else {
        echo "Keine Frage mehr vorhanden";
    }

}
                





        