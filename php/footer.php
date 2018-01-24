	</div>

	<footer id="footer">
		&copy;
	</footer>
	
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/jquery.are-you-sure.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>

	<script type="text/javascript">
		$('.tabforms').areYouSure();
		$(document).ready(function(){

			// $("#data-tab").click(function() {
		 //    	$.ajax({url: "datapage.php", success: function(result){
		 //            $("#data").html(result);
		 //        }});
		 //    });

		    var tables = $('table').DataTable({
		    	dom: 'Blfrtip',
			    buttons: [
			        'csv', 'pdf', 'print'
			    ],
			    "order": []
			});

			// tables.buttons().container()
   //  .appendTo( $('.col-sm-6:eq(0)', tables.table().container() ) );

   			$(".shorten").each(function() {
			    var s = $(this).text();
			    if (s.length > 80) s = s.substr(0, 80) + "...";
			    $(this).text(s);
			});

			$(window).click(function() {
				$(".shorten").each(function() {
				    var s = $(this).text();
				    if (s.length > 80) s = s.substr(0, 80) + "...";
				    $(this).text(s);
				});
			});

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