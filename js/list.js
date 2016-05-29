var list = {

	type: 1,

	getList : function(type) {
		
		if(type)
			list.type = type;

		$.ajax({
			cache: false,
			url: '../ajax/admin.php?action=getList',
			type: 'POST',
			data: {
				type: list.type
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					var arrayItems = [];
					var theTemplateScript = $("#itemList").html();
					var items = JSON.parse(resp.items);

					items.forEach(function (item) {
						arrayItems.push(item);
					});

					var context = {
				    	"items": arrayItems
					};
				} else {
					var theTemplateScript = $("#errorResult").html();
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
	},

	deleteItem : function(item_id) {

		$.ajax({
			cache: false,
			url: '../ajax/admin.php?action=deleteItem',
			method: 'POST',
			data: {
				item_id: item_id
			},
			dataType: 'json',
			success: function(resp) {

				document.getElementById('resultMsg').innerHTML = resp.msg;
				document.getElementById('resultMsg').className = "show";

				setTimeout(function(){
					document.getElementById('resultMsg').className = 'hide';
				}, 3000);
			}
		});
		
		return false;
	}
};

list.getList();
