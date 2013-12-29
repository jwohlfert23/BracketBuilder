
$(document).ready(function(e){

	
    $('.form-signin').submit(function(e){
		e.preventDefault();
		e.stopPropagation();
		var form = $('.form-signin').serialize();
		$.ajax({
			data: form,
			method: 'post',
			url: 'controllers/users.php/login',
			dataType: 'json',
			success: function(data)	{
				if(data === true){		
					if(window.location.hash)
						window.location = 'bracket.php' + window.location.hash;
					else	
						window.location = 'index.php';										
				}
				else{
					makeNoty('error','Incorrect Username/Password');
				}
			},
			error: function(data)	{
				makeNoty('error',data.responseText);
			}
			
		});
	});
});
function makeNoty(type, message)	{
	var n = noty({
	text: message,
	layout: 'topRight',
	type: type,
	closeWith: ['click'],
	callback: {
		afterShow: function()	{
			setTimeout(function() {$.noty.closeAll()},4000);
		}
	}
});
}