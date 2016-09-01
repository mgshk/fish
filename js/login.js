var login = {

	reg_email: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,

	navProductPage: false,

	item_id: null,

	register : function() {

		if( ! login.__validate())
			return;
		
		$.ajax({
			cache: false,
			url: './ajax/user.php?action=register',
			type: 'POST',
			data: {
				name : document.getElementById('reg_name').value,
				email : document.getElementById('reg_email').value,
				password : document.getElementById('reg_password').value,
				confirm_password : document.getElementById('reg_confirm_password').value,
				mobile : document.getElementById('reg_mobile').value,
				address : document.getElementById('reg_address').value
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					document.getElementById('lgn_module').className = 'hide';
					document.getElementById('reg_successMsg').innerHTML = resp.msg;
					$('#register').modal('hide');

					setTimeout(function(){
						document.getElementById('reg_successMsg').className = 'hide';
					}, 3000);
				} else {
					document.getElementById('reg_errorMsg').innerHTML = resp.msg;
					document.getElementById('reg_errorMsg').className = "show";

					setTimeout(function(){
						document.getElementById('reg_errorMsg').className = 'hide';
					}, 3000);
				}
			}
		});

		return false;
	},

	__validate: function() {
		var name = document.getElementById('reg_name').value;
		var email = document.getElementById('reg_email').value;
		var password = document.getElementById('reg_password').value;
		var confirm_password = document.getElementById('reg_confirm_password').value;
		var mobile = document.getElementById('reg_mobile').value;
		var address = document.getElementById('reg_address').value;

		try {

			if (name === null || name === '')
				throw "Enter name";

			if (email === null || email === '')
				throw "Enter email";

			if (login.reg_email.test(email) === false)
				throw "Enter valid email";

			if (password !== confirm_password)
				throw "Confirm password does not match";

			if (mobile === null || mobile === '')
				throw "Enter mobile number";

			if (address === null || address === '')
				throw "Enter address";
		} catch (errMsg) {
			document.getElementById('reg_errorMsg').innerHTML = errMsg;
			document.getElementById('reg_errorMsg').className = "show";

			setTimeout(function(){
				document.getElementById('reg_errorMsg').className = 'hide';
			}, 3000);

			return false;
		}

		return true;
	},

	login: function() {
		try {

			var email = document.getElementById('login_email').value;
			var password = document.getElementById('login_password').value;

			if (email === null || email === '')
				throw "Enter email";

			if (login.reg_email.test(email) === false)
				throw "Enter valid email";

			if (password === null || password === '')
				throw "Enter password";

			$.ajax({
				cache: false,
				url: './ajax/user.php?action=userLogin',
				type: 'POST',
				data: {
					email : document.getElementById('login_email').value,
					password : document.getElementById('login_password').value
				},
				dataType: 'json',
				success: function(resp) {
					if(resp.error === 0) {
						if (login.navProductPage === true) {
							window.location.href = './product.php?item_id='+login.item_id;
						} else {
							document.getElementById('lgn_module').className = 'hide';
							$('#login').modal('hide');
						}				
					} else {
						document.getElementById('ln_errorMsg').innerHTML = resp.msg;
						document.getElementById('ln_errorMsg').className = "show";

						setTimeout(function(){
							document.getElementById('ln_errorMsg').className = 'hide';
						}, 3000);
					}
				}
			});

		} catch (errMsg) {
			document.getElementById('ln_errorMsg').innerHTML = errMsg;
			document.getElementById('ln_errorMsg').className = "show";

			setTimeout(function(){
				document.getElementById('ln_errorMsg').className = 'hide';
			}, 3000);
		}

		return false;
	},

	goProduct : function(item_id) {
		$.ajax({
			cache: false,
			url: './ajax/user.php?action=checkUser',
			type: 'POST',
			data: {},
			dataType: 'json',
			success: function(resp) {
				login.item_id = item_id;

				if(resp.error === 0) {
					window.location.href = './product.php?item_id='+item_id;
				} else {
					login.navProductPage = true;
					$('#login').modal('show');
				}
			}
		});

		return false;
	}
};

$(document).ready(function() {

	$('#btn_login').on('click', function() {
		$('#login').modal('show');
	});

	$('#btn_register').on('click', function() {
		$('#register').modal('show');
	});
});
