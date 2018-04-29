<?php
require 'header.php';
?>


	<div class="main">
		<div class="first">
			<h2>form submit</h2>
			<form id="foo">
	
				<label>Name :</label>
				<input id="name" name="name" placeholder='Your Name' type='text'>
				<label>Email :</label>
				<input id="email" name="email" placeholder='Valid Email Address' type='text'>
				<label>Contact :</label>
				<input id="contact" name="contact" placeholder='Contact' type='text'>
				<label>Address:</label>
				<input id="address" name="address" placeholder='Address' type='text' value="">
				<input id='btn' type="submit" value="Send" />
				<!-- Including PHP File Here -->
			</form>
		</div>

		<div class="first">
			<h2>jQuery function</h2>
				<form action="redirect_form.php" id="#form" method="post" name="#form">
				<label>Name :</label>
				<input id="name2" name="name" placeholder='Your Name' type='text'>
				<label>Email :</label>
				<input id="email2" name="email" placeholder='Valid Email Address' type='text'>
				<label>Contact :</label>
				<input id="contact2" name="contact" placeholder='Contact' type='text'>
				<label>Address:</label>
				<input id="address2" name="address" placeholder='Address' type='text' value="">
				<input id='btn' name="submit" value='Submit' onclick="submitform()">
				<!-- Including PHP File Here -->
<?php
				include_once 'include/redirect.php';
		
?>
			</form>
		</div>
	</div>

<script type="text/javascript">

	// Variable to hold request
	var request;

	// Bind to the submit event of our form
	$("#foo").submit(function(event){

	    // Prevent default posting of form - put here to work in case of errors
	    event.preventDefault();

	    // Abort any pending request
	    if (request) {
	        request.abort();
	    }
	    // setup some local variables
	    var $form = $(this);

	    // Let's select and cache all the fields
	    var $inputs = $form.find("input, select, button, textarea");

	    // Serialize the data in the form
	    var serializedData = $form.serialize();

	    // Let's disable the inputs for the duration of the Ajax request.
	    // Note: we disable elements AFTER the form data has been serialized.
	    // Disabled form elements will not be serialized.
	    $inputs.prop("disabled", true);

	    // Fire off the request to /form.php
	    request = $.ajax({
	        url: "/include/jqueryform.php",
	        type: "post",
	        data: serializedData
	    });

	    // Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	    	console.log(response);
	    	console.log(textStatus);
	    	var obj = JSON.parse(response);
	    	console.log(obj);
	        // Log a message to the console
	        console.log("Hooray, it worked!");
	    });

	    // Callback handler that will be called on failure
	    request.fail(function (jqXHR, textStatus, errorThrown){
	    	console.log(response);
	        // Log the error to the console
	        console.error(
	            "The following error occurred: "+
	            textStatus, errorThrown
	        );
	    });

	    // Callback handler that will be called regardless
	    // if the request failed or succeeded
	    request.always(function () {
	        // Reenable the inputs
	        $inputs.prop("disabled", false);
	    });

	});


	function submitform(){
		/* Get from elements values */

		var info = {name: $('#name2').val(), email:$('#email2').val() };
		//var values = info.serialize();

		$.ajax({
		        url: "/include/jqueryform.php",
		        type: "post",
		        data: info ,
		        success: function (response) {
		        	console.log(response);
		           // you will get response from your php page (what you echo or print)                 

		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }


	    });
	}



</script>

<?php
require 'footer.php';
?>