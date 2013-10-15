
<html>
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<style type="text/css">

.nave{ margin: 5px;
padding:5px;
border:dashed;
border-bottom-left-radius:1px;
border-bottom-right-radius:1px;
width:170px;
height:150px;
		
}
</style>
</head>
<center>
<body >
<b>LOGIN</b>
<form class="nave" method ="post" action="login.php">
<form><table >
	<tr ><td>name<br /> <input type="text" id="idname" name="name" autofocus />
    		</td></tr>
    <tr><td>password<br /> <input type="password" id="idpass1" name="pass1";/>
    		</td></tr>
    <tr><td><br />	
    
    <input id="idsubmit" type="submit" value="submit" name="submit" />
	<a href="register.php"><input  type="button" value="Register" name="Register" /></a>
    		</td></tr>
    
</table></form>
</form>
</body></center>
</html>

<?php session_start();
require'connection.php';



if(isset($_POST['submit']))
{	
$name=$_POST['name'];
$pass1=$_POST['pass1'];

		
		if(empty($name)=== true)
			echo "</br></br>name field can not be empty";  
		else if(empty($pass1)=== true)
			echo "</br>password field can not be empty";
			

		else 
		{
			
		$sql1 = "SELECT * FROM reg WHERE uname = \"$name\" and pass = \"$pass1\"";
	
		$result1 = mysql_query($sql1,$conn) or die(mysql_error());		


	
		
			if(mysql_num_rows($result1)>0)
			{
					$row=mysql_fetch_array($result1);	
			$_SESSION['ok']=true;
				$_SESSION['uname']=$name;
				 
				 
						
				
				header("Location:../") ;
			}else 
				{
					echo "<h3>Wrong Username OR Password</h3>";
				}
		}
		
		
		
		
		
}



function recentq($ind)
{
require'chat/connection.php';

$sql = "SELECT * FROM `qna` WHERE qno= $ind % 211+1";
$result = mysql_query($sql,$conn) or die("check my sql query");

	 $_SESSION['que']=mysql_result($result,0,"que");
	 $_SESSION['ans']=mysql_result($result,0,"ans");
	 $_SESSION['point'] = mysql_result($result,0,"point");
	 $_SESSION['done'] = mysql_result($result,0,"done");
	
}
 ?>













