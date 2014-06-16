<?
include("include/session.php");
?>

<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Užmirštas slaptažodis</title>
<body>

<?
echo "<img src=\"pictures/top.png\" />"; 
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>Naujas slaptažodis</h1>";
      echo "<p>Naujas slaptažodis buvo sugeneruotas ir nusiųstas paštu. <br> "
          ."<br>Atgal į prisijungimo [<a href=\"index.php\">formą</a>]<br>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>Klaida</h1>";
      echo "<p>Įvyko klaida "
          ."siunčiant slaptažodį.<br> "
          ."<a href=\"index.php\">Pradžia</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<h1>Pamirštas slaptažodis</h1>
Naujas slaptažodis bus nusiųstas su Jūsų paskyra susietu e-pašto adresu.<br>
Įveskite vartotojo vardą:<br><br>
<? echo $form->error("user"); ?>
<form action="process.php" method="POST">
<b>Vartotojo vardas:</b> <input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>">
<input type="hidden" name="subforgot" value="1">
<input type="submit" value="Naujas slaptažodis">
<br><br>Atgal į prisijungimo [<a href=index.php>formą</a>]<br>
</form>

<?
}
?>

</body>
</html>
