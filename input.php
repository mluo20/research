<?php

$pagetitle = "Input data";

include 'php/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	extract($_POST);
	if (isset($inputdata)) {
		unset($_POST['inputdata']);
		if (insertData($_POST)) {
			header("Location: ?message=success");
		}
	}
	else if (isset($inputorganism)) {
		unset($_POST['inputorganism']);
		if (insertOrganism($_POST)) header("Location: ?message=success");
	}
	else if (isset($inputkinase)) {
		unset($_POST['inputkinase']);
		if (insertKinase($_POST)) header("Location: ?message=success");
	}
	else if (isset($inputdomain)) {
		unset($_POST['inputdomain']);
		if (insertDomain($_POST)) {header("Location: ?message=success");}
	}
}

if (isset($_GET['message'])) {
	echo "<div class=\"alert alert-success\" role=\"alert\">Successfully inserted data</div>";
}
?>
		
			<h1>Input Data</h1>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Query Result</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#domain" role="tab" aria-controls="domain" aria-selected="false">Domain</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Organism</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Kinase</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  	
			  	<!--BEGIN FORM HERE-->

			  	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="tabforms">
			  	<div class="row justify-content-md-center">
    			<div class="col-md-10">
    				<div class="row">
    					<div class="col">
    						<?php
					  			$kinases = Kinase::getList();
					  			$data = Data::getBlastX();
					  			if (count($data) > 0) $datakid = $data[count($data) - 1]->kid;
					  			else $datakid = -1;
					  		?>
							<div class="form-group">
						    <label for="kinase">Kinase</label>
						    <select class="form-control" name="kinase" id="kinase">
						      <?php
						      	for ($i = 0; $i < count($kinases); $i++) { 
						      		echo "<option value=\"". $kinases[$i]->id . "\""; 
						      		if ($datakid == $kinases[$i]->id) echo " selected";
						      		echo ">" . $kinases[$i]->name . "</option>";
						      	}
						      ?>
						    </select>
					  		</div>
						</div>
						<!-- <div class="col">
						  <div class="form-group">
						    <label for="kingdom">Kingdom</label>
						    <select class="form-control" name="kingdom" id="kingdom">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						  </div>
						</div> -->
    					<div class="col">
    						<?php
					  			$organisms = array(Organism::getList("WHERE kingdom = 'plants'"), Organism::getList("WHERE kingdom = 'fungi'"), Organism::getList("WHERE kingdom = 'protists'"), Organism::getList("WHERE kingdom = 'bacteria'"), Organism::getList("WHERE kingdom = 'animals'"));
					  			$data = Data::getBlastX();
					  			if (count($data) > 0) $dataoid = $data[count($data) - 1]->oid;
					  			else $dataoid = -1;
					  		?>
						  <div class="form-group">
						    <label for="organism">Organism</label>
						    <select class="form-control" name="organism" id="organism">
						      <?php
						      	for ($j = 0; $j < count($organisms); $j++) {
						      		if (!empty($organisms[$j])) {
							      		echo "<optgroup label=\"" . $organisms[$j][0]->kingdom . "\">";
								      	for ($i = 0; $i < count($organisms[$j]); $i++) { 
								      		echo "<option value=\"". $organisms[$j][$i]->id . "\""; 
								      		if ($dataoid == $organisms[$j][$i]->id) {echo " selected";}
								      		echo ">" . $organisms[$j][$i]->name . "</option>";
								      	}
								      	echo "</optgroup>";
								    }
							    }
						      ?>
						    </select>
						  </div>
						</div>
					</div>
					<hr>
			 		<div class="form-row">
			 		<div class="col-md">
			 			<fieldset>
			 			<legend>BLAST N</legend>
					 	<div class="row">
					 		<div class="col-md">
							  <div class="form-group">
								    <label for="evalue">E. value</label>
								    <input type="number" step="any" name="evalue" id="evalue" class="form-control" required>
							  </div>
							</div>
						  <div class="col-md">
						  	 <div class="form-group">

						  	<label for="pcoverage">Percent coverage</label>
							    <input type="number" name="pcoverage" id="pcoverage" class="form-control" required>
							</div>
						  </div>
						</div>	

						<div class="row">

							<div class="col-md">
								<div class="form-group">
									<label for="proteinname">Name of Protein</label>
									<input type="text" name="proteinname" id="proteinname" class="form-control" required>
								</div>
							</div>

							<div class="col-md">
								<div class="form-group">
									<label for="location">Location</label>
									<div class="row">
										<div class="col">
											<input type="number" name="location1" id="location" class="form-control" required>
										</div>
										-
										<div class="col">
											<input type="number" name="location2" class="form-control" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						</fieldset>


					</div>
					<div class="col-md">
						<fieldset>
							<legend>BLAST X</legend>
						<div class="row">
					 		<div class="col-md">
							  <div class="form-group">
								    <label for="evaluex">E. value</label>
								    <input type="number" step="any" name="evaluex" id="evaluex" class="form-control" required>
							  </div>
							</div>
						  <div class="col-md">
						  	 <div class="form-group">

						  	<label for="pcoveragex">Percent coverage</label>
							    <input type="number" name="pcoveragex" id="pcoveragex" class="form-control" required>
							</div>
						  </div>
						</div>	
						<div class="row">

							<div class="col-md">
								<div class="form-group">
									<label for="proteinnamex">Name of Protein</label>
									<input type="text" name="proteinnamex" id="proteinnamex" class="form-control" required>
								</div>
							</div>

							<div class="col-md">
								<div class="form-group">
									<label for="locationx">Location</label>
									<div class="row">
										<div class="col">
											<input type="number" name="location1x" id="locationx" class="form-control" required>
										</div>
										-
										<div class="col">
											<input type="number" name="location2x" class="form-control" required>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</fieldset>
					</div>
					</div>
					<hr>
					<!-- <div class="row"> -->
						
						<!-- <div class="col-md"> -->
						<div class="form-group">
							<label for="aasequence">Amino Acid Sequence</label>
							<textarea name="aasequence" id="aasequence" rows="6" class="form-control"></textarea>
						</div>
						<!-- </div> -->
					<!-- </div> -->
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="nomatch" value="1" id="nomatch">
						  <label class="form-check-label" for="nomatch">
						    NO MATCH
						  </label>
						</div>
					  <button type="submit" class="btn btn-primary" name="inputdata">Submit</button>

				</div>
				</div>
				</form>

			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="tabforms">
			  	<div class="row justify-content-md-center">
			  	<div class="col-md-6">
			  		<?php
			  			$organisms = Organism::getList();
			  			$okingdom = $organisms[count($organisms) - 1]->kingdom;
			  		?>
			  		<div class="form-group">
			  			<label for="kingdom2">Kingdom</label>
					    <select class="form-control" name="kingdom" id="kingdom2">
					      <option value="bacteria" <?php if($okingdom == "bacteria") echo "selected"; ?>>Bacteria</option>
					      <option value="protists" <?php if($okingdom == "protists") echo "selected"; ?>>Protists</option>
					      <option value="fungi" <?php if($okingdom == "fungi") echo "selected"; ?>>Fungi</option>
					      <option value="plants" <?php if($okingdom == "plants") echo "selected"; ?>>Plants</option>
					      <option value="animals" <?php if($okingdom == "animals") echo "selected"; ?>>Animals</option>
					    </select>
			  		</div>

			  		<div class="form-group">
			  			<label for="name">Name</label>
			  			<input type="text" name="name" id="name" class="form-control" required>
			  		</div>

			  		<div class="form-group">
			  			<label for="description">Description (optional)</label>
			  			<textarea name="description" id="description" rows="3" class="form-control"></textarea>
			  		</div>
			  		<button type="submit" class="btn btn-primary" name="inputorganism">Submit</button>


			  	</div>
			  	</div>

			  	</form>
			  </div>
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			  	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="tabforms">
			  	<div class="row justify-content-md-center">
			  	<div class="col-md-6">

			  		<div class="form-group">
			  			<label for="kname">Kinase name</label>
			  			<input type="text" name="kname" id="kname" class="form-control" required>
			  		</div>

			  		<div class="form-group">
			  			<label for="kdescription">Description (optional)</label>
			  			<input type="text" name="kdescription" id="kdescription" class="form-control">
			  		</div>

			  		<div class="form-group">
			  			<label for="sequence">Arabidopsis sequence</label>
			  			<textarea name="sequence" id="sequence" rows="6" class="form-control"></textarea>
			  		</div>
			  			<button type="submit" class="btn btn-primary" name="inputkinase">Submit</button>


			  	</div>
			  	</div>

			  	</form>
			  </div>
			   <div class="tab-pane fade" id="domain" role="tabpanel" aria-labelledby="domain-tab">
			  	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="tabforms">
			  	<div class="row justify-content-md-center">
			  	<div class="col-md-6">
			  			<div class="form-group">
						    <label for="kinase">Kinase</label>
						    <select class="form-control" name="kinase" id="kinase">
						      <?php
						      	for ($i = 0; $i < count($kinases); $i++) { 
						      		echo "<option value=\"". $kinases[$i]->id; 
						      		echo "\">" . $kinases[$i]->name . "</option>";
						      	}
						      ?>
						    </select>
					  		</div>

						<div class="row">
							<div class="col-md">
								<div class="form-group">
									<label for="dname">Domain Name</label>
									<input type="text" name="dname" id="dname" class="form-control" required>
								</div>
							</div>
							<div class="col-md">
								<div class="form-group">
									<label for="dlocation">Domain Location:</label>
									<div class="row">
										<div class="col">
											<input type="number" name="dlocation1" id="dlocation" class="form-control" required>
										</div>
										-
										<div class="col">
											<input type="number" name="dlocation2" class="form-control" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="ddescription">Domain Description</label>
							<textarea name="ddescription" id="ddescription" rows="6" class="form-control"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" name="inputdomain">Submit</button>

			  	</div>
			  	</div>

			  	</form>
			  </div>
			</div>
<?php
include 'php/footer.php';
?>