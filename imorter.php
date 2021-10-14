<?php

$servername = "localhost";
$username = "phpteszt";
$password = "NZifi6xnsaHMBKqU";
$dbname = "teszt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php

  $osztaly = array(
    array("Kulhanek László"),
    array("Molnár Gergő", "Bakcsányi Dominik", "Füstös Lóránt", "Orosz Zsolt", "Harsányi László"),
    array("Kereszturi Kevin", "Juhász Levente", "Szabó László", "Sütő Dániel", "Détári Klaudia"),
    array("Fazekas Miklós", NULL, "Gombos János", "Bicsák József")
  );

  foreach($osztaly as $sor => $tomb){
    foreach($tomb as $oszlop => $tanulo){
      
      $sql = "INSERT INTO `ulesrend` ( `nev`, `sor`, `oszlop`) VALUES ( '$tanulo', $sor + 1, $oszlop + 1);";

      if ($conn->query($sql) === TRUE) {
        echo "$tanulo beszúrásara került. ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }

  $hianyzok = array(
    array(0),
    array(3),
    array(1),
    array()
  );

  $en = array(
    array(),
    array(),
    array(2),
    array()
  );

  $tanar = array(
    array(),
    array(),
    array(),
    array(3)
  );

  ?>
<table>

  <?php
  foreach($osztaly as $sor => $tomb){
    echo '<tr>';
    foreach($tomb as $oszlop => $tanulo){
      if($tanulo ===  NULL) echo '<td class="empty"></td>';
      else{
          $plusz = '';
          if(in_array($oszlop, $hianyzok[$sor])) $plusz .= ' class="missing"';
          if(in_array($oszlop, $en[$sor])) $plusz .= ' id="me"' ;
          if(in_array($oszlop, $tanar[$sor])) $plusz .= ' colspan="2"';
          echo '<td'.$plusz.'>'.$tanulo.'</td>';
      }

    }
    echo '</tr>';
  }

  ?>

  <tr>
    <td><?php echo $osztaly[0][0]; ?></td>
  </tr>
  
  <tr>
    <td><?php echo $osztaly[1][0]; ?></td>
    <td><?php echo $osztaly[1][1]; ?></td>
    <td><?php echo $osztaly[1][2]; ?></td>
    <td><?php echo $osztaly[1][3]; ?></td>
    <td><?php echo $osztaly[1][4]; ?></td>
  </tr>

  <tr>
    <td><?php echo $osztaly[2][0]; ?></td>
    <td><?php echo $osztaly[2][1]; ?></td>
    <td><?php echo $osztaly[2][2]; ?></td>
    <td ><?php echo $osztaly[2][3]; ?></td>
    <td><?php echo $osztaly[2][4]; ?></td>
  </tr>
  
  <tr>
    <td><?php echo $osztaly[3][0]; ?></td>
    <td><?php echo $osztaly[3][1]; ?></td>
    <td><?php echo $osztaly[3][2]; ?></td>
    <td><?php echo $osztaly[3][3]; ?></td>
  </tr>
  
</table>
<body>
</html>