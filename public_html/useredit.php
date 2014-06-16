<?
include("include/session.php");
?>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Paskyros redagavimas</title>
    <body>

        <?
        echo "<img src=\"pictures/top.png\" /><br>";
        /**
         * User has submitted form without errors and user's
         * account has been edited successfully.
         */
        if (isset($_SESSION['useredit'])) {
            include("include/meniu.php");
            unset($_SESSION['useredit']);
            echo "<br><br><p><b>$session->username</b>, Jūsų paskyra buvo sėkmingai atnaujinta.<br>";
            echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";
        } else {
            if ($session->logged_in) {
                include("include/meniu.php");
                if ($form->num_errors > 0) {
                    echo "<br><br><font size=\"2\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                } else {
                    echo "<br><br><br>";
                }
                ?>
                <table>
                    <tr><td>
                            <form action="process.php" method="POST">
                                <table align="left" border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                        <td>Dabartinis slaptažodis:</td>
                                        <td><input type="password" name="curpass" maxlength="30" value="
                                                   <? echo $form->value("curpass"); ?>"></td>
                                        <td><? echo $form->error("curpass"); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Naujas slaptažodis:</td>
                                        <td><input type="password" name="newpass" maxlength="30" value="
                                                   <? echo $form->value("newpass"); ?>"></td>
                                        <td><? echo $form->error("newpass"); ?></td>
                                    </tr>
                                    <tr>
                                        <td>E-paštas:</td>
                                        <td><input type="text" name="email" maxlength="50" value="
                                            <?
                                            if ($form->value("email") == "") {
                                                echo $session->userinfo['email'];
                                            } else {
                                                echo $form->value("email");
                                            }
                                            ?>">
                                        </td>
                                        <td><? echo $form->error("email"); ?></td>
                                    </tr>
                                    <tr><td colspan="2" align="right">
                                            <input type="hidden" name="subedit" value="1">
                                            <input type="submit" value="Atnaujinti"></td></tr>
                                    <tr><td colspan="2" align="left"></td></tr>
                                </table>
                            </form>

                            <?
//Nuoroda į pradžią
                            echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";
                            ?>

                        </td></tr>
                </table>

                <?
            } else {
                echo "<h1>Prisijungimas</h1>";
                if ($form->num_errors > 0) {
                    echo "<font size=\"2\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                }
                ?>

                <form action="process.php" method="POST">
                    <table align="left" border="0" cellspacing="0" cellpadding="3">
                        <tr><td>Vartotojo vardas:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
                        <tr><td>Slaptažodis:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
                        <tr><td colspan="2" align="left"><input type="checkbox" name="remember" <? if ($form->value("remember") != "") {
            echo "pažymėta";
        } ?>>
                                <font size="2">Atsiminti mane &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="sublogin" value="1">
                                <input type="submit" value="Prisijungti"></td></tr>
                        <tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Pamiršote slaptažodį?</a>]</font></td><td align="right"></td></tr>
                        <tr><td colspan="2" align="left"><br>Nesate užsiregistravę? <a href="register.php">Registruotis</a></td></tr>

                        <?
                        echo "<tr><td colspan=\"2\" align=\"left\"><br>";
                        echo "<b>Vartotojų iš viso:</b> " . $database->getNumMembers() . "<br>";
                        echo "Yra $database->num_active_users registruotų vartotojų ir ";
                        echo "$database->num_active_guests svečių svetainėje.<br><br>";
                        echo "</td></tr>";
                        ?>

                    </table>
                </form>

                <?
            } //Formos pabaiga
        }
        ?>

    </body>
</html>