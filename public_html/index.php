<?php
include("include/session.php");
?>

<html>
        <head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="icon" type="image/png" href="pictures/icon.png"/>
    <title>Kavinė</title>
	
       </head>
    <body>
<style>
	form {background-color:#F1FCA2;}
	body {background-color:#F1FCA2;}
</style>

        <?php
        echo "<img src=\"pictures/top.png\" /><br>";
        ?>

        <table cellpadding="0" cellspacing="0">
            <tr><td>
                    <?php
//Jei vartotojas prisijungęs
                    if ($session->logged_in) {
                        include("include/meniu.php");
                        ?>

                        <font color="green">
                        <br>
                        <h1>Pradinis sistemos puslapis (index.php).</h1>
                        </font>

                        <?php
//Jei vartotojas neprisijungęs, rodoma prisijungimo forma
//Jei atsiranda klaidų, rodomi pranešimai.
                    } else {
                        echo "<img src=\"pictures/prisijungimas.png\" /><br>";
                        if ($form->num_errors > 0) {
                            echo "<font size=\"2\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                        }
                        ?>

                        <form action="process.php" method="POST">
                            <table align="left" border="0" cellspacing="3" cellpadding="3" >
                                <tr><td><b>Prisijungimo vardas:</td><td><input type="text" name="user" maxlength="50" value="<?php echo $form->value("user"); ?>"></td><td><?php echo $form->error("user"); ?><b></td>
				        <td colspan="2" align="left"><input type="checkbox" name="remember" <?php if ($form->value("remember") != "") {
                                                  echo "Pažymėtas";
                                                     } ?>>
				        <font size="2">Atsiminti mane &nbsp;&nbsp;&nbsp;&nbsp;
				</tr>

                                <tr><td><b>Slaptažodis:</td><td><input type="password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>"></td><td><?php echo $form->error("pass"); ?><b></td>
				        <td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Pamiršote slaptažodį?</a>]</font></td><td align="right"></td>
				</tr>
			
                                        <!--hidden naudojamas perduoti duomenims, kurių neįvedė vartotojas,
                                        o pagal name atsirenkama, kurį metodą vykdyti faile process.php.
                                        -->
                                        <input type="hidden" name="sublogin" value="1">
                                        <tr><td colspan="2" align="right"><input type="submit" value="Prisijungti"></td></tr>
					<tr><td> <br> </td></tr>

                                 
                        </table>
                        </form>
			
			<?php
			 echo "<img src=\"pictures/naujas.png\" /><br>";
       			 ?>

			       <form action="process.php" method="POST">
                            <table align="left" border="0" cellspacing="2" cellpadding="2" >

 					<tr><b><td colspan="1" align="left" ><br><font size="5"><a href="register.php">Registracija</a></font></td><b></tr>
			</table>
                        </form>


                        <?php
                    }

                    echo "</td></tr><tr><td align=\"left\"><br><br>";
                    echo "<b>Vartotojų iš viso:</b> " . $database->getNumMembers() . "<br>";
                    echo "Yra $database->num_active_users registruotų vartotojų ir ";
                    echo "$database->num_active_guests svečių svetainėje.<br><br>";
                    include("include/view_active.php");
                    ?>

                </td></tr>
        </table>
    </body>
</html>