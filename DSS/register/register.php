<?php
session_start();
$flag = 0;
if(!(empty($_SESSION['err'])) )
{
	$flag = 1;
}


?>

<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet" /> 
	
<script type="text/JavaScript" >
	function validate()
{
	var f=document.form1;
	if(f.name.value=="")
	{	
		f.name.focus();
		return false;
	}
	if(f.password.value=="")
	{	
		f.password.focus();
		return false;
	}
	if(f.email.value=="")
	{	
		f.email.focus();
		return false;
	}
	
	if(f.contact.value=="")
	{	f.contact.focus();
		return false;
	}
	
	return true;
}
</script> 
</head>
<body><div>&nbsp;</div>
<div id="site_title"><h1>Document Sharing System</h1></div>
<div align="left"></div>
</div>


            <div class="section section_with_padding" id="register"> 
            <h2>Register &nbsp;<a href="login.php">Login</a></h2>
			<div class="img_border img_fl">
                <img src="images/register.jpg" alt="image" />	
            </div>
            <div class="half left">
                <h4>Sign up Form</h4>
                <div id="contact_form">
                    <form method="post" name="form1" action="chklogin.php">
                        <div class="left">
                            <label  for="author">Username<font color="#FF0000">*</font>:</label> <input value="<?php if(isset($_SESSION['name']))  echo $_SESSION['name']; ?>"  name="name" type="text" class="input_field" id="name" maxlength="20" />
                            <label for="email">Password<font color="#FF0000">*</font>:</label> <input  name="password" type="password" class="input_field" id="password" maxlength="20" />
							
                        </div>
                        <div class="right">                           
                            <label for="email">Email<font color="#FF0000">*</font>:</label> <input  value="<?php if(isset($_SESSION['email']))  echo $_SESSION['email']; ?>"name="email" type="text" class="input_field" id="email" maxlength="40" />
							
							
						<label for="contact">Contact<font color="#FF0000">*</font>:</label> <input  value="<?php if(isset($_SESSION['contact']))  echo $_SESSION['contact']; ?>"name="contact" type="text" class="input_field" id="contact" maxlength="11" />						
                        </div>
                        <div class="clear"> </div>
                        
                        <input type="submit" class="submit_btn float_l" onClick="return validate()" name="submit" id="submit" value="Submit" />
						<a href="logout.php">Reset</a>&nbsp;
							
                    <?php if(($flag)==1) echo $_SESSION['err']; ?>
                    </form>
                </div> 
            </div>
            
			

</body>
</html>
