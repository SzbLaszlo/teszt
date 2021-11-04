<html>
<table>
  <tr>
    <th colspan="3">Belépés 
        <?php
            
            if(isset($_POST['user'])){
              echo $loginError;
            }else{
              echo "<h2>Belépés</h2>";
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