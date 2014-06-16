<?php
//Formuojamas meniu.
if (isset($session) && $session->logged_in) {
    $path = "";
    if (isset($_SESSION['path'])) {
        $path = $_SESSION['path'];
        unset($_SESSION['path']);
    }
    ?>
>

    <table align="left" width=300% border="0" cellspacing="3" cellpadding="3" style="background-color:#F7C567;font-size:23px;font-family:Bradley Hand ITC;" class="meniu"  };>
        <?php
        echo "Vartotojas: <b>$session->username</b> <br>";
        echo "</td></tr><tr><td>";
        echo "|<a href=\"" . $path ."meniu.php\">  <b> Meniu </b> </a>| &nbsp;&nbsp;"
        . "|<a href=\"" . $path . "userinfo.php?user=$session->username\"> <b>  Mano informacija  </b> </a>| &nbsp;&nbsp;"
        . "|<a href=\"" . $path . "uzsakymai.php\"> <b> Uzsakymai</b> </a>| &nbsp;&nbsp;";
        
        //Trečia operacija rodoma valdytojui ir administratoriui
        if ($session->isManager() || $session->isAdmin()) {
            echo "|<a href=\"" . $path . "vartotojai.php\"> <b> Vartotojai </b> </a>| &nbsp;&nbsp;";

        }
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($session->isAdmin()) {
            echo "|<a href=\"" . $path . "admin/admin.php\"> <b> Administratoriaus sąsaja </b></a>| &nbsp;&nbsp;"
	        . "|<a href=\"" . $path . "logai.php\"> <b> Logai </b> </a>| &nbsp;&nbsp;";

        }
        echo "|<a href=\"" . $path . "process.php\"> <b> Atsijungti </b> </a>|";
        echo "</td></tr>";
        ?>
    </table> 
    <?php
}
?>

<?php
/* {

  function Meniu($session) {
  if (isset($session) && $session->logged_in) {
  $path = "";
  if (isset($_SESSION['path'])) {
  $path = $_SESSION['path'];
  unset($_SESSION['path']);
  }
  ?>
  <table width=100% border="0" cellspacing="1" cellpadding="3" class="meniu">
  <?php
  echo "<tr><td>";
  echo "Prisijungęs vartotojas: <b>$session->username</b> <br>";
  echo "</td></tr><tr><td>";
  echo "[<a href=\"" . $path . "userinfo.php?user=$session->username\">Meniu</a>] &nbsp;&nbsp;"
  . "[<a href=\"" . $path . "useredit.php\">Mano inforacija</a>] &nbsp;&nbsp;"
  . "[<a href=\"" . $path . "operacija1.php\">Uzsakymai</a>] &nbsp;&nbsp;"
  //Trečia operacija rodoma valdytojui ir administratoriui
  if ($session->isManager() || $session->isAdmin()) {
  echo "[<a href=\"" . $path . "operacija3.php\">Demo operacija3</a>] &nbsp;&nbsp;";
  }
  //Administratoriaus sąsaja rodoma tik administratoriui
  if ($session->isAdmin()) {
  echo "[<a href=\"" . $path . "admin/admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
  echo "[<a href=\"" . $path . "uzsakymo_ivedimas.php\">Prekių įvedimas</a>] &nbsp;&nbsp;";
  }
  echo "[<a href=\"" . $path . "process.php\">Atsijungti</a>]";
  echo "</td></tr>";
  ?>
  </table>
  <?php
  }
  }

  }

  //Sukuriamas objektas
  if (isset($session)) {
  $meniu = new Meniu($session);
  }
 */
?>
