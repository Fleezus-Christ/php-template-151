<!DOCTYPE>
<html>
<head>
	<title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div id="navigation">
        <?php include ("navigation.html.php"); ?>
    </div>
    <div class="centered">

        <h1>Login</h1>


        <?php
//        echo $_GET['errorText'];    
        ?>  


        <form method="POST">       
            <input type="text" class="loretxtbx" name="txtbx_reg_usr" value="<?= (isset($user)) ? htmlspecialchars($user) : '';?>" placeholder="Username"><br> 
            <input type="password" class="loretxtbx" name="txtbx_reg_pas" placeholder="Password"><br>
            <input type=submit name="submit" value="Login" class="regbut"/>
        </form>

        <div class="regloghref">
            No Account? Register <a href='register'>here</a>
        </div>  
    </div>    
    
</body>
</html>