<?php
class logic{	
	function __construct() { 		
    }
	
	function getQuestion(){
		$kata= array("buku","meja","tulis","guru","murid");
		$random=array_rand($kata,1);		
		return $kata[$random];
	}

	function getFrom($question, $point){
		$html = '<form action="test.php" method="post">
			<input type="text" name="answer">
			<input type="hidden" name="question" value="'.$question.'">
			<input type="hidden" name="point" value="'.$point.'">
			<input type="submit">
			</form>';	
		return $html;
	}

	function cek($reqVal, $result){
		if ($reqVal==$result){
			return array("result"=> true, "message"=>  "Benar! point anda : ");
		}else{
			return array("result"=> false, "message"=> "SALAH! Silakan coba lagi");
		}
	}
}
?>