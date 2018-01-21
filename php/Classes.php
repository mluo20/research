<?php

class Kinase {

	public $id;
	public $name;
	public $description;
	public $sequence;
	
	function __construct($vals = array()) {
		$this->id = $vals['id'];
		$this->name = $vals['name'];
		$this->description = $vals['description'];
		$this->sequence = $vals['sequence'];
	}

	public static function getList($options = "") {
		$array = select("kinases", KINASES, $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Kinase($array[$i]);
		}
		return $array;
	}

	public static function getKinase($id) {
		$vals = select("kinases", KINASES, "WHERE id = $id");
		if (isset($vals[0])) {
			$user = new Kinase($vals[0]);
			return $vals;
		}
		else return false;
	}

}

class Organism {

	public $id;
	public $kingdom;
	public $name;
	public $description;
	
	function __construct($vals = array()) {
		$this->id = $vals['id'];
		$this->kingdom = $vals['kingdom'];
		$this->name = $vals['name'];
		$this->description = $vals['description'];
	}

	public static function getList($options = "") {
		$array = select("organisms", ORGANISMS, $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Organism($array[$i]);
		}
		return $array;
	}

	public static function getOrganism($id) {
		$vals = select("organisms", ORGANISMS, "WHERE id = $id");
		if (isset($vals[0])) {
			$user = new Organism($vals[0]);
			return $vals;
		}
		else return false;
	}

}

class Data {

	public $id;
	public $datatype;
	public $kid;
	public $oid;
	public $evalue;
	public $percentcoverage;
	public $proteinname;
	public $location1;
	public $location2;
	
	function __construct($vals = array()) {
		$this->id = $vals['id'];
		$this->kid = $vals['kid'];
		$this->oid = $vals['oid'];
		$this->evalue = $vals['evalue'];
		$this->percentcoverage = $vals['percentcoverage'];
		$this->proteinname = $vals['proteinname'];
		$this->location1 = $vals['location1'];
		$this->location2 = $vals['location2'];
	}

	public static function getList($options = "") {
		$array = select("blastn", DATA, " UNION ALL SELECT * FROM blastx ORDER BY oid" . $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Data($array[$i]);
		}
		return $array;
	}

	public static function getBlastN($options = "") {
		$array = select("blastn", DATA, $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Data($array[$i]);
		}
		return $array;
	}

	public static function getBlastX($options = "") {
		$array = select("blastx", DATA, $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Data($array[$i]);
		}
		return $array;
	}

	public static function getRowData($id, $table) {
		$vals = select($table, DATA, "WHERE id = $id");
		if (isset($vals[0])) {
			$user = new Data($vals[0]);
			return $vals;
		}
		else return false;
	}

}

class Domain {

	public $id;
	public $kid;
	public $name;
	public $location1;
	public $location2;
	public $description;
	
	function __construct($vals = array()) {
		$this->id = $vals['id'];
		$this->kid = $vals['kid'];
		$this->name = $vals['name'];
		$this->location1 = $vals['dlocation1'];
		$this->location2 = $vals['dlocation2'];
		$this->description = $vals['description'];
	}

	public static function getList($options = "") {
		$array = select("domains", DOMAINS, $options);
		for ($i = 0; $i < count($array); $i++) {
			$array[$i] = new Domain($array[$i]);
		}
		return $array;
	}

	public static function getDomain($id) {
		$vals = select("domains", DOMAINS, "WHERE id = $id");
		if (isset($vals[0])) {
			$user = new Domain($vals[0]);
			return $vals;
		}
		else return false;
	}

}