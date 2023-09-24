<?php session_start() ?>
<?php 
$connection = mysqli_connect('localhost', 'root', '', 'shop_mall');

if (isset($_POST['submit'])) {

$email = mysqli_real_escape_string($connection, $_POST['email']);
$password 	= mysqli_real_escape_string($connection, $_POST['password']);


// prepare database query
$query = "SELECT * FROM admin_login
			WHERE email = '{$email}'
			AND password = '{$password}'
			LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			if ($result_set) {

				if (mysqli_num_rows($result_set)==1) {
					$user = mysqli_fetch_assoc($result_set);
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['first_name'] = $user['first_name'];
					header('Location: user.php');
						}else{
							echo "Inavalid username or password";
						}
					}
				} 
 		?>
		<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" >
      <h3>Admin login</h3>
    
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
   </form>

</div>

</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
				<p>
					<label for="">Username</label>
					<input type="text" name="email" id="" placeholder="Email">
				</p>

				<p>
					<label for="">Password</label>
					<input type="password" name="password" id="" placeholder="password ">
				</p>

				<p>
					<button type="submit" name="submit">Log IN</button>
				</p>
	</form>
</body>
</html> -->