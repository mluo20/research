<?php

function insertData($data) {

}

function insertOrganism($organismdata) {
	return insert("organisms", ORGANISMS, $organismdata);
}

function insertKinase($kinasedata) {
	return insert("kinases", KINASES, $kinasedata);;
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