<?php

require "config.php";




$qst_id=$_POST['qst_id'];
$selectedLanguage=$_POST['selectedLanguage'];


//$selectedLanguage=array('A','B','C','D');
//$qst_id='3';





//$answers='';





$answers = join("",$selectedLanguage);
echo $answers;


$sql=$dbo->prepare("insert into poll_answer(email,qst_id,opt) values('email',$qst_id,'$answers')");
$sql->bindParam(':opt',$opt,PDO::PARAM_STR, 50);
$sql->execute();











?>