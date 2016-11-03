<html>
    <head>
        <title>Quiz</title>
        <style>
        h1, a {
            width: 100%;
            text-align: center;
            font: 50px Arial,sans-serif;
        }
        a {
            color: #A1B9C5;
        }
        input[type=text] {
            font: 30px Arial,sans-serif;
        }
        input[type=submit] {
            /*cursor: pointer;*/
            font: 50px Arial,sans-serif;
            color: #FFFFFF; 
            background-color: #A1B9C5;
            height: 100%;
            width: 100%;
            /*padding: 3px;
            line-height: 100%%;*/
            -moz-border-radius: 0px !important;  /* for mozilla */
            -webkit-border-radius: 0px !important; /* for safari */
            border-radius: 0;
            -webkit-appearance: none;
        }
        </style>
    </head>
    <body>
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
$db = "quiz";

$DB_ID = mysql_connect($server, $user, $pw);
if($DB_ID == false) {
    echo "<option>Öffnen der DB fehlgeschlagen</option>";
} else {
    mysql_query("use $db", $DB_ID);
    mysql_query('set names utf8');
    $erg = mysql_query("select ID, FRAGE, A, B, C, D, Antwort, Active from Fragen WHERE ID = $id order by ID ;");
    $anzahl = mysql_num_rows($erg);
    if ($anzahl == 1) {
        $zeile = mysql_fetch_row($erg);
        for ($i=0; $i < $anzahl; $i++) {
            
        }
        if ($status == '1') {
            ?>
        <form action='deaktivateQuestion.php' method='POST'>
            <table width=100% height=10%>
                <tr>
                    <td align="center" height=100%><input type='text' align="center" name='ID' width="20px" value='<?php echo $id; ?>'></td>
                </tr>
                <tr>
                    <td align="center" height=100%><input type='submit' value='Deaktivieren'></td>
                </tr>
            </table>
        </form>
        <?php

        } else {
            ?>
            <form action='activateQuestion.php' method='POST'>
                <table width=100% height=10%>
                    <tr>
                        <td align="center" height=100%><input type='text' align="center" name='ID' width="20px" value='<?php echo $id; ?>'></td>
                    </tr>
                    <tr>
                        <td align="center" height=100%><input type='submit' value='Aktivieren'></td>
                    </tr>
                </table>
        </form>
        <?php
        }

        $idInt = (int)$id;
        $idInt = $idInt + 1;

        ?>


        <form action='index.php' method='GET'>
                    <input hidden='true' type='text' name='id' value='<?php echo $idInt; ?>'>
                    <input hidden='true' type='text' name='status' value='0'>
            <table width=100% height=10%>
                <tr>
                    <td align="center" height=100%><input type='submit' value='Nächste Frage'></td>
                </tr>
            </table>
                    
        </form>
        <?php
     // content="text/plain; charset=utf-8"
        
        mysql_close($DB_ID);
        
        include "libchart/classes/libchart.php";

        //header("Content-type: image/png");

        $chart = new VerticalBarChart(1500,400);
        $dataSet = new XYDataSet();
        
        $DB_IDA = mysql_connect($server, $user, $pw);
        mysql_query("use $db", $DB_IDA);
        mysql_query('set names utf8');
        $ergA = mysql_query("select ID, F_ID, U_ID, Antwort from Antworten WHERE F_ID = $id AND Antwort = 'A';");
        $anzahlA = mysql_num_rows($ergA);
        $dataSet->addPoint(new Point("A", $anzahlA));
        
        $ergB = mysql_query("select ID, F_ID, U_ID, Antwort from Antworten WHERE F_ID = $id AND Antwort = 'B';");
        $anzahlB = mysql_num_rows($ergB);
        $dataSet->addPoint(new Point("B", $anzahlB));
        
        $ergC = mysql_query("select ID, F_ID, U_ID, Antwort from Antworten WHERE F_ID = $id AND Antwort = 'C';");
        $anzahlC = mysql_num_rows($ergC);
        $dataSet->addPoint(new Point("C", $anzahlC));
        
        $ergD = mysql_query("select ID, F_ID, U_ID, Antwort from Antworten WHERE F_ID = $id AND Antwort = 'D';");
        $anzahlD = mysql_num_rows($ergD);
        $dataSet->addPoint(new Point("D", $anzahlD));
        $chart->setDataSet($dataSet);

        $chart->setTitle($zeile[1]);
        $chart->render("generated/demo1.png");
        
        ?>
        <table width=100% height=10%>
            <tr>
                <td align="center" height=10%><img src='generated/demo1.png'></td>
            </tr>
        </table>
        <?php
    } else {
        echo "Keine Frage mehr vorhanden";
    }
}
                
?>




        