$(document).ready(function(){

	//user registration part
	$('#register').click(function(){

		var name = $('#name').val();
		var userName = $('#userName').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var dataString = 'name='+name+'&userName='+userName+'&email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url:"ajax/getRegister.php",
			data:dataString,
			success:function(data){
				$('#showRegMsg').html(data);
			}
		});
		return false;
	});

	//user login part
	$('#loginSubmit').click(function(){

		var email = $('#email').val();
		var password = $('#password').val();
		var dataString = 'email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url:"ajax/getLogin.php",
			data:dataString,
			success:function(data){

				if($.trim(data) == "empty"){
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					},3000);
				}else if($.trim(data) == "invalid"){
					$(".invalid").show();
					setTimeout(function(){
						$(".invalid").fadeOut();
					},3000);
				}else if($.trim(data) == "disable"){
					$(".disabe").show();
					setTimeout(function(){
						$(".disabe").fadeOut();
					},3000);
				}else if($.trim(data) == "error"){
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					},3000);
				}else{
					window.location = 'exam.php';
				}
			}
		});
		return false;
	});

	$('#profileupdate').click(function(){

		var name = $('#name').val();
		var userName = $('#userName').val();
		var email = $('#email').val();
		var id = $('#id').val();
		var dataString = 'name='+name+'&userName='+userName+'&email='+email+'&id='+id;
		$.ajax({
			type:"POST",
			url:"ajax/updateUser.php",
			data:dataString,
			success:function(data){

				if($.trim(data) == "emptymsg"){
					$(".emptymsg").show();
					setTimeout(function(){
						$(".emptymsg").fadeOut();
					},3000);
				}else if($.trim(data) == "invalidemail"){
					$(".invalidemail").show();
					setTimeout(function(){
						$(".invalidemail").fadeOut();
					},3000);
				}else if($.trim(data) == "failed"){
					$(".failed").show();
					setTimeout(function(){
						$(".failed").fadeOut();
					},3000);
				}else{
					$(".pupdate").show();
					setTimeout(function(){
						$(".pupdate").fadeOut();
					},3000);
				}
			}
		});
		return false;
	});

});

