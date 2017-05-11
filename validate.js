$(document).ready(function() {
	// your js code goes here...	
	
	$("#signup").css("height",$(window).height()/2).css("top",$(window).height()/4);
	$("tr").append("<span>empty</span>");
	$("span").css({"visibility": "hidden"});
	$("#username").blur(function(){
		var reg = /[a-zA-Z0-9]{6,}$/;		
		var obj = $("#username").val();
		if(!$("#username").val().length == 0){if(!reg.test(obj)){$("span").eq(0).text("Error").removeClass("ok info").addClass("error").css({"visibility": "visible"});}
		else  {$("span").eq(0).text("OK").removeClass("info error").addClass("ok").css({"visibility": "visible"});}
		}
		else $("span").eq(0).css({"visibility": "visible"}).text("this field is mandatory ").removeClass("ok info").addClass("error");
		
	})
	$("#password").blur(function(){
		var reg = /^\w{8,}$/;		
		var obj = $("#password").val();
		if(!$("#password").val().length == 0){if(!reg.test(obj)){$("span").eq(1).text("Error").removeClass("ok info").addClass("error").css({"visibility": "visible"});}
		else  {$("span").eq(1).text("OK").removeClass("error info").addClass("ok").css({"visibility": "visible"});}
		}
		else $("span").eq(1).css({"visibility": "visible"}).text("this field is mandatory ").removeClass("ok info").addClass("error");
		
	})
		$("#email").blur(function(){
		var reg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;		
		var obj = $("#email").val();
		if(!$("#email").val().length == 0){if(!reg.test(obj)){$("span").eq(2).text("Error").removeClass("ok info").addClass("error").css({"visibility": "visible"});}
		else  {$("span").eq(2).text("OK").removeClass("error info").addClass("ok").css({"visibility": "visible"});}
		}
		else $("span").eq(2).css({"visibility": "visible"}).text("this field is mandatory ").removeClass("ok info").addClass("error");
		
	})
	
	$("#username").focus(function(){
		$("span").eq(0).css({"visibility": "visible"}).removeClass("error info").addClass("info").text("The username field must contain only alphabetical or numeric characters.");
		
	})
	$("#password").focus(function(){
		$("span").eq(1).css({"visibility": "visible"}).removeClass("error info").addClass("info").text("The password field should be at least 8 characters long.");
	})	
	$("#email").focus(function(){
		$("span").eq(2).css({"visibility": "visible"}).removeClass("error info").addClass("info").text("The email field should be a valid email address.");
	})	
	
	$("#submit").hover(function(){
		var reg = /[a-zA-Z0-9]{6,}$/;		
		var obj = $("#username").val();
		var reg1 = /^\w{8,}$/;		
		var obj1 = $("#password").val();
		var reg2 = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;		
		var obj2 = $("#email").val();
		if(!reg.test(obj)){$("span").eq(0).fadeOut(100).fadeIn(100);}
		if(!reg1.test(obj1)){$("span").eq(1).fadeOut(100).fadeIn(100);}
		if(!reg2.test(obj2)){$("span").eq(2).fadeOut(100).fadeIn(100);}
		if(!reg.test(obj)||!reg1.test(obj1)||!reg2.test(obj2)){
			$("#submit").attr("onclick","refuse();")
		}
	})
	
});
