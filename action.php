<?php
 $path = 'data.txt';
 if (isset($_POST['submit'])) {

    $fh = fopen($path,"a+");
    $string = ' Emer: '.$_POST['name'].' Mbiemer: '.$_POST['surname'].' Email: '.$_POST['email'].' Telefon: '.$_POST['phone'].' Mesazhi: '.$_POST['message'].' -FUND ';
    fwrite($fh,$string);
    fclose($fh);

    header("Location: index.php");
}
?>
