$(document).ready(function(){
	$('#register').click(function(){
		fullname = $('#fullname').val();
		username = $('#username').val();
		email = $('#email').val();
		password1 = $('#password1').val();
		password2 = $('#password2').val();
		registeredfor = $('#registeredfor').val();
		$.post("includes/reg.php", {fullname:fullname, username:username, email:email, password1:password1, password2:password2, registeredfor:registeredfor}, function(res){
			$('#modaldialogpopup h2').html("Status");
			if( res == true ){				
				$('.registerform input').val('');
				$('#registeredfor').prop('selectedIndex',0);
				$('#modaldialogpopup #statusmsg').html("<div class='alert alert-success'>Employer Registered Successfully!</div>");
				$('#modaldialogpopup').modal('show');
			}else{
				$('#modaldialogpopup #statusmsg').html(res);
				$('#modaldialogpopup').modal('show');
			}
		});
	});
});