<?php
session_start();
//error_reporting(0);// With this no error reporting will be there
require "config.php";


$qst_id=$_POST['qst_id'];
$selectedLanguage=$_POST['selectedLanguage'];
$check='';



$answers = join("",$selectedLanguage);
//echo $answers;


$sql=$dbo->prepare("insert into poll_answer(email,qst_id,opt) values('email',$qst_id,'$answers')");
$sql->bindParam(':opt',$opt,PDO::PARAM_STR, 50);
$sql->execute();





//////// Collected from databse ///////
$qst_id=$qst_id+1;
$no_questions = $dbo->query("select count(qst_id) from poll_qst")->fetchColumn();
if($qst_id > $no_questions){
$next='F'; // Flag is set to display thank you message
}else{
$next='T'; // Flag is set to display next question

$count=$dbo->prepare("select * from poll_qst where qst_id=$qst_id");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
}
$main= array("data"=>array("q1"=>"$row->qst","opt1"=>"$row->opt1","opt2"=>"$row->opt2","opt3"=>"$row->opt3","opt4"=>"$row->opt4","qst_id"=>"$qst_id"),"next"=>"$next");
// end of collection from database //////


echo json_encode($main);


?>