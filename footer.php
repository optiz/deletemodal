		<div class="footer">
			<center>
				<span>Copyright © 2018</span>
			</center>
		</div>
		<script>
	   			$(document).ready(function () {
		        $('modal-login-x').on('show.bs.modal', function (event) {
		            var button = $(event.relatedTarget);//Button which is clicked
		            var clickedButtonId= button.data('Id');//Get id of the button
		          // set id to the hidden input field in the form.         
		           $("input #id").val(clickedButtonId);
		    }); 
	   	</script>
  	  <!-- javascripts -->
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.min.js"></script>
	  <!-- nice scroll -->
	  <script src="js/jquery.scrollTo.min.js"></script>
	  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
	  <!-- jquery knob -->
	  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
	  <!--custome script for all page-->
	  <script src="js/scripts.js"></script>

	  <script>
	    //knob
	    $(".knob").knob();
	  </script>
	  <script src="asset/bootstrap/js/bootstrap.min.js"></script>
      <script src="asset/js/jquery.backstretch.min.js"></script>
      <script src="asset/js/scripts.js"></script>
      <script>  
         $(document).ready(function(){  
              $('#employee_data').DataTable();  
         });  
      </script>
      <script>
		function myFunction() {
		    var x = document.getElementById("myInputs");
		    if (x.type === "password") {
		        x.type = "text";
		    } else {
		        x.type = "password";
		    }
		}
	   </script>
    <script type="text/javascript" src="mdb/js/addons/datatables.min.js"></script>
    <script>
      $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
    </script>

    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
	<!-- Include jQuery -->

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<script>
		$(document).ready(function(){
			var date_input=$('input[name="date"]'); //our date input has the name "date"
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			date_input.datepicker({
				format: 'yyyy-mm-dd',
				container: container,
				todayHighlight: true,
				autoclose: true,
			})
		})
	</script>