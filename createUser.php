
<?php

//
$name = $_GET["name"];
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
    $erg = mysql_query("select ID, Name from User WHERE Name = '$name' order by ID;");
    $anzahl = mysql_num_rows($erg);
    if ($anzahl >= 1) {
        
        ?>
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
            <table width=100% height=100%>
                <tr>
                    <td colspan="2" align="center" height=10%><h1>Benutzername bereits vergeben</h1></td>
                </tr>
                <tr>
                    <td align="center" width="50%"><A HREF="index.php">zurück</A></td>
                    <td align="center" width="50%">
                        <A HREF="<?php echo 'index.php?user='.$_GET["name"].''; ?>">Ich habe mich<br> bereits mit diesem<Br> Benutzernamen registriert</A>
                    </td>
                </tr>
            </table>
        <?php
            
        
        ?>
            </body></html><?php
    } else {
        header( 'Location: http://192.168.178.40/quiz/index.php?user='.$_GET["name"].'');
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
        }
    }
}

?>