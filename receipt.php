
<?php
$filename ="/home/student/ics19915/receipt/test.txt";

if (touch($filename)) {
    echo $filename . ' modification  has been changed ';
} else {
    echo 'Sorry, could not change modification  of ' . $filename;
}

//$myfile = touch($newFile) or die("Unable to open file!");
//echo $myfile;
//fclose($newFile);
//chmod($newFile, 0777); 
?>