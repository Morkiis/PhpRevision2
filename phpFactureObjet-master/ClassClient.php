
<?php include('ConnexionBDD.php'); ?><?php

//classe Client
class Client{


	//Données Membres
	private $NumClient;
	private $Nom;
	private $Prenom;
	private $Adresse;
	private $CodePostal;
	private $Ville;
	private $Pays;


	private $_collectFacture=array();



	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);

	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }
	}

	//Fcts Membres


/*	public function __construct($mId,$mNom,$mPrenom,$mAdr,$mCp,$mVille,$mPays=""){

		//echo "Contructeur <br/>";
		$this->NumClient=$mId;
		$this->Nom=$mNom;
		$this->Prenom=$mPrenom;
		$this->Adresse=$mAdr;
		$this->CodePostal=$mCp;
		$this->Ville=$mVille;
		$this->Pays=$mPays;



	}*/

	public function __destruct(){



	}



	//Mutateurs

	public function getId(){


		return $this->NumClient;
	}

	public function getNom(){


		return $this->Nom;
	}

	public function getPrenom(){


		return $this->Prenom;
	}

	public function getAdresse(){


		return $this->Adresse;
	}

	public function getCp(){

		return $this->CodePostal;
	}


	public function getVille(){

		return $this->Ville;

	}

	public function getPays(){

		return $this->Pays;

	}

	public function setIdClient($mId){

		$this->NumClient=$mId;

	}

	public function setNom($mNom){

		$this->Nom=$mNom;

	}

	public function setPrenom($mNom){

		$this->Prenom=$mPrenom;

	}

	public function setAdresse($mAdresse){

		$this->Adresse=$mAdresse;

	}

	public function setCp($mCp){

		$this->CodePostal=$mCp;

	}

	public function setVille($mVille){

		$this->Ville=$mVille;

	}

	public function setPays($mPays){

		$this->Pays=$mPays;

	}

	public function affiche(){

		echo $this->NumClient."<br/>";
		echo $this->Nom."<br/>";
		echo $this->Prenom."<br/>";
		echo $this->Adresse."<br/>";
		echo $this->CodePostal."<br/>";
		echo $this->Ville."<br/>";
		echo $this->Pays."<br/>";
		//echo $this->_collectFacture[$i]->affiche();"<br/>";

		// Affichage des produits dans la facture
  		foreach(self::getFactClient() as $valeur) {

    		echo $valeur->affiche().'<br/>';

  		}

	}



	public function getFactClient(){

		return $this->_collectFacture;

	}

	public function addFature(Facture $mCollection){

		if (!in_array($mCollection,$this->_collectFacture)){
			$mCollection->setClient($this);
			$this->_collectFacture[]=$mCollection;
		}



	}



}


?>
