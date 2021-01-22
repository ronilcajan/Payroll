
$(document).ready(function(){
	// =============  Login code here ==================
	$(".login").click(function(e) {
		e.preventDefault();
		var user = $(".username").val();
		var pass = $(".password").val();
	
		if (!user.trim()) {
			alert("Please enter your username!");
			$(".username").focus();
	
		} else if (!pass.trim()) {
			alert("Please enter you password!");
			$(".password").focus();
	
		} else {
			$.ajax({
				type: "POST",
				url: "model/signin.php",
				data: {
					username: user,
					password: pass
				},
				dataType: "json",
				cache: false,
				beforeSend: function() {
						$("#loading-screen").show();
					},
				success: function(response) {
					if (response.success == true) {
						window.location = response.message;
					} else {
						$("#loading-screen").hide();
						alert(response.message);
					}
				}
			});
			return false;
		}
	});

	// ========== Save Salesrep Profile ==============
	$('.save-profile').on('click', function(){
		var formdata = new FormData(document.getElementById("profile-edit-form"));

		if( $('.name').val()  != '' && 
			$('.comission').val()  != '' && 
			$('.tax').val()  != '' && 
			$('.bonus').val()  != '' )
		{
			$.ajax({
				type: "POST",
				url: "model/save_salesrep_profile.php",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					if (response.success == true) {
						alert(response.message);
						setTimeout(function() {
							window.location.reload(0);
						}, 2000);
					} else {
						alert(response.message);
					}
				}
			});
		}else{
			if($('.name').val() == '' ){
				alert("Fullname is required!");
			}
			if($('.comission').val() == '' ){
				alert("Comission is required!");
			}
			if($('.tax').val() == '' ){
				alert("Tax is required!");
			}
			if($('.bonus').val() == '' ){
				alert("Bonus is required!");
			}
		}
		return false;
	});
	// ========== Add Salesrep ==============
	$('.add-salesrep').on('click', function(){
		var formdata = new FormData(document.getElementById("add-salesrep-form"));

		if( $('.name').val()  != '' && 
			$('.comission').val()  != '' && 
			$('.tax').val()  != '' && 
			$('.bonus').val()  != '' )
		{
			$.ajax({
				type: "POST",
				url: "model/save_salesrep.php",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					if (response.success == true) {
						alert(response.message);
						setTimeout(function() {
							window.location.reload(1);
						}, 2000);
					} else {
						alert(response.message);
					}
				}
			});
		}else{
			if($('.name').val() == '' ){
				alert("Fullname is required!");
			}
			if($('.comission').val() == '' ){
				alert("Comission is required!");
			}
			if($('.tax').val() == '' ){
				alert("Tax is required!");
			}
			if($('.bonus').val() == '' ){
				alert("Bonus is required!");
			}
		}
		return false;
	});

	// ========== get Salesrep Bonus ==============
	$('.salesrep').on('change', function(){

		var id = $('.salesrep').val();
		if(  id != '')
		{
			$.ajax({
				type: "POST",
				url: "model/check_salesrep.php",
				dataType: "json",
				data: {id:id},
				success: function(response) {
					if (response.success == true) {
						$('.bonus').val(response.message);
					} else {
						alert(response.message);
					}
				}
			});
		}
		return false;
	});

	
	
	$('#no_clients').on('blur', function(){
		var num = $('#no_clients').val();
		var html = '';
		if(num==0){
			$('#clients-container').empty();
			$('.create-pay').hide();
		}
		for(i = 0 ; i < num; i++){
			html += '<div class="row div'+i+'"><div class="col-sm-4"><div class="form-group"><label for="salesrep">Name of Clients</label><div class="input-group mb-3"><div class="input-group-prepend">';
			html += '<span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-user"></i></span></div><input type="text" name="clients_name[]" class="form-control clients_name" required/>';
			html += '</div></div></div><div class="col-sm-4"><div class="form-group"><label for="salesrep">Client Payments</label><div class="input-group mb-3"><div class="input-group-prepend">';
			html += '<span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-dollar-sign"></i></span></div><input type="number" id="'+i+'" min="1" name="clients_payment[]" class="form-control clients_payment" required/>';
			html += '</div></div></div><div class="col-sm-4"><div class="form-group"><label for="salesrep">Onlineinsure Comission</label><div class="input-group mb-3"><div class="input-group-prepend">';
			html += '<span class="input-group-text" id="basic-addon1"><i class="nav-icon fas fa-dollar-sign"></i></span>';
			html += '</div><input type="text" name="comission[]" class="form-control comission'+i+'" required/></div></div></div></div>';

			$('#clients-container').html(html);
			$('.create-pay').show();
		}

		//append js code to activate in appended div
		var js = calculateComission();
		var myscript = $('<script>').attr('type','text/javascript').html(js);
		$('head').append(myscript);

		
	});

	

	$('#month-dropdown').on('change', function(){
		let weekDropdown = document.getElementById('week-dropdown');
		var month = $('#month-dropdown').val();
		var year = ($('#year-dropdown').val() != '' ? new Date().getFullYear() : $('#year-dropdown').val());

		for(i = weekDropdown.length - 1; i >= 1; i--){
			weekDropdown.remove(i);
		}

		let weeks = getWeeksInMonth(month,year);
		for (let i = 0; i < weeks.length; i++) {
			let weekOption = document.createElement('option');
			weekOption.text = weeks[i].start + '-' + weeks[i].end;
			weekOption.value = weeks[i].start + '-' + weeks[i].end;
			weekDropdown.add(weekOption);
		}

	});
	$('#year-dropdown').on('change', function(){
		let weekDropdown = document.getElementById('week-dropdown');
		var year = $('#year-dropdown').val();
		var month =  ($('#month-dropdown').val() != '' ? new Date().getMonth() :  $('#month-dropdown').val());

		for(i = weekDropdown.length - 1; i >= 1; i--){
			weekDropdown.remove(i);
		}

		let weeks = getWeeksInMonth(month,year);

		for (let i = 0; i < weeks.length; i++) {
			let weekOption = document.createElement('option');
			weekOption.text = weeks[i].start + '-' + weeks[i].end;
			weekOption.value = weeks[i].start + '-' + weeks[i].end;
			weekDropdown.add(weekOption);
		}
	});

	dropdownYear(); // create year dropdown
	dropdownWeek(); //
});

