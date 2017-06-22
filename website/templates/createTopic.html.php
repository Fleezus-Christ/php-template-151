<!DOCTYPE>
<html>
<head>
	<title>Create Topic</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <div id="navigation">
        <?php include ("navigation.html.php"); ?>
    </div>

    <div class="centeredCrtTpc">
        <h1>Create a Topic</h1>

        <form name="new_topic" enctype="multipart/form-data" method="POST">

        <div class='check-container'>
            <input type='checkbox' name="anonymous" id='one'>
            <label for='one'></label>
            <span class='tag'>Anonymous Post</span>
        </div>

        <div class="create"><input class="nortxtbx" name="title" type="text" placeholder="Titel of your topic..." value=""></div>
        <div class="create">
            <select class="stdslct" name="category">
                <option selected disabled>Please choose a category</option>
                <?php
                    // First Argument is the categories array:
                    $categories = $arguments[1];
                
                    foreach ($categories as $categorie)
                    {
                        echo("<option value='{$categorie['id']}'>{$categorie['name']}</option>");
                    }
                ?>
            </select>
        </div>       
            <div class="create">
                <textarea class="nortxtara" rows="10"  name="content" placeholder="Content of your topic..."></textarea>
                
            </div>

        <input class="regbut" name="submit" type="submit" value="Post"  />
        </form>
        <br />
    </div>       
    
</body>
</html>

