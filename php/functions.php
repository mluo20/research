<?php

function insertData($data) {
	extract($data);
	if (isset($data['nomatch'])) {
		foreach ($data as $key => $value) {
			if ($key != "organism" || $key != "kinase" || $key != "nomatch") $data[$key] = NULL;
		}
		unset($data['nomatch']);
	}
	unset($data['aasequence']);
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
	return insert("blastn", DATA, $blastn) && insert("blastx", DATA, $blastx) && insert("amino_acids", AMINO_ACIDS, $aminoaciddata);
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

/*UTILITIES*/

function arraytoref(&$rawArray)
{ 
    $refArray = array(); 
    foreach($rawArray as $key => $value) 
    {
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