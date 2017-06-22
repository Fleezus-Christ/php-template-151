// this is still the old code


<?php
    // Connect to database
    $con=mysql_connect('localhost', 'root', '') or die (mysql_error());
    mysql_select_db('forum') or die ("Cannot select Database");
    
    $topicId = $_GET["topicID"];
    
    // Retreving Topic Content from database
    $sql = "SELECT Title, Content FROM topic WHERE id = " . $topicId;

//    echo($sql . "\n");

    $sqlResult = mysql_query($sql);



    if (!$sqlResult) {
       die("Technical Error: " .  mysql_error());
    }

$num = mysql_num_rows($sqlResult);

//HIER IST NOCH EIN WURM DRIN $num ist leer !!!

    if (mysql_num_rows($sqlResult) == 1) {
        $row = mysql_fetch_assoc($sqlResult);
        $current_topicTitle = $row['Title'];
        $current_topicContent = $row['Content'];
     }
    else {
        echo(mysql_num_rows($sqlResult));
        die("Not exaclty one row found: " . mysqli_num_rows($sqlResult));
    }
?>



<div>    
        <div class="topicTitle">
            <h1><?php echo($current_topicTitle); ?></h1> 
        </div>
        <div class="topicContent">
            <p class="p_Topic_Content"><?php echo($current_topicContent); ?></p>
        </div>      
        
        
        <div id="topic_table">
    <?php
        global $db;
        // CREATE DB CONNECTION
        $con=mysql_connect('localhost', 'root', '') or die (mysql_error());
        mysql_select_db('forum') or die ("Cannot select Database");
    
        $sql="SELECT C.Content, C.Date_created, C.User_Id, U.Username FROM comment C INNER JOIN user U ON C.User_Id = U.Id WHERE C.Topic_Id = {$topicId}";
        
        $sqlResult=mysql_query($sql);

        if(!$sqlResult){
            echo("Technical ERROR:\n" . mysql_error());
            die();
        }
    ?>
        
    
        <section> 
          <h1>Topics</h1>
          <div class="tbl-header">
              <table class="topicTable" style= "margin: 0 auto;">
                  <thead>
                    <tr>
                      <th>Content</th>
                      <th>Creator</th>
                      <th>Date Created</th>
                    </tr>
                  </thead>
              </table>
          </div>
          <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">  
              <tbody>
                <?php
                  while( $row = mysql_fetch_assoc( $sqlResult ) ){
                    echo(
                    "<tr style='color:#808080;'>
                      <td>{$row['Content']}</td>
                      <td>{$row['Username']}</td>
                      <td>{$row['Date_created']}</td>
                    </tr>\n");
                  }
                ?>
              </tbody>
            </table>
          </div>
        </section>     
    </div>
        
    <form name="new_topic" enctype="multipart/form-data" action="?action=aComment" method="post">
        <textarea class="commtxtara" rows="10"  name="content" placeholder="Comment..."></textarea>
        <input type="hidden" name="userId" value="<?php echo($_SESSION['sess_user_id']) ?>">
        <input type="hidden" name="topicId" value="<?php echo($topicId) ?>">
        <input class="regbut" name="submit" type="submit" value="Post Your Comment">
    </form>
</div>












