var moderate = {

	img_name : null,

	getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	},

	saveItem : function() {

		var item_id = moderate.getParameterByName('item_id');

		if(!item_id)
			item_id = '';
		
		$.ajax({
			cache: false,
			url: '../ajax/admin.php?action=saveItem',
			method: 'POST',
			data: {
				item_id: item_id,
				item_image: moderate.img_name,
				item_name: document.getElementById('item_name').value,
				item_type: document.querySelector('input[name = "item_type"]:checked').value,
				item_quantity: document.getElementById('item_quantity').value,
				item_price: document.getElementById('item_price').value
			},
			dataType: 'json',
			success: function(resp) {
				if (resp.error === 0) {
					window.location.href = 'list.php';
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

	getItem : function() {

		var item_id = moderate.getParameterByName('item_id');

		$.ajax({
			cache: false,
			url: '../ajax/admin.php?action=getItem',
			method: 'POST',
			data: {
				item_id: item_id
			},
			dataType: 'json',
			success: function(resp) {

				if (resp.error === 0) {
					var item = JSON.parse(resp.item);

					document.getElementById('item_name').value = item['item_name'];

					if (item['item_type'] == 1) {
						document.getElementById('item_type1').checked = true;
					} else if (item['item_type'] == 2) {
						document.getElementById('item_type2').checked = true;
					} else {
						document.getElementById('item_type3').checked = true;
					}
					
					document.getElementById('item_quantity').value = item['item_quantity'];
					document.getElementById('item_price').value = item['item_price'];
				}
			}
		});
		
		return false;
	}
};


$(document).ready(function() {

	if(moderate.getParameterByName('item_id')) {
		moderate.getItem();
	}
 	
 	$('#file_upload_form').ajaxForm({
 		dataType: 'json',
 		complete: function (resp) {
 			var parsed = JSON.parse(resp.responseText);

 			if(parsed.error === 0) {
 				moderate.img_name = parsed.img_name;
 			} else {
 				document.getElementById('errorMsg').innerHTML = parsed.msg;
				document.getElementById('errorMsg').className = "show";

				setTimeout(function(){
					document.getElementById('errorMsg').className = 'hide';
				}, 3000);
 			}
 		}
 	});

	$('#file_upload').on('change', function() {
		$('#file_upload_form').submit();

		return false;
	});          
});
