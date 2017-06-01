<?php
class ProdManager
{
	private $_db;


	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Produit $prod)
	{
		$q = $this->_db->prepare('INSERT INTO produit (NumProduit, Designation, PrixUnit) VALUES (:NumProduit, :Designation, :PrixUnit)');

		$q->bindValue(':NumProduit', $prod->getNumProduit(), PDO::PARAM_INT);
		$q->bindValue(':Designation', $prod->getDes());
		$q->bindValue(':PrixUnit', $prod->getPrixHt(), PDO::PARAM_INT);

		$q->execute();
	}

	public function delete(Produit $prod)
	{
		$this->_db->exec('DELETE FROM produit WHERE id = '.$prod->id());
	}

	public function get($id)
	{
		$id = (int) $id;

		$q = $this->_db->query('SELECT id, NumProduit, Designation, PrixUnit FROM produit WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Produit($donnees);
	}

	public function getList()
	{
		$prod = [];

		$q = $this->_db->query('SELECT id, NumProduit, Designation, PrixUnit FROM produit ORDER BY NumProduit');

		while ($donnees = $q->fecth(PDO::FETCH_ASSOC))
		{
			$prod[] = new produit($donnees);
		}

		return $prod;
	}

	public function update(Produit $prod)
	{
		$q = $this->_db->prepare('UPDATE produit SET Designation = :Designation, PrixUnit = :PrixUnit WHERE id = :id');

		$q->bindValue(':Designation', $prod->Designation());
		$q->bindValue(':PrixUnit', $prod->PrixUnit(), PDO::PARAM_INT);

		$q->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}



?>
