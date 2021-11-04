<?php
$szoveg = "Belépés";
$link = "belepes.php";
if(!empty($_SESSION["id"])) {
    $szoveg = $_SESSION["nev"].": Kilépés";
    $link = "index.php?logout-1";
}

$menupontok = array('index.php' => "Főoldal", 'ulesrend.php' => "Ülésrend", $link => $szoveg);

?>

<?php
foreach($menupontok as $key => $value){
    $active = '';
    if($_SERVER['REQUEST_URI'] == '/teszt/'.$key) $active = ' active';
    ?>
    <li class="nav-item<?php echo $active; ?>">
     <a class="nav-link" href="<?php echo $key; ?>"><?php echo $value; ?> </a>
    </li>
    <?php
}
?>
<div><a class="dropdown-item" href="index.php">Főoldal</a></div>
<div><a class="dropdown-item" href="ulesrend.php">Ülésrend</a></div>
<div><a class="dropdown-item" href="belepes.php?logout-1">
<?php
if(!empty($_SESSION['id'])) echo "Kilépés";
else echo "Belépés";
?>
</a></div>