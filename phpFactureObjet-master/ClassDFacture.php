<?php

//Classe DFacture

class DFacture{


	//Données Membres
	private $Qte;
	private $NumFacture;
	private $NumProduit;


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
	public function __construct(){



	}

	public function __destruct(){



	}


	//Mutateurs

	public function getQte(){


		return $this->Qte;
	}


	public function setQte($mQte){

		$this->Qte=$mQte;

	}

	public function setFact(Facture $mFact){


		 $this->NumFacture=$mFact;
	}

	public function setProduit(Produit $mProd){


		 $this->NumProduit=$mProd;
	}


	public function affiche(){

		echo $this->Qte."<br/>";


	}



}







?>
