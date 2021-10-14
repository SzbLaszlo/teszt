<?php
session_start();
require 'db.inc.php';

if(isset($_POST['user']) and isset($_POST['pw'])){
  $loginError = '';
  if(strlen($_POST['user'])==0) $loginError .= "Nem írtál be felhasználónevet";
  if(strlen($_POST['pw'])==0) $loginError .= "Nem írtál be jelszót";
  if($loginError==''){
    $sql="SELECT id, nev, jelszo FROM ulesrend WHERE felhasznalonev='".$_POST['user']."'  ";
    if(!$result = $conn->query($sql)) echo $conn->error;

    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        if(md5($_POST['pw']) == $row['jelszo']){
            $_SESSION['id'] = $row['id'];
            $_SESSION['nev'] = $row['nev'];
            header('Location: ulesrend.php');
            exit();
        }else $loginError .= 'Érvénytelen jelszó';
      }
    }
    else $loginError .= 'Érvénytelen felhasználónév.';
  }
}

?>
<!doctype html>
<html lang="HU">

<head>
  <meta charset="utf-8">
  <title>Belépés</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php



    $title = "Belépés";
    include 'htmlheader.inc.php';
?>
<body>

    <?php
    include 'menu.inc.php';
    ?>

<table>
  <tr>
    <th colspan="3">Belépés 
        <?php
            
            if(isset($_POST['user'])){
              echo $loginError;
            }
        ?>
        <form action="ulesrend.php" method="post">
            Felhasználó: <input type="text" name="user">
            <br>
            Jelszó: <input type="password" name="pw">
            <br>
            <input type="submit">
        </form>
    </th>
</table>
</body>
</html>