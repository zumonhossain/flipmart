// JavaScript Document

//Single Image Upload Script
function mainThambUrl(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl2(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb2').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}
function mainThambUrl3(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){ 
			$('#mainThmb3').attr('src',e.target.result).width(80)
				.height(80);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

//Multi Image Upload Script
$(document).ready(function(){
	$('#multiImg').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
		{
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
					.height(80); //create image element 
						$('#preview_img').append(img); //append image to output element
					};
					})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});
			
		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});
});


// Sub SubCategory Form a Category Te Click SubCategory Show Kora






















//Success and Error Message Timeout Code Start
setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
 },5000);

setTimeout(function() {
    $('.alerterror').slideUp(1000);
 },10000);

//Datepicker setting code start
 $(function(){
	 $('#income_date').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('#datepickerForm').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('#datepickerTo').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('#datepicker_one').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('#datepicker_two').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('.datepicker_date').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});

	$('.datepicker_redate').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});
});

//Data Table code start
$(document).ready(function(){
	$('#inexsummary').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#seveendayreport').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#allloanerinfo').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$('#alltableinfo').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$('#loanerstatus').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"order": [[ 0, "desc" ]],
	});

	$('#allTableDesc').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"order": [[ 0, "desc" ]],
		"info": true,
		"autoWidth": false
	});
});

//Modal code start
$(document).ready(function(){
	$(document).on("click", "#softDelete", function () {
		var deleteID = $(this).data('id');
		$(".modal-body #modal_id").val( deleteID );
	});

	$(document).on("click", "#restore", function () {
		var restoreID = $(this).data('id');
		$(".modal-body #modal_id").val( restoreID );
    });

   $(document).on("click", "#delete", function () {
		var deleteID = $(this).data('id');
		$(".modal-body #modal_id").val( deleteID );
    });
});

