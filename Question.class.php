<?php 	
/**
* 
*/
class Questions 
{
	private $host='localhost';
	private $bdd;
	
	public function __construct($dbName, $dbLogin, $dbPass)
	{
		$this->loadDatas($dbName, $dbLogin, $dbPass);
	}

	public function getQuestion($id)
	{
		$req=$this->bdd->prepare("SELECT id, libelle FROM questions WHERE id>:idQuestion LIMIT 1");
		$req->execute(array(
			"idQuestion" =>  $id
		));
		$reponse = $req->fetch();
		if(sizeof($reponse)!=0)
		{
			return $reponse; 
		}
		else
		{
			return false;
		}
	}

	public function getReponses($rep)
	{
		$req=$this->bdd->prepare("SELECT * FROM reponses WHERE id_question=:idQuestion AND reponse=:rep");
		$req->execute(array(
			"idQuestion" =>  $rep[0],
			"rep" => $rep[1]
		));
		$retour=array();
		foreach($req->fetchAll() as $reponse){
			$retour[]=$reponse['id_personnage']; 
		}
		return $retour;
	}

	public function getPersonnage($id_personnage)
	{
		$req=$this->bdd->prepare("SELECT * FROM personnages WHERE id=:idPerso");
		$req->execute(array(
			"idPerso" =>  $id_personnage
		));
		$retour=$req->fetch();
		return $retour;
	}

	public function loadDatas($dbName, $dbLogin, $dbPass){
		$this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$dbName, $dbLogin, $dbPass, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			));
	}
}
?>