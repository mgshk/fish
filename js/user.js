var user = {

	getItems : function() {

		$.ajax({
			cache: false,
			url: './ajax/user.php?action=getItems',
			type: 'POST',
			data: {},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					var arrayItems = [];
					var theTemplateScript = $("#items").html();
					var items = JSON.parse(resp.items);

					items.forEach(function (item) {
						arrayItems.push(item);
					});

					var context = {
				    	"items": arrayItems
					};
				} else {
					var theTemplateScript = $("#noRecords").html();
					var context = {
				    	"msg": resp.msg
					};
				}
				
				var theTemplate = Handlebars.compile(theTemplateScript);
				var theCompiledHtml = theTemplate(context);

				$('#tabItems').html(theCompiledHtml);
			}
		});

		return false;
	}
};

user.getItems();

