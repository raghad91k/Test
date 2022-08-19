<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
		#finalP{
        background-color:rgb(26, 190, 231);
        font-weight: bold;
        font-size: 20px;
        border-radius: 10px;
      }
      </style>
</head>
<body>
<header id="hdr">
        <h1 id="h1" style="text-align: center;"> מערכת פתק</h1>
    </header>



<?php include('process.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Check if username is already taken</title>
  <link rel="stylesheet" href="styleForAll.css">
</head>
<body>
 <form action="register.php" method="post" id="register_form">
      <h1>Register</h1>
      <div>
	 	<input type="text" name="username" placeholder="Username" value="" required >
	  </div>
	  <div 
        <?php if (isset($name_error)): ?>
            class="form_error"
        <?php endif ?>

      >
	    <input type="email" name="email" placeholder="Email" value="" required>
        <?php if (isset($name_error)): ?>
            <span><?php echo $name_error; ?></span>
        <?php endif ?>
	  </div>
	  <div>
	   <input type="password" name="password" placeholder="Password" value="" required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(Optional)
	  </div>

    <div>
	   <input type="text" name="phone" placeholder="Cellular number (Optional)" value="">
	  </div>
    
	  <div>
	 	<button type="submit" name="register" id="reg_btn">Register</button>
	  </div>
	</form>
</body>
</html>
<!-- scripts -->
<script src="jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
<br>
<center>
<a href="view.php">
        <button type="button" id="finalP">>Enter to view the usres list</button>
    </a>
        </center>
        <br><br>
<footer id=ftr>
    <p id="p10" style="text-align: center;"> &copy; Raghad Knani, Aseel Abu Fani, 2021</p>
</footer>


</body>
</html>