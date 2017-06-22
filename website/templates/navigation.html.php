    <div id="headernav">
        <div id="header">
            
            <a href="home">
                <font font-weight: lighter; color='#808080'>
                    <h1 id="forumTitle">Forum</h1>
                </font>
            </a>
            <ul>
                        
           
            <li><input class="nortxtbx" class placeholder="Search..."></li>
            <li><input id="Filtertbutton" class="regbut" name="submit" type="submit" value="Go"  /></li>
                
                            <?php
                if (isset($_SESSION['sess_user'])){
                    echo("<li><div class='divButton'><a class='divButtonContent' href='createTopic'>Create Topic</a></div></li>");
                }
            ?> 
        
            <?php
                
            if (isset($_SESSION['sess_user'])){
                echo("<li class='register'><a href='logout'>Logout</a></li>".
                     "<li class='register'>"."{$_SESSION['sess_user']}"."</li>");
            }
            else{
                echo("<li class='register'><a href='login'>Log In</a></li>".
                     "<li class='register'><a href='register'>Register</a></li>");
            }
            ?>
            </ul>   	   
        </div>
    </div>