var contact = {

	reg_email: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,

	sendFeedback : function() {

		if( ! contact.__validate())
			return;
		
		$.ajax({
			cache: false,
			url: './ajax/user.php?action=sendFeedback',
			type: 'POST',
			data: {
				name : document.getElementById('name').value,
				email : document.getElementById('email').value,
				phone : document.getElementById('phone').value,
				comment : document.getElementById('comment').value
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					document.getElementById('successMsg').innerHTML = resp.msg;
					document.getElementById('successMsg').className = "show";

					setTimeout(function(){
						document.getElementById('successMsg').className = 'hide';
					}, 3000);
				} else {
					document.getElementById('errorMsg').innerHTML = resp.msg;
					document.getElementById('errorMsg').className = "show";

					setTimeout(function(){
						document.getElementById('errorMsg').className = 'hide';
					}, 3000);
				}
			}
		});

		return false;
	},

	__validate: function() {
		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var phone = document.getElementById('phone').value;
		var comment = document.getElementById('comment').value;

		try {
			if (name === null || name === '')
				throw "Enter name";

			if (email === null || email === '')
				throw "Enter email";

			if (contact.reg_email.test(email) === false)
				throw "Enter valid email";
	
			if (phone === null || phone === '')
				throw "Enter phone";

			if (comment === null || comment === '')
				throw "Enter comment";
		} catch (errMsg) {
			document.getElementById('errorMsg').innerHTML = errMsg;
			document.getElementById('errorMsg').className = "show";

			setTimeout(function(){
				document.getElementById('errorMsg').className = 'hide';
			}, 3000);

			return false;
		}

		return true;
	}
};