var index = {

	login : function(type) {
		
		$.ajax({
			cache: false,
			url: '../ajax/admin.php?action=userLogin',
			type: 'POST',
			data: {
				username : document.getElementById('username').value,
				password : document.getElementById('password').value
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					window.location.href = "list.html";
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
	}
};
