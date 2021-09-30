<!doctype html>
<html>
<head>	
<title>Register</title>

	<style>
	body
	{
		margin: 0 auto;
		background-image: url("Simple.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background:linear-gradient(90deg, rgba(0,2,36,1) 0%, rgba(1,1,24,1) 2%, rgba(8,79,93,1) 100%);
	}
	
	.container
	{
		width: 400px  ;
		height: 500px ;
		text-align: center;
		margin: 0 auto;
		background-color: #3DCFD3;
		text-align: center;
		border-radius: 4px;
		margin-top:150px ;
	}
	
	.container img 
	{
		width: 120px  ;
		height: 120px ;
		margin-top: -60px ;
		margin-bottom :30px ;
		
	}
	
	.text
	{
		width: 300px  ;
		height: 45px ;
		font-size: 18px;
		margin-bottom: 20px;
		background-color: #fff;
		border: none;
	}
	
	
	.button {
  padding: 15px 25px ;
  background-color: #f4511e;
  border :none;
  color: #fff;
  text-align: center;
  font-size: 18px;
  border-radius :4px;
  width: 200px;

  margin: 5px;
}
.input {
   margin:20px;
   padding:10px;
}	
				
</style>


</head>
<body>
	
		<div class="container">	
			<img src ="./images/men.png">
			
				<form action="" method="POST">
					
					<input class="text" type="text" name='user' placeholder ="   Enter User Name" ><br/>
					<input class="text" type="email" name='email' placeholder ="   Enter Email" ><br/>	
                    <input class="text" type="password" name='pass' placeholder ="   Enter PassWord" ><br/>	
                    <input class="text" type="password" name='cpass' placeholder ="   Confirm PassWord" ><br/>	
					<input class="button" type="submit" value='Register' name='submit'>
				</form>
				
				
<?php 
if (isset($_POST['submit'])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {


$user=$_POST['user']; 
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];

$con=mysqli_connect('localhost','root','','resumebuilder');

$query=mysqli_query($con,"SELECT * FROM register WHERE user='".$user."'");
$numrows=mysqli_num_rows($query);
if($numrows==0)
{

$encrypt_password=md5($pass);
$encrypt_cpassword=md5($cpass);
$sql="INSERT INTO register (user,email,pass,cpass) VALUES('$user','$email','$encrypt_password','$encrypt_cpassword')";

$result=mysqli_query($con,$sql);


if($result!=1) 
{
echo "Failure!";
}
else{
echo "Registered Successfully" ; 

header("Location: login.php"); 
}
} else {
echo "That username already exists! Please try again with another.";
}

} else {
	echo "All fields are required!";
}
}
?>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="login.php">Login</a>
</body>
</html>