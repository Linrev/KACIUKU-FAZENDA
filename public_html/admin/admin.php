﻿<?php
include("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
//Iš pradžių aprašomos funkcijos, po to jos naudojamos.

function displayUsers() {
    global $database;
    $q = "SELECT username,userlevel,email,timestamp "
            . "FROM " . TBL_USERS . " ORDER BY userlevel DESC,username";
    $result = $database->query($q);
    /* Error occurred, return given name by default */
    $num_rows = mysql_numrows($result);
    if (!$result || ($num_rows < 0)) {
        echo "Error displaying info";
        return;
    }
    if ($num_rows == 0) {
        echo "Lentelė tuščia.";
        return;
    }
    /* Display table contents */
    echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
    echo "<tr><td><b>Vartotojo vardas</b></td><td><b>Lygis</b></td><td><b>E-paštas</b></td><td><b>Paskutinį kartą aktyvus</b></td></tr>\n";
    for ($i = 0; $i < $num_rows; $i++) {
        $uname = mysql_result($result, $i, "username");
        $ulevel = mysql_result($result, $i, "userlevel");
        $email = mysql_result($result, $i, "email");
        $time = date("Y-m-d G:i", mysql_result($result, $i, "timestamp"));

        echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
    }
    echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers() {
    global $database;
    $q = "SELECT username,timestamp "
            . "FROM " . TBL_BANNED_USERS . " ORDER BY username";
    $result = $database->query($q);
    /* Error occurred, return given name by default */
    $num_rows = mysql_numrows($result);
    if (!$result || ($num_rows < 0)) {
        echo "Error displaying info";
        return;
    }
    if ($num_rows == 0) {
        echo "Lentelė tuščia.";
        return;
    }
    /* Display table contents */
    echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
    echo "<tr><td><b>Vartotojo vardas</b></td><td><b>Blokavimo laikas</b></td></tr>\n";
    for ($i = 0; $i < $num_rows; $i++) {
        $uname = mysql_result($result, $i, "username");
        $time = date("Y-m-d G:i", mysql_result($result, $i, "timestamp"));
        echo "<tr><td>$uname</td><td>$time</td></tr>\n";
    }
    echo "</table><br>\n";
}
?>



<?php
/**
 * Jei ne administratorius redirektinama i pagrindini puslapi
 */
if (!$session->isAdmin()) {
    header("Location: ../index.php");
} else { //Jei administratorius
    echo "<html>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
    echo "<title>Administratoriaus sąsaja</title>";
    echo "<body><style> form {background-color:#F1FCA2;}
			body {background-color:#F1FCA2;} </style> ";
    echo "<img src=\"../pictures/top.png\" /><br>";
    //Formuojamas meniu. 
    $_SESSION['path'] = '../';
    include("../include/meniu.php");
    //Nuoroda į pradžią
    echo "<br><br><br>Atgal į [<a href=\"../index.php\">Pradžia</a>]<br>";

    if ($form->num_errors > 0) {
        echo "<font size=\"4\" color=\"#ff0000\">"
        . "!*** Error with request, please fix</font><br><br>";
    }
    ?>

    <table align="left" border="0" cellspacing="5" cellpadding="5">
        <tr><td>

    <?php
    /**
     * Display Users Table
     */
    ?>

                <h3>Sistemos vartotojai:</h3>

    <?php
    displayUsers();
    ?>

                <br>
        <tr>
            <td><hr></td>
        </tr>
    </td></tr>
    <tr>
        <td>

    <?php
    /**
     * Update User Level
     */
    ?>

            <h3>Atnaujinti vartotojo lygį</h3>

    <?php
    echo $form->error("upduser");
    ?>

            <table>
                <form action="adminprocess.php" method="POST">
                    <tr><td>
                            Vartotojo vardas:<br>
                            <input type="text" name="upduser" maxlength="30" value="<?php echo $form->value("upduser"); ?>">
                        </td>
                        <td>Lygis:<br>
                            <select name="updlevel">
                                <option value="1">1
                                <option value="5">5
                                <option value="9">9
                            </select>
                        </td>
                        <td>
                            <br>
                            <input type="hidden" name="subupdlevel" value="1">
                            <input type="submit" value="Atnaujinti lygį">
                        </td></tr>
                </form>
            </table>
        </td>
    </tr>
    <tr>
        <td><hr></td>
    </tr>
    <tr>
        <td>

    <?php
    /**
     * Delete User
     */
    ?>

            <h3>Vartotojo šalinimas</h3>

    <?php
    echo $form->error("deluser");
    ?>

            <form action="adminprocess.php" method="POST">
                Vartotojo vardas:<br>
                <input type="text" name="deluser" maxlength="30" value="<?php echo $form->value("deluser"); ?>">
                <input type="hidden" name="subdeluser" value="1">
                <input type="submit" value="Šalinti">
            </form>
        </td>
    </tr>
    <tr>
        <td><hr></td>
    </tr>
    <tr>
        <td>

    <?php
    /**
     * Delete Inactive Users
     */
    ?>

            <h3>Šalinti neaktyvius vartotojus</h3>
            <table>
                <form action="adminprocess.php" method="POST">
                    <tr><td>
                            Neaktyvumo dienos:<br>
                            <select name="inactdays">
                                <option value="3">3
                                <option value="7">7
                                <option value="14">14
                                <option value="30">30
                                <option value="100">100
                                <option value="365">365
                            </select>
                        </td>
                        <td>
                            <br>
                            <input type="hidden" name="subdelinact" value="1">
                            <input type="submit" value="Šalinti">
                        </td>
                </form>
            </table>
        </td>
    </tr>
    <tr>
        <td><hr></td>
    </tr>
    <tr>
        <td>

    <?php
    /**
     * Ban User
     */
    ?>

            <h3>Vartotojo blokavimas</h3>

    <?php
    echo $form->error("banuser");
    ?>

            <form action="adminprocess.php" method="POST">
                Vartotojo vardas:<br>
                <input type="text" name="banuser" maxlength="30" value="<?php echo $form->value("banuser"); ?>">
                <input type="hidden" name="subbanuser" value="1">
                <input type="submit" value="Blokuoti">
            </form>
        </td>
    </tr>
    <tr>
        <td><hr></td>
    </tr>
    <tr><td>

    <?php
    /**
     * Display Banned Users Table
     */
    ?>

            <h3>Blokuoti vartotojai:</h3>

    <?php
    displayBannedUsers();
    ?>

        </td></tr>
    <tr>
        <td><hr></td>
    </tr>
    <tr>
        <td>

    <?php
    /**
     * Delete Banned User
     */
    ?>

            <h3>Blokuoto vartotojo šalinimas</h3>

    <?php
    echo $form->error("delbanuser");
    ?>

            <form action="adminprocess.php" method="POST">
                Vartotojo vardas:<br>
                <input type="text" name="delbanuser" maxlength="30" value="<?php echo $form->value("delbanuser"); ?>">
                <input type="hidden" name="subdelbanned" value="1">
                <input type="submit" value="Šalinti blokuotą vartotoją">
            </form>
        </td></tr>
    </table>
    </body>
    </html>

    <?php
}
?>