function calculateComission(){
	$('.clients_payment').on('blur', function(){
		var id = $('.salesrep').val();
		var pay = $(this).val();
		var com = $(this).attr('id');
	
		if(id !== null){
			$.ajax({
				type: "POST",
				url: "model/get_com.php",
				dataType: "json",
				data: {id:id,pay:pay},
				success: function(response) {
					if (response.success == true) {
						$('.comission'+com).val(response.message);
					} else {
						alert(response.message);
					}
				}
			});
		}else{
			alert('Please select sales representative!');
		}
		return false;
	
	});
}


function dropdownYear(){
	let dateDropdown = document.getElementById('year-dropdown');

	let currentYear = new Date().getFullYear();
	let earliestYear = 2000;

	while (currentYear >= earliestYear) {
		let dateOption = document.createElement('option');
		dateOption.text = currentYear;
		dateOption.value = currentYear;
		dateDropdown.add(dateOption);
		currentYear -= 1;
	}
}

function dropdownWeek(){
	let dateDropdown = document.getElementById('week-dropdown');

	let year = new Date().getFullYear();
	let month = new Date().getMonth();
	
	let weeks = getWeeksInMonth(month,year);

	for (let i = 0; i < weeks.length; i++) {
		let dateOption = document.createElement('option');
		dateOption.text = weeks[i].start + '-' + weeks[i].end;
		dateOption.value = weeks[i].start + '-' + weeks[i].end;
		dateDropdown.add(dateOption);
	}
}

function getWeeksInMonth(month,year) {
  
	const weeks = [];
	const firstDay = new Date(year, month, 1);
	const lastDay = new Date(year, month + 1, 0);
	const daysInMonth = lastDay.getDate();
	let dayOfWeek = firstDay.getDay();
	let start;
	let oldstart;
	let end;
  
	for (let i = 1; i < daysInMonth + 1; i++) {
  
		if (dayOfWeek === 1 || i === 1) {
			start = i;
		}
	
		if (dayOfWeek === 0 || i === daysInMonth) {
	
			end = i;
	
			if(start){
			weeks.push({
				'start': start,
				'end': end
			});
			start = null;
			}
		}
	  	dayOfWeek = new Date(year, month, i + 1).getDay();
	}
  
	return weeks;
  }
  
