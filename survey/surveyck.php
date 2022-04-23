<?Php
session_start();
//error_reporting(0);// With this no error reporting will be there
require "config.php";


//question number
$qst_id=$_POST['qst_id'];

//actual correct answer
$correct=$_POST['correct'];

//user choices
$selectedLanguage=$_POST['selectedLanguage'];


//$correct='AC';


//Join array in string
$opt = join("",$selectedLanguage);
//echo $opt;


$mark = '';

//user choice vs answer for mark
if($opt == $correct)
$mark='1';
else
$mark='0';
;

$sql=$dbo->prepare("insert into poll_answer(email,qst_id,opt,correct, mark) values('email',$qst_id,'$opt','$correct','$mark')");
$sql->bindParam(':opt',$opt,PDO::PARAM_STR, 50);
$sql->execute();



//////// Collected from databse ///////
$qst_id=$qst_id+1;
$no_questions = $dbo->query("select count(qst_id) from poll_qst2")->fetchColumn();
if($qst_id > $no_questions){
$next='T'; // Flag is set to display thank you message
}else{
$next='T'; // Flag is set to display next question

$count=$dbo->prepare("select * from poll_qst2 where qst_id=$qst_id  and exam  = 'Two' ");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
}
$main= array("data"=>array("q1"=>"$row->qst","opt1"=>"$row->opt1","opt2"=>"$row->opt2","opt3"=>"$row->opt3","opt4"=>"$row->opt4","opt5"=>"$row->opt5","opt6"=>"$row->opt6","_answer"=>"$row->_answer","qst_total"=>"$row->qst_total","qst_id"=>"$qst_id"),"next"=>"$next");
// end of collection from database //////


echo json_encode($main);

////////////
?>