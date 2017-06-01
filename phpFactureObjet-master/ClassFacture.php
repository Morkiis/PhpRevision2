<?php


//Classe Facture
class Facture{


	//Données Membres
	private $NumFacture;
	private $DateFacture;
	private $_ModeReglement;

	private $_Client;
	private $_CollectProduits=array();//on peut remplacer ces collections collectProduit et QteProduits par une collection de DFacture
	private $_QteProduits=array();




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


	public function __construct($mNum,$mDate,$mModeReglement){

		//echo "Contructeur <br/>";
		$this->NumFacture=$mNum;
		$this->DateFacture=$mDate;
		$this->_ModeReglement=$mModeReglement;



	}

	public function __destruct(){

	}

	//Mutateurs
	public function getNumFacture(){


		return $this->NumFacture;
	}

	public function getDate(){


		return $this->DateFacture;
	}

	public function getReg(){


		return $this->_ModeReglement;
	}



	public function setNumFacture($mNum){

		$this->NumFacture=$mNum;

	}

	public function setDate($mDate){

		$this->DateFacture=$mDate;

	}

	public function setReg($mReg){

		$this->_ModeReglement=$mReg;

	}

	public function setClient(Client $mClient){

			 $this->_Client=$mClient;
	}


	private function getProduits(){

		return $this->_CollectProduits;

	}


	public function addProduits(Produit $mProd,$Quantite){

		/*if (!in_array($mProd,$this->_CollectProduits)){

			$this->_CollectProduits[]=$mProd;
		}*/

		$setDfact=new DFacture();

		//if (!in_array($mProd,$this->_CollectProduits)){

			$this->_CollectProduits[]=$mProd;
			$this->_QteProduits[]=$Quantite;

			$setDfact->setProduit($mProd);
			$setDfact->setFact($this);
			$setDfact->setQte($Quantite);
		//}
	}

	public function affiche(){

		echo $this->NumFacture."<br/>";
		echo $this->DateFacture."<br/>";
		echo $this->_ModeReglement."<br/>";

		// Affichage des produits dans la facture

		foreach(self::getProduits() as $key => $valeur){


				$valeur->affiche();
				echo $this->_QteProduits[$key]."<br/>";
		}







  		/*foreach(self::getProduits() as $key=>$valeur) {


    		print_r($valeur);



  		}*/




	}


}









?>
