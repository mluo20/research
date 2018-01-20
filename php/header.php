<?php

session_start();

if (!isset($_SESSION['access']) || !$_SESSION['access']) {
	header("Location: validate.php");
}

?>

<!DOCTYPE html>
<html>
<head>

	<title><?php if (isset($pagetitle)) echo $pagetitle; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

	<div class="container">
		<header id="header">
			<h3>Research <small class="text-muted">Bioinformatic Analysis of Protein Kinases</small></h3>
		</header>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
		      <a class="nav-item nav-link" href="data.php">Data</a>
		      <a class="nav-item nav-link" href="input.php">Input Data</a>
		      <a class="nav-item nav-link" href="#">other</a>
		    </div>
		  </div>
		</nav>