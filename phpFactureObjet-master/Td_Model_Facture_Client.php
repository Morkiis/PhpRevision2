<?php

include_once "ClassClient.php";
include_once "ClassFacture.php";
include_once "ClassProduit.php";
include_once "ClassDFacture.php";
include_once "ClassManager.php";


?>


<?php


	//programme principal
	/*$mClient=new Client(1,"Nom","Prenom","Adresse","CodePostal","Ville","Pays");

	$mClient->affiche();

	$date = new DateTime();

	$mFacture=new Facture(1,$date->format('Y-m-d'),"CB");

	$mFacture->affiche();

	$mProduit=new Produit(1,"Des",10);

	$mProduit->affiche();

	$mQteProduitsFacture=new DFacture(50);

	$mQteProduitsFacture->affiche();*/

	$date = new DateTime();

	$mClient=new Client(1,"Nom","Prenom","Adresse","CodePostal","Ville","Pays");

	$mProduit=new Produit(1,"Ecran 4k",400);

	$prod = new Produit(4,"Tulipe",20);

	$db = new PDO('mysql:host=localhost;dbname=facture', 'root', '');
	$manager = new ProdManager($db);

	$manager->add($prod);

	//$qteProd1=new DFacture(10);

	$tProduit=new Produit(2,"test",100);

	$CodePostalroduit=new Produit(3,"toto",100);

	//$qteProd2=new DFacture(20);

	//$mProduit->addQteProduits($qteProd1,10);

	//$tProduit->addQteProduits($qteProd2,20);

	/*$arrObj=array();
	$arrObj[]=$mProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;*/

	$mFacture=new Facture(1,$date->format('Y-m-d'),"CB");

//for($i=0;$i<10;$i++){

		$mFacture->addProduits($mProduit,10);

	//}

	$mFacture2=new Facture(2,$date->format('Y-m-d'),"cheque");

	for($i=0;$i<5;$i++){

		$mFacture->addProduits($tProduit,20);

	}

		$mFacture->addProduits($CodePostalroduit,20);

	//$mFacture->affiche();

	$mClient->addFature($mFacture);

	$mClient->addFature($mFacture2);

	$mFacture2->addProduits($CodePostalroduit,20);


	$mClient->affiche();

























	/*$mClient->addFature($mFacture);

	$mClient->addFature($mFacture2);

	// Affichage des infos factures
  	foreach($mClient->getFactClient() as $valeur) {

    	echo $valeur->affiche() ,'<br/>';
  	}

	$mClient->affiche(1);*/

	//$mFacture->affiche();



	/*$_collectFacture=array();

	$_collectFacture[]=$mFacture;

	$_collectFacture[]=$mFacture2;

	echo $_collectFacture[0]->getReg();

	echo $_collectFacture[1]->getReg();*/









?>
<?php
$perso = new Produit([
  'NumProduit' => 2,
  'Designation' => 'trucccc',
  'PrixUnit' => 0
]);

$db = new PDO('mysql:host=localhost;dbname=facture', 'root', '');
$manager = new ProdManager($db);

$manager->add($perso);
