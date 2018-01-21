<?php

function insertData($data) {
	extract($data);
	if (isset($data['nomatch'])) {
		// foreach ($data as $key => $value) {
		// 	if ($key != "organism" || $key != "kinase" || $key != "nomatch") unset($data[$key]);
		// }
		// unset($data['nomatch']);

		$blast = array("k" => $data["kinase"], "o" => $data['organism']);
		$success = insert("blastn", array(DATA[0], DATA[1], DATA[2]), $blast) && insert("blastx", array(DATA[0], DATA[1], DATA[2]), $blast);
		$getdata = Data::getBlastX();
		$did = $getdata[count($getdata) - 1]->id;
		return $success && insert("amino_acids", array(AMINO_ACIDS[0], AMINO_ACIDS[1]), array("k" => $did));
	}
	else {
		$data['kinase'] = (int) $kinase;
		$data['organism'] = (int) $organism;
		$data['evalue'] = (double) $evalue;
		$data['pcoverage'] = (double) $pcoverage;
		$data['location1'] = (int) $location1;
		$data['location2'] = (int) $location2;
		$data['evaluex'] = (double) $evaluex;
		$data['pcoveragex'] = (double) $pcoveragex;
		$data['location1x'] = (int) $location1x;
		$data['location2x'] = (int) $location2x;
		unset($data['aasequence']);
		$blastn = $data;
		unset($blastn['evaluex']);
		unset($blastn['pcoveragex']);
		unset($blastn['location1x']);
		unset($blastn['location2x']);
		unset($blastn['proteinnamex']);
		$blastx = $data;
		unset($blastx['evalue']);
		unset($blastx['pcoverage']);
		unset($blastx['location1']);
		unset($blastx['location2']);
		unset($blastx['proteinname']);
		$getdata = Data::getBlastX();
		$did = $getdata[count($getdata) - 1]->id;
		$aminoaciddata = array($did, $aasequence);
		if (insert("blastn", DATA, $blastn) && insert("blastx", DATA, $blastx)) return insert("amino_acids", AMINO_ACIDS, $aminoaciddata);
		else return false;
	}
	// foreach ($data as $key => $value) {
	// 	if ($value == NULL)	echo "$key: $value<br>";
	// }
	
}

function insertOrganism($organismdata) {
	return insert("organisms", ORGANISMS, $organismdata);
}

function insertKinase($kinasedata) {
	return insert("kinases", KINASES, $kinasedata);;
}

function insertDomain($domaindata) {
	extract($domaindata);
	$dlocation1 = (int) $dlocation1;
	$dlocation2 = (int) $dlocation2;
	return insert("domains", DOMAINS, $domaindata);
}

function returnAminoAcids() {
	$aminoacidtable = "";
	$aminoacids = AminoAcid::getList();
	$aminoacidtable .= "<table class=\"table\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Organism</th><th>Kinase</th><th>Sequence</th></thead><tbody>";
	for ($i=0; $i < count($aminoacids); $i++) { 
		$aminoacidtable .= "<tr>";
		$datarow = Data::getRowData($aminoacids[$i]->did, "blastx");
		$organism = Organism::getOrganism($datarow->oid);
		$kinase = Kinase::getKinase($datarow->kid);
		$aminoacidtable .= "<td><i>" . $organism->name . "</i></td>";
		$aminoacidtable .= "<td>" . $kinase->name . "</td>";
		if ($aminoacids[$i]->sequence != NULL)
			$aminoacidtable .= "<td class=\"shorten\">" . nl2br($aminoacids[$i]->sequence) . "</td>";
		else $aminoacidtable .= "<td>N/A</td>";
		$aminoacidtable .= "</tr>";
	}
	$aminoacidtable .= "</tbody></table>";
	return $aminoacidtable;
}

function returnDomains() {
	$domaintable = "";
	$domains = Domain::getList();
	$domaintable .= "<table class=\"table\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Kinase</th><th>Name</th><th>Location</th><th>Description</th></thead><tbody>";
	for ($i=0; $i < count($domains); $i++) { 
		$domaintable .= "<tr>";
		$kinase = Kinase::getKinase($domains[$i]->kid);
		$domaintable .= "<td>" . $kinase->name . "</td>";
		$domaintable .= "<td>" . $domains[$i]->name . "</td>";
		$domaintable .= "<td>" . $domains[$i]->location1 . " - " . $domains[$i]->location2 . "</td>";
		$domaintable .= "<td class=\"shorten\">" . nl2br($domains[$i]->description) . "</td>";
		$domaintable .= "</tr>";
	}
	$domaintable .= "</tbody></table>";
	return $domaintable;
}

function returnOrganisms() {
	$organismtable = "";
	$organisms = Organism::getList();
	$organismtable .= "<table class=\"table\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Kingdom</th><th>Name</th><th>Description</th></thead><tbody>";
	for ($i=0; $i < count($organisms); $i++) { 
		$organismtable .= "<tr>";
		$organismtable .= "<td>" . $organisms[$i]->kingdom . "</td>";
		$organismtable .= "<td><i>" . $organisms[$i]->name . "</i></td>";
		$organismtable .= "<td>" . nl2br($organisms[$i]->description) . "</td>";
		$organismtable .= "</tr>";
	}
	$organismtable .= "</tbody></table>";
	return $organismtable;
}

function returnKinases() {
	$kinasetable = "";
	$kinases = Kinase::getList();
	$kinasetable .= "<table class=\"table\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Kingdom</th><th>Name</th><th>Description</th></thead><tbody>";
	for ($i=0; $i < count($kinases); $i++) { 
		$kinasetable .= "<tr>";
		$kinasetable .= "<td>" . $kinases[$i]->name . "</td>";
		if ($kinases[$i]->description == NULL) $kinasetable .= "<td>N/A</td>";
		else $kinasetable .= "<td>" . $kinases[$i]->description . "</td>";
		$kinasetable .= "<td class=\"shorten\">" . nl2br($kinases[$i]->sequence) . "</td>";
		$kinasetable .= "</tr>";
	}
	$kinasetable .= "</tbody></table>";
	return $kinasetable;
}

function returnData($options = "") {
	
}

/*UTILITIES*/

function arraytoref(&$rawArray) { 
    $refArray = array(); 
    foreach($rawArray as $key => $value) {
        $refArray[$key] = &$rawArray[$key];
    }
    return $refArray; 
}

function assoctonum($array) {
	$newarray = array();
	foreach ($array as $key => $value) {
		$newarray[] = $value;
	}
	return $newarray;
}