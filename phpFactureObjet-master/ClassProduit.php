<?php include('ConnexionBDD.php'); ?><?php


//Classe Produit
class Produit{


	//Données Membres
	private $NumProduit;
	private $Designation;
	private $PrixUnit;




	//Fcts Membres
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
	public function __construct($mNum = NULL ,$mDes = NULL,$mPrix= NULL){

		//echo "Contructeur <br/>";
		$this->NumProduit=$mNum;
		$this->Designation=$mDes;
		$this->PrixUnit=$mPrix;


	}

	public function _Designationtruct(){


	}


	//Mutateurs

	public function getNumProduit(){


		return $this->NumProduit;
	}

	public function getDes(){


		return $this->Designation;
	}

	public function getPrixHt(){


		return $this->PrixUnit;
	}



	public function setPrixUnit($mNum){

		$this->PrixUnit=$mNum;

	}

	public function setDes($mDes){

		$this->Designation=$mDes;

	}

	public function setPrix($mPrixHt){

		$this->PrixUnit=$mPrixHt;

	}



	public function affiche(){

		echo $this->PrixUnit."<br/>";
		echo $this->Designation."<br/>";
		echo $this->PrixUnit."<br/>";

	}



}




?>
