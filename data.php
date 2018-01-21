<?php

$pagetitle = "Data";

include 'php/header.php';
?>
		
			<h1>Display Data</h1>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Data</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#domains" role="tab" aria-controls="domains" aria-selected="false">Domain</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#aminoacids" role="tab" aria-controls="aminoacids" aria-selected="false">Amino Acids</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#organisms" role="tab" aria-controls="organisms" aria-selected="false">Organisms</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kinases" role="tab" aria-controls="kinases" aria-selected="false">Kinases</a>
			  </li>
			</ul>
			<div class="tab-content tabforms" id="myTabContent">
			  <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">

			  </div>
			  <div class="tab-pane fade show active" id="domains" role="tabpanel" aria-labelledby="domains-tab">
			  </div>
			  <div class="tab-pane fade show active" id="aminoacids" role="tabpanel" aria-labelledby="aminoacids-tab">
			  </div>
			  <div class="tab-pane fade" id="organisms" role="tabpanel" aria-labelledby="organisms-tab">...</div>
			  <div class="tab-pane fade" id="kinases" role="tabpanel" aria-labelledby="kinases-tab">...</div>
			</div>

<?php
include 'php/footer.php';
?>