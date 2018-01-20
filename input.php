<?php

$pagetitle = "Input data";

include 'php/header.php';
?>
		
		<div id="main" >
			<h1>Input Data</h1>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Query Result</a>
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

			  	<form method="POST" action="" class="tabforms">
			  	<div class="row justify-content-md-center">
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col">
					  <div class="form-group">
					    <label for="organism">Organism</label>
					    <select class="form-control" name="organism" id="organism">
					      <option>1</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
					  </div>
						</div>
						<div class="col">
							<div class="form-group">
						    <label for="kinase">Kinase</label>
						    <select class="form-control" name="kinase" id="kinase">
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
					  </div>
						</div>
					</div>
				 	<div class="row">
				 		<div class="col">
						  <div class="form-group">
							    <label for="evalue">E. value</label>
							    <input type="number" name="evalue" id="evalue" class="form-control" required>
						  </div>
						</div>
					  <div class="col">
					  	 <div class="form-group">

					  	<label for="pcoverage">Percent coverage</label>
						    <input type="number" name="pcoverage" id="pcoverage" class="form-control" required>
						</div>
					  </div>
					</div>	
					<div class="row">

						<div class="col-md-7">
							<div class="form-group">
								<label for="proteinname">Name of Protein</label>
								<input type="text" name="proteinname" id="proteinname" class="form-control" required>
							</div>
						</div>

						<div class="col-md-5">
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
					  <button type="submit" class="btn btn-primary">Submit</button>

				</div>
				</div>
				</form>

			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	<form method="POST" action="" class="tabforms">
			  	<div class="row justify-content-md-center">
			  	<div class="col-md-6">

			  		<div class="form-group">
			  			<label for="kingdom">Kingdom</label>
					    <select class="form-control" name="kingdom" id="kingdom">
					      <option value="bacteria">Bacteria</option>
					      <option value="protists">Protists</option>
					      <option value="fungi">Fungi</option>
					      <option value="plants">Plants</option>
					      <option value="animals">Animals</option>
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
			  							  <button type="submit" class="btn btn-primary">Submit</button>


			  	</div>
			  	</div>

			  	</form>
			  </div>
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			  	<form method="POST" action="" class="tabforms">
			  	<div class="row justify-content-md-center">
			  	<div class="col-md-6">

			  		<div class="form-group">
			  			<label for="kname">Kinase name</label>
			  			<input type="text" name="kname" id="kname" class="form-control" required>
			  		</div>

			  		<div class="form-group">
			  			<label for="description">Sequence</label>
			  			<textarea name="description" id="description" rows="6" class="form-control"></textarea>
			  		</div>
			  			<button type="submit" class="btn btn-primary">Submit</button>


			  	</div>
			  	</div>

			  	</form>
			  </div>
			</div>


		</div>

<?php
include 'php/footer.php';
?>