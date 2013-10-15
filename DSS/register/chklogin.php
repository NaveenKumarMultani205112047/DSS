<?php
session_start();
require 'connection.php';



if(isset($_POST['submit']))
{	
$name=$_SESSION['name']=$_POST['name'];
$pass=$_POST['password'];
$email = $_SESSION['email'] = $_POST['email'];
$contact = $_SESSION['contact']=$_POST['contact'];

		
		if(empty($name)=== true)
			{header("Location: register.php") ; $_SESSION['err'] = '<font color="#FF0000"> </br>Name field can not be empty </font>';  }
		else if(empty($pass)=== true)
			{	header("Location: register.php") ; $_SESSION['err'] = '<font color="#FF0000"> </br>Password field can not be empty</font>';}
		
		else if(empty($email)=== true)
			{	header("Location: register.php") ;$_SESSION['err'] =  '<font color="#FF0000"> </br>Email field can not be empty</font>';}
		else if(empty($contact)=== true)
			{header("Location: register.php") ; $_SESSION['err'] = '<font color="#FF0000">Contact field can not be empty</font>';	}
		else 
		{
			
			 if(!preg_match('/^\d\d\d\d\d\d\d\d\d\d$/',$contact)) 
			{
				
				$_SESSION['err'] ='<font color="#FF0000">Invalid contact number</font>';
				header("Location: register.php") ; 
			}
			else if (strlen($pass)<3)
			{
				
				$_SESSION['err'] ='<font color="#FF0000">Password should be atleast 3 characters long</font>';
				header("Location: register.php") ; 
			}
			
			else if (strlen($name)<3)
			{
				
				$_SESSION['err'] ='<font color="#FF0000">Username should be atleast 3 characters long</font>';
				header("Location: register.php") ; 
			}
			else 
			if(mysql_query("INSERT INTO `reg` VALUES ('$name','$pass','$email','$contact')"))
				{
					
					$_SESSION['sname']=$name; 
					$_SESSION['err'] =  '<font color="#00FF00" > registration successfull </font>';
					$_SESSION['reg'] =  1;header("Location: register.php") ;
				}
			else if (preg_match("/Duplicate entry/",mysql_error())) // '0' for key 'contact';
			{
				$t = preg_replace("/Duplicate entry/","",mysql_error());
				$_SESSION['err'] = 		'<font color="#FF0000">'.preg_replace("/for key/","is already registered in : ",$t).'</font>';;
				header("Location: register.php");
				// $_SESSION['err'] = '<font color="#FF0000">'.mysql_error().'</font>';	
			}
			else 
			{
			 $_SESSION['err'] = '<font color="#FF0000">'.mysql_error().'</font>';	
			header("Location: register.php");
//			
			}
		}
		
}



?>

