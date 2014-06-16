<?
include("include/session.php");
?>

<html>
    <title>Registracija</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <body>
<style>
<!------------------------------------------------->
	form {background-color:#F1FCA2;}
	body {background-color:#F1FCA2;}
<!------------------------------------------------->
</style>

        <?
        echo "<img src=\"pictures/top.png\" /><br>";
        /**
         * The user is already logged in, not allowed to register.
         */
        if ($session->logged_in) {
            echo "<h1>Registruotas</h1>";
            echo "<p>Jūs, <b>$session->username</b>, jau esate užsiregistravęs vartotojas sistemoje. "
            . "<a href=\"index.php\">Pradžia</a>.</p>";
        }
        /**
         * The user has submitted the registration form and the
         * results have been processed.
         */ else if (isset($_SESSION['regsuccess'])) {
            /* Registracija sėkminga */
            if ($_SESSION['regsuccess']) {
                echo "<h1>Užsiregistravote!</h1>";
                echo "<p>Ačiū, <b>" . $_SESSION['reguname'] . "</b>, duomenys buvo sėkmingai įvesti į duomenų bazę, galite "
                . "<a href=\"index.php\">prisijungti</a>.</p>";
            }
            /* Registracija nesėkminga */ else {
                echo "<h1>Registracija nesėkminga</h1>";
                echo "<p>Atsiprašome, bet vartotojo <b>" . $_SESSION['reguname'] . "</b>, "
                . " registracija nebuvo sėkmingai baigta.<br>Bandykite vėliau.</p>";
            }
            unset($_SESSION['regsuccess']);
            unset($_SESSION['reguname']);
        } else {
            ?>

            <img src=pictures/registracija.png /><br>
            <?
            if ($form->num_errors > 0) {
                echo "<font size=\"2\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
            }
            ?>
            <form action="process.php" method="POST">
                <table align="left" border="0" cellspacing="0" cellpadding="3">
                    <tr><td>Vartotojo vardas:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
	<tr><td>Vartotojo pavardė:</td><td><input type="text" name= name="pavarde" maxlenght="40" value="<? echo $form->value("pavarde"); ?>"></td><td><? echo $form->error("pavarde"); ?></td></tr>
                    <tr><td>Slaptažodis:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
                    <tr><td>E-paštas:</td><td><input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>"></td><td><? echo $form->error("email"); ?></td></tr>
        <tr><td>Adresas:</td><td><input type="text" name="adress" maxlenght="40" value="<? echo $form->value("adress"); ?>"></td><td><? echo $form->error("adress"); ?></td></tr>
	<tr><td>Telefono nr:</td><td><input type="text" name="phone" maxlenght="10" value="<? echo $form->value("phone"); ?>"></td><td><? echo $form->error("phone"); ?></td></tr>
        
		        <tr><td colspan="2" align="right">
                            <input type="hidden" name="subjoin" value="1">
                            <input type="submit" value="Registruotis"></td></tr>
                    <tr><td colspan="2" align="left">
                            <br>Atgal į prisijungimo [<a href=index.php>formą</a>]<br>
                        </td></tr>
                </table>
            </form>

            <?
        }
        ?>

    </body>
</html>
