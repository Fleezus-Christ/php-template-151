<!DOCTYPE>
<html>
<head>
	<title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div id="navigation">
        <?php include ("navigation.html.php"); ?>
    </div>
    <div class="centered">

        <h1>Registration</h1>

        <?php
        // echo $_GET['errorText'];
        ?>    

        <form method="POST">
            <input type="text" class="loretxtbx" name="txtbx_reg_usr" placeholder="Username"><br>    

            <input type="text" class="loretxtbx" name="txtbx_reg_eml" placeholder="Email"><br>    

            <input type="password" class="loretxtbx" name="txtbx_reg_pas" placeholder="Password"><br>

            <input type=submit name="submit" value="Register" class="regbut"/>

        </form>

        <div class="regloghref">
        Already have an Account? Login <a href='login'>here</a>
        </div>
    </div>    
</body>
</html>