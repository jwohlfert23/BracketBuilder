$.ajaxSetup({ cache: false });
$(document).ready(function(e)	{
	$.ajax({
		url: 'controllers/users.php/info',
		method: 'get',
		dataType: 'json',
		success: function(data)	{
			$("#name").text(data.name);
		},
		error: function(data)	{
			console.log(data);
		}
	});
	load_list();
	
	$(document).on('click','tbody tr td:not(.no-link)', function()	{
		var id = $(this).parent('tr').data('id');
		window.location = 'bracket.php#'+id;
	});
	$(document).on('click','a.delete', function()	{
		if(confirm("Are you sure you want to delete this bracket?"))	{
			var id = $(this).closest('tr').data('id');
			$.get('controllers/brackets.php/'+id+'/delete',function(data){
				load_list();
			},'json');
		}
	});
});
function load_list()	{
	$.ajax({
		url: 'controllers/brackets.php/',
		method: 'get',
		dataType: 'json',
		success: function(data)	{
			var tbody = $('#brackets').find('tbody');
			tbody.empty();
			$.each(data,function(i,v)	{
				tbody.append('<tr data-id="'+v.id+'"><td>' + v.id + '</td><td>' + v.name + '</td><td class="no-link"><a title="Delete" href="#" class="delete"><i class="glyphicon glyphicon-remove"></i></a></td></tr>');
			});
			if(data.length == 0)	{
				tbody.append("<tr><td class='no-link' colspan=4>You haven't created any brackets yet</td.</tr>");
			}
			$('.delete').tooltip();
			$('#loading_image').hide();
		},
		error: function(data)	{
			makeNoty('error',data.responseText);
		}
	});
}
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