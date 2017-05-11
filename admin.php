<html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
#login {
background:green;
position:absolute;
border-style: solid;
border-radius:10%;
}
.form-horizontal{padding:40px;}
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
 <div class="col-md-4 col-md-offset-4" id="login">
<form class="form-horizontal" role="form" action="admin_jump.php" method="POST">
   <div class="form-group">
          <label class="col-sm-2 control-label">Admin</label>
          <div class="col-md-8 col-md-offset-1">
          <div class="input-group input-group-md">         
         <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
         <input type="text" class="form-control" name="Admin" id="Admin" 
            placeholder="Admin">
      </div>
      </div>
   </div>
   <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-md-8 col-md-offset-1">
            <div class="input-group input-group-md">
         
         <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
        
         <input type="text" class="form-control" name="Password" id="Password" 
            placeholder="Password">
           </div>
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-10">
       <input type="submit" class="btn btn-default" value="login">
      <br><br/>
      </div>

   </div>
</form>
<a href="login.html" style="cursor: pointer;">User access -></a>
</div>  
</div>
</div>

<script>
$("#login").css("height",$(window).height()/2).css("top",$(window).height()/4);
</script>

</body>
</html>