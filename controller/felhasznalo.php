<?php

if(isset($_POST['user']) and isset($_POST['pw'])){
    $loginError = '';
    if(strlen($_POST['user'])==0) $loginError .= "Nem írtál be felhasználónevet";
    if(strlen($_POST['pw'])==0) $loginError .= "Nem írtál be jelszót";
    if($loginError==''){
      $sql="SELECT id, nev, jelszo FROM ulesrend WHERE felhasznalonev='".$_POST['user']."'  ";
      if(!$result = $conn->query($sql)) echo $conn->error;
      if($result->num_rows > 0){
        if($row=$result->fetch_assoc())
          $tanulo->set_user($row['id']. $conn);
        
          if(md5($_POST['pw']) == $tanulo->get_jelszo()){
              $_SESSION['id'] = $row['id'];
              $_SESSION['nev'] = $tanulo->get_nev();
              header('Location: ulesrend.php');
              exit();
          }else $loginError .= 'Érvénytelen jelszó';
        }
      }
      else $loginError .= 'Érvénytelen felhasználónév.';
    }

    include 'view/belepes.php';
?>