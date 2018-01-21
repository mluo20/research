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