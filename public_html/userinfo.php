<?
include("include/session.php");
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Vartotojo paskyros duomenys</title>
<body>
<style>
<!------------------------------------------------->
	form {background-color:#F1FCA2;}
	body {background-color:#F1FCA2;}
<!------------------------------------------------->
</style>

<?
echo "<img src=\"pictures/top.png\" /><br>"; 
//Jei vartotojas prisijungęs
if($session->logged_in){
   include("include/meniu.php");
   
   /* Requested Username error checking */
   if (isset($_GET['user'])){
      $req_user = trim($_GET['user']);
   } else {
      $req_user = null;
   }
   if(!$req_user || strlen($req_user) == 0 ||
      !eregi("^([0-9a-z])+$", $req_user) ||
      !$database->usernameTaken($req_user)){
	  echo "<br><br>";
      die("Vartotojas nėra užsiregistravęs");
   }

   /* Display requested user information */
   $req_user_info = $database->getUserInfo($req_user);
   echo "<br><br><br><b>Vartotojo vardas: ".$req_user_info['username']."</b><br>";
   echo "<b>E-paštas:</b> ".$req_user_info['email']."<br>";
   
   //Nuoroda į pradžią
   echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";
   
   
//Jei vartotojas neprisijungęs, rodoma prisijungimo forma
//Jei atsiranda klaidų, rodomi pranešimai.
} else {
   echo "<h1>Prisijungimas</h1>";
   if($form->num_errors > 0){
      echo "<font size=\"2\" color=\"#ff0000\">Klaidų: ".$form->num_errors."</font>";
   }
?>

<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Vartotojo vardas:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>"></td><td><? echo $form->error("user"); ?></td></tr>
<tr><td>Slaptažodis:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>"></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember" <? if($form->value("remember") != ""){ echo "pažymėta"; } ?>>
<font size="2">Atsiminti mane &nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Prisijungti"></td></tr>
<tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Pamiršote slaptažodį?</a>]</font></td><td align="right"></td></tr>
<tr><td colspan="2" align="left"><br>Nesate užsiregistravę? <a href="register.php">Registruotis</a></td></tr>

<?
echo "<tr><td colspan=\"2\" align=\"left\"><br>";
echo "<b>Vartotojų iš viso:</b> ".$database->getNumMembers()."<br>";
echo "Yra $database->num_active_users registruotų vartotojų ir ";
echo "$database->num_active_guests svečių svetainėje.<br><br>";
echo "</td></tr>";
?>

</table>
</form>

<?
} //Formos pabaiga
?>
</body>
</html>