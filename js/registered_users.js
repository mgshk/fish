var users = {

	getUsers : function() {

		$.ajax({
			cache: false,
			url: '../ajax/user.php?action=getUsers',
			type: 'GET',
			data: {},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					var arrayItems = [];
					var theTemplateScript = $("#userList").html();
					var users = JSON.parse(resp.users);

					users.forEach(function (user) {
						arrayItems.push(user);
					});

					var context = {
				    	"users": arrayItems
					};
				} else {
					var theTemplateScript = $("#noRecords").html();
					var context = {
				    	"msg": resp.msg
					};
				}
				
				var theTemplate = Handlebars.compile(theTemplateScript);
				var theCompiledHtml = theTemplate(context);

				$('#tabUsers').html(theCompiledHtml);
			}
		});

		return false;
	}
};

users.getUsers();