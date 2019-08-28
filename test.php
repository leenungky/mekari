<?php		
	include("logic.php");
	$logic = new logic();
	if ($_SERVER['REQUEST_METHOD']=="POST"){		
		$cek = $logic->cek($_POST["answer"], $_POST["question"]);
		if ($cek["result"]){
			echo displaySukses($cek, $logic);
		}else{
			echo displayFailed($cek, $logic);
		}		
	}else{
		echo displayFirst($logic);
	}

	function displaySukses($cek = array(), $logic){
		$point = 0;
		if (isset($_POST["point"])){
			$point = $_POST["point"];
			$point = $point+1;
		}

		$question = $logic->getQuestion();
		$html = "Tebak kata: ".$question;
		$html .= "<br>";
		$html .= $logic->getFrom($question, $point);			
		if (isset($cek)){
			$html .= "<br>";
			$html .= $cek["message"]." ".$point;		
		}
		return $html;
	}

	function displayFailed($cek, $logic){
		$question = $_POST["question"];
		$point = $_POST["point"];
		$html  = "Tebak kata: ".$question;
		$html .= "<br>";
		$html .= $logic->getFrom($question, $point);				
		$html .= $cek["message"];
		return $html;		
	}

	function displayFirst($logic){
		$question = $logic->getQuestion();
		$html = "Tebak kata: ".$question;
		$html .= "<br>";
		$html .= $logic->getFrom($question, $point);
		return $html;
	}

	
?>