//Set Validation error messages to be compatible with bootstrap classes
jQuery.validator.setDefaults({
  debug: true,
  success: "valid",
  highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
//Validate and Submit Form
$(document).ready(function(e) {
	var form = $('.form-register');

   form.submit(function(e) {
		e.preventDefault();
		e.stopPropagation();
		form.validate({
			rules: {
				first: "required",
				last: "required",
				email: {
					required: true,
					email: true
				},
				password: 	{
					required: true,
					minlength: 6
				},
				cpassword: 	{
					required: true,
					equalTo: '#password'
				}
			}
		});
		if(form.valid())	{
		
			$.ajax({
				data: form.serialize(),
				method: 'post',
				url: 'controllers/users.php/register',
				dateType: 'json',
				success: function(data)	{
					window.location = 'index.php';
				},
				error: function(data)	{
					makeNoty('error',data.responseText);
				}
			});
		}
		else	{
		}
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