<?Php
session_start();
?>

<html>

<head>

<title>CCNA Exam Practice</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<script>
$(document).ready(function() {
	
	
	$("#btnSubmit").button().click(function(){
		$('#maindiv').hide('slide', {direction: 'left'}, 10);
			
		$('label[for=opt1]').html('question');
		$('label[for=opt2]').html('question');
		$('label[for=opt3]').html('question');
		$('label[for=opt4]').html('question');
		$('label[for=opt5]').html('question');
		$('label[for=opt6]').html('question');
		//$('label[for=opt6]').html('question').remove();
		
		
		 qst_id = $("#qst_id").val();
		 //alert(qst_id);
			
		 correct = $("#my_Label").text();
		alert(correct);
			 
		 var selectedLanguage = new Array();
		 $('input[name="language"]:checked').each(function() {
		 selectedLanguage.push(this.value);
		  });
			//alert(selectedLanguage);
			
			
			$.post( "surveyck.php", {"qst_id":qst_id, "correct":correct, "selectedLanguage":selectedLanguage }, function(return_data,status){
			
				//alert(selectedLanguage);
			
				//alert(return_data.data.qst_total);
				
				qst_total = (return_data.data.qst_total);
				
				//actual_answer = (return_data.data.answer);
				//alert(actual_answer);
				//correct = actual_answer;
				
				//qst_total = 4;
				//alert("a");
				//alert(return_data.next);
				//alert(return_data.data.answer);
				
				switch(qst_total) {
				 case "4":
				  
					//alert("4 here");
					//alert(return_data.data._img);
					
					$('#q1').html(return_data.data.q1);
					$('label[for=opt1]').html(return_data.data.opt1);
					$('label[for=opt2]').html(return_data.data.opt2);
					$('label[for=opt3]').html(return_data.data.opt3);
					$('label[for=opt4]').html(return_data.data.opt4);
					$('label[for=_answer]').html(return_data.data._answer);
					$("#qst_id").val(return_data.data.qst_id);
					//$("#my_image").attr("src",'img/2.png');
					$("#my_image").attr("src",'img/' + return_data.data.qst_id + 	'.jpg');
				  break;
				case "5":
					//alert("5 here");
					$('#q1').html(return_data.data.q1);
					$('label[for=opt1]').html(return_data.data.opt1);
					$('label[for=opt2]').html(return_data.data.opt2);
					$('label[for=opt3]').html(return_data.data.opt3);
					$('label[for=opt4]').html(return_data.data.opt4);
					$('label[for=opt5]').html(return_data.data.opt5);
					$('label[for=_answer]').html(return_data.data._answer);
					$("#qst_id").val(return_data.data.qst_id);
					$("#my_image").attr("src",'img/' + return_data.data.qst_id + 	'.jpg');
				  break;
				case "6":
					//alert("6 here");	
					$('#q1').html(return_data.data.q1);
					$('label[for=opt1]').html(return_data.data.opt1);
					$('label[for=opt2]').html(return_data.data.opt2);
					$('label[for=opt3]').html(return_data.data.opt3);
					$('label[for=opt4]').html(return_data.data.opt4);
					$('label[for=opt5]').html(return_data.data.opt5);
					$('label[for=opt6]').html(return_data.data.opt6);
					$('label[for=_answer]').html(return_data.data._answer);
					$("#qst_id").val(return_data.data.qst_id);
					$("#my_image").attr("src",'img/' + return_data.data.qst_id + 	'.jpg');
				  
				  break;
				 default:
				 // code to be executed
				}; 
			
				
				if(return_data.next=='T'){
					
				
				
				}
				else{$('#maindiv').html("End of questions");}

			},"json"); 
			
			
			
			
			
			$('input:checkbox').removeAttr('checked');
			
			
			//$(this).attr('src', 'img/ph.png');
			//$.attr('src', 'img/ph.png');
			
			$('#maindiv').show('slide', {direction: 'right'}, 1000);

				 });

   });
</script>
<br><br><br><br><br>
<?Php
require "config.php";
$count=$dbo->prepare("select * from poll_qst2 where qst_id= 183  and exam  = 'Two' ");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
echo "
<div id='maindiv' class='maindiv'>

	
	<table>
		
		
		<tr><td>
			<h3 id='q1'>$row->qst</h3></td></tr>
		<tr><td>
			<input  name='qst_id' id=qst_id value=$row->qst_id>
		
		<tr><td>
			  <input type='checkbox' id='opt10' name='language' value='A'>  <label for='opt1' class='lb'>$row->opt1</label>
		</td></tr>
		
		<tr><td>
			  <input type='checkbox' id='opt20' name='language' value='B'>  <label for='opt2' class='lb'>$row->opt2</label>
		</td></tr>

		<tr><td>
			  <input type='checkbox' id='opt30' name='language' value='C'>  <label for='opt3' class='lb'>$row->opt3</label>
		</td></tr>
		
		<tr><td>
			  <input type='checkbox' id='opt40' name='language' value='D'>  <label for='opt4' class='lb'>$row->opt4</label>			  
		</td></tr>


		<tr><td>
			  <input type='checkbox' id='opt50' name='language' value='E'>  <label for='opt5' class='lb'>$row->opt5</label>
		</td></tr>
		
		<tr><td>
			  <input type='checkbox' id='opt60' name='language' value='F'>  <label for='opt6' class='lb'>$row->opt6</label>			  
		</td></tr>

		<tr><td>
			<input id = 'btnSubmit' type='submit'/>
			
			<label id='my_Label'  style='color:#f2f2f2' for='_answer' class='lb'>$row->_answer</label>
			
		</td></tr>

		
		
		<tr><td>
			 <img  id='my_image' src='img/$row->qst_id.jpg'/>
		</td></tr>
		
	</table>	

</div>



";
?>


</body>
</html>
