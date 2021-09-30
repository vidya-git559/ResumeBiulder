<!doctype html>
<html>
<head>	
<title>Login</title>
	
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
	{  background-color: #3DCFD3;
		width: 400px  ;
		height: 400px ;
		text-align: center;
		margin: 0 auto;
		
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
  width: 100px;
  font-size: 18px;
  margin: 5px;
}
		
</style>

</head>
<body>


<div class="container">
		<img src ="./images/men.png">
			<form action="" method="POST">
								
				<input class="text" type="text" name='user' placeholder ="   Enter UserName" ><br/>
				<input class="text" type="password" name='pass' placeholder ="   Enter PassWord" ><br/>	

				<input class="button" type="submit" value='Login' name='submit'>
				
				
			</form>	
			
<?php 

if (isset($_POST['submit'])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {

$user=$_POST['user'];
$pass=$_POST['pass'];



$con=mysqli_connect('localhost','root','','resumebuilder');

$query=mysqli_query($con,"SELECT user,pass FROM register WHERE user='".$user."'");

$numrows=mysqli_num_rows($query);

if($numrows!=0)  
    {  	
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['user'];  
    $dbpassword=$row['pass'];  
    }  
    if($user == $dbusername)  

    {  
		
    session_start();  
    $_SESSION['user']=$user;  
    echo "Successfully logged in";
    header("Location: ResumeForm.html");
    
    }  
    } else {  
    echo "Invalid username or password!";  
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
<a href="register.php">Register</a> 
</body>
</html>