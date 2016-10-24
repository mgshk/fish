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
	},

	getSearchItems : function() {

		try {

			var search_txt = document.getElementById('search_txt').value;

			if (search_txt === null || search_txt === '')
				throw "Enter the items to search";

			$.ajax({
				cache: false,
				url: './ajax/user.php?action=getSearchItems',
				type: 'POST',
				data: {
					searchtxt: search_txt
				},
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

		} catch (errMsg) {
			document.getElementById('srch_vaidate').innerHTML = errMsg;
			document.getElementById('srch_vaidate').className = "show";

			setTimeout(function(){
				document.getElementById('srch_vaidate').className = 'hide';
			}, 3000);
		}

		return false;
	}
};

$(document).ready(function() {

	user.getItems();

	$('#search_btn').on('click', function() {

		user.getSearchItems();
		return false;
	});

});



