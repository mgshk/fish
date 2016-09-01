var product = {

	total_quantity: null,

	total_price: null,

	getItem : function() {
		
		$.ajax({
			cache: false,
			url: './ajax/product.php?action=getItem',
			type: 'POST',
			data: {
				item: document.getElementById('item_id').value
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					var item_quantity = [];
					var theTemplateScript = $("#item").html();
					var item = JSON.parse(resp.item);

					for (var i=1; i < item.item_quantity; i++) {
						item_quantity.push(i);
						item_quantity.push(i + 0.5);
					}

					item_quantity.push(parseInt(item.item_quantity));

					var context = {
				    	"item": item,
				    	"item_quantity": item_quantity
					};
				} else {
					var theTemplateScript = $("#errorResult").html();
					var context = {
				    	"msg": resp.msg
					};
				}
				
				var theTemplate = Handlebars.compile(theTemplateScript);
				var theCompiledHtml = theTemplate(context);

				$('#tabItem').html(theCompiledHtml);
			}
		});

		return false;
	},

	updatePrice : function(quantity, price) {
		var total =  quantity * price;
		product.total_quantity = quantity;

		$('#price').text(total);
	},

	orderNow: function(item_id) {
		$.ajax({
			cache: false,
			url: './ajax/product.php?action=orderNow',
			type: 'POST',
			data: {
				item_id: item_id,
				item_quantity: product.total_quantity
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.error === 0) {
					document.getElementById('successMsg').innerHTML = resp.msg;

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
	}
};

$(document).ready(function() {
	product.getItem();
});
