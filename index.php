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
<?php

if(isset($_GET['user'])) 
{ 
    $server = "localhost";
    $user = "allinone";
    $pw = "cAf8HBs5EqvKppec";
    $db = "Quiz";
    
    $u_id = "0";
    $DB_ID1 = mysql_connect($server, $user, $pw);
    if($DB_ID1 == false) {
    echo "Öffnen der DB fehlgeschlagen<br>";
    } else {
        mysql_query("use $db", $DB_ID1);
        mysql_query('set names utf8');
        $username = $_GET['user'];
        $erg = mysql_query("select ID, Name from User WHERE Name='$username';");
        $anzahl = mysql_num_rows($erg);
        if ($anzahl == 1) {
            for ($i=0; $i < $anzahl; $i++) {
                $zeile = mysql_fetch_row($erg);
                $u_id = $zeile[0];
            }
        }
    }

    $DB_ID = mysql_connect($server, $user, $pw);
    if($DB_ID == false) {
        echo "<option>Öffnen der DB fehlgeschlagen</option>";
    } else {
        mysql_query("use $db", $DB_ID);
        mysql_query('set names utf8');
        $erg = mysql_query("select ID, FRAGE, A, B, C, D, Antwort, Active from Fragen WHERE active='1';");
        $anzahl = mysql_num_rows($erg);
        if ($anzahl == 1) {
            $zeile = mysql_fetch_row($erg);
            $f_id = $zeile[0];
            $DB_ID2 = mysql_connect($server, $user, $pw);
            if($DB_ID2 == false) {
            echo "Öffnen der DB fehlgeschlagen<br>";
            } else {
                mysql_query("use $db", $DB_ID2);
                mysql_query('set names utf8');
                $e = mysql_query("select ID, F_ID, U_ID from Antworten WHERE F_ID='$f_id' AND U_ID ='$u_id';");
                $a = mysql_num_rows($e);
                if ($a > 0) {
                    ?>
                        <table width=100% height=100%>
                            <tr>
                                <td colspan="2" align="center" height=10%><h1><?php echo $zeile[1]; ?></h1></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" height=10%><h1>Die Anwort zu dieser Frage wurde bereits abgegeben</h1></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" height=10%><A HREF="javascript:history.go(0)">Aktualisieren</A></td>
                            </tr>
                        </table>
                    <?php
                } else {
                    for ($i=0; $i < $anzahl; $i++) {
                        ?>
                        <form action='save.php' method='POST'>
                            <table width=100% height=100%>
                                <tr>
                                    <td colspan="2" align="center" height=10%><h1><?php echo $zeile[1]; ?></h1></td>
                                </tr>
                                <tr width=50%>
                                    <td align="center" width=50%><input style="border: none" type='submit' name='A' value='<?php echo $zeile[2]; ?>'/></td>
                                    <td align="center" width=50%><input style="border: none" type='submit' name='B' value='<?php echo $zeile[3]; ?>'/></td>
                                </tr>
                                <tr>
                                    <td align="center"><input style="border: none" type='submit' name='C' value='<?php echo $zeile[4]; ?>'/></td>
                                    <td align="center"><input style="border: none" type='submit' name='D' value='<?php echo $zeile[5]; ?>'/></td>
                                </tr>
                                <input hidden="true" type='text' name='name' value='<?php echo $_GET['user']; ?>'>
                                <input hidden="true" type='text' name='frage' value='<?php echo $zeile[0]; ?>'>
                                <tr>
                                    <td colspan="2" align="center" height=10%><A HREF="javascript:history.go(0)">Aktualisieren</A></td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                }
            }
            
        } else {
        ?>
        <table width=100% height=100%>
            <tr>
                <td><h1>Aktuell keine Frage freigeschaltet</h1></td>
            </tr>
            <tr>
                <td align="center" height=10%><A HREF="javascript:history.go(0)">Aktualisieren</A></td>
            </tr>
        
        <?php
        }
    }
} else {
    ?>
    <form action='createUser.php' method='GET'>
        <table width=100%>
            <tr>
                <td align="center">Benutzernamen eingeben:</td>
            </tr>
            <tr>
                <td align="center"><input style="width: 100%" type='text' name='name' value=''></td>
            </tr>
            <tr>
                <td align="center"><input style="width: 100%" type='submit' value='Anmelden'></td>
            </tr>
        </table>
    </form>
    <?php
}
?>
    </body>
</html>
