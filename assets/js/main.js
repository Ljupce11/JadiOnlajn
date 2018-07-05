function checkUsername (x){
	var input = _(x).value;
	if (input != ""){
		_('unamestatus').innerHTML = 'Checking...';
		var ajax = ajaxObj("POST", "php/usernamecheck.php");
    	ajax.onreadystatechange = function() {
        if(ajaxReturn(ajax) == true) {
            _("unamestatus").innerHTML = ajax.responseText;
        }
    }
    	ajax.send("usernamecheck=" + input);
	}
}

function signupStatus(){
	var username = _("username").value,
		fname = _("fname").value,
		lname = _("lname").value,
		address = _("adress").value,
		email = _("email").value,
		pw = _("password").value,
		status = _("status");

	if (username == "" || email == "" || pw == "" || fname == "" || lname == "" || address == ""){
		status.innerHTML = "Please fill out all the form data!";
	}
	else {
		status.innerHTML = 'Please Wait...';
		var ajax = ajaxObj("POST", "register.php");
    	ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if (ajax.responseText != "signup_success"){
	            	_("status").innerHTML = ajax.responseText;
	            }
	            else {
	            	$('#status').css('color', 'green');
	            	_("status").innerHTML = "Success! Check your email to verify your email adress!";
	            }
	        }
   	 	}	
    	ajax.send("u=" + username + "&e=" + email + "&p=" + pw + "&fn=" + fname + "&ln=" + lname + "&a=" + address);		
	}
}

function loginStatus(link){
	var username = _("username").value,
		pw = _("password").value,
		status = _("status");

	if (username == "" || pw == ""){
		status.innerHTML = "Please fill out all the form data!";
	}
	else {
		status.innerHTML = 'Please Wait...';
		var ajax = ajaxObj("POST", link);
    	ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if (ajax.responseText != "success"){
	            	_("status").innerHTML = ajax.responseText;
	            }
	            else {
	            	window.location.replace("http://localhost/Projects/JadiOnlajn");
	            }
	        }
   	 	}	
    	ajax.send("u=" + username + "&p=" + pw);		
	}
}

function addCart(){
	var restaurant = _("res_name").innerHTML,
		quantity = _("quantity").innerHTML,
		type = _("type").innerHTML,
		total_p = _("total_price").innerHTML;

	if (restaurant == "" || quantity == ""){
		alert("Please fill out all the form data!");
	}
	else {
		var ajax = ajaxObj("POST", "orders.php");
    	ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if (ajax.responseText == "success"){
	            	console.log(ajax.responseText);
	            }
	            else {
	            	console.log(ajax.responseText);
	            }
	        }
   	 	}	
    	ajax.send("r=" + restaurant + "&q=" + quantity + "&t=" + type + "&p=" + total_p);		
	}
}

function contact(){
	var name = _("contactName").value,
		mail = _("contactMail").value,
		msg = _("contactMsg").value;

	if (name == "" || mail == "" || msg == ""){
		alert("Please fill out all the form data!");
	}
	else {
		var ajax = ajaxObj("POST", "contact.php");
    	ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if (ajax.responseText != "success"){
	            	alert(ajax.responseText);
	            }
	            else {
	            	alert("Пораката е успешно пратена!");
	            }
	        }
   	 	}	
    	ajax.send("n=" + name + "&mail=" + mail + "&msg=" + msg);		
	}
}

function Search(){
	var input = _("search").value;

	if (input == ""){
		alert("Please fill out all the form data!");
	}
	else {
		var ajax = ajaxObj("POST", "index.php");
    	ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if (ajax.responseText == "fail"){
	            	alert(ajax.responseText);
	            }
	            else {
	            	document.write(ajax.responseText);
	            	$('.content').css('display', 'none');
	            }
	        }
   	 	}	
    	ajax.send("search=" + input);		
	}	
}


