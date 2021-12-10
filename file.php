<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);


//kiírás
$myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
  }

//átnevezés
rename("/xampp/htdocs/teszt/newfile.txt","/xampp/htdocs/teszt/oldfile.txt");

//másolás
echo copy("oldfile.txt","copyfile.txt");

//törlés
unlink("oldfile.txt");

fclose($myfile);
?>