	</div>

	<footer id="footer">
		&copy;
	</footer>
	
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/jquery.are-you-sure.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>

	<script type="text/javascript">
		$('form').areYouSure();
		$(document).ready(function(){
		    $('#example').DataTable();
		    $('#nomatch').change(function(){
		    	if ($(this).is(":checked")) {
		    		$(":input").removeAttr("required");
		    	}
		    	else if (!$(this).is(":checked")) {
		    		$(":input").attr("required", "true");
		    		$(this).removeAttr("required");
		    	}
		    });
		});
	</script>


</body>

</html>