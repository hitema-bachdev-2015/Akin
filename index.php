<?php
	include('Question.class.php');
	include('View.class.php');
	session_start();
	$question=new Questions("akin", "root", "");

	//var_dump($_SESSION);
	$view=new View("accueil.html");
	if($_POST){
		switch ($_POST['action']) {
			case 'C':
				switch($_POST['reponse']){
					case 'Oui':
						$_SESSION['reponses'][]=[$_SESSION['question']['id'], true];
						$_SESSION['question']=$question->getQuestion($_SESSION['question']['id']);
						break;
					case 'Non':
						$_SESSION['reponses'][]=[$_SESSION['question']['id'], false];
						$_SESSION['question']=$question->getQuestion($_SESSION['question']['id']);
						break;
					default:
						break;
				}
				if(!is_array($_SESSION['question']))
				{
					$tab=array();
					$tabIntersect=array();
					foreach($_SESSION['reponses'] as $key=>$value){
						$tab[$key]=$question->getReponses($value);
						//die(print_r($tab[$key]));
						if(!$key)
						{
							$tabIntersect=$tab[$key];
							//die(var_dump($tabIntersect));
						}
						$tabIntersect=$key>0?array_intersect($tabIntersect , $tab[$key]):$tabIntersect;
						//die(var_dump($tabIntersect));
					}
					//var_dump($tabIntersect);
					$tabRep=array_merge(array(), $tabIntersect);
					//die(print_r($tabRep));
					$_SESSION['personnage']=$question->getPersonnage($tabRep[0]);
					$view=new View("fin.html");
				}
				break;
			case 'D':
				unset($_SESSION['reponses']);
				$view=new View("accueil.html");
				$_SESSION['question']=$question->getQuestion(0);
				break;
			default:
				# code...
				break;
		}	
	}
	else
	{	
		unset($_SESSION['reponses']);
		$_SESSION['question']=$question->getQuestion(0);				
	}
	//var_dump($_SESSION);
	echo $view->render($_SESSION);
?>