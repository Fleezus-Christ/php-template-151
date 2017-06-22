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
    
    <div id="filterbar">
            <form name="filter_topic" enctype="multipart/form-data"  method="post">
                <ul>
                    <li>
                        <label class="filter_topic_lbl">Categorie:</label>
                        <select style="margin-left: 16px; width: 154px;" class="stdslct" name="categorie">
                            <option selected="selected" disabled>--Choose--</option>
                                <?php                     
                                    // First Argument is the categories array:
                                    $categories = $arguments[1];

                                    foreach ($categories as $categorie)
                                    {
                                        echo("<option value='{$categorie['id']}'>{$categorie['name']}</option>");
                                    }
                                ?>
                        </select>
                    </li>
                    <li>
                        <label class="filter_topic_lbl">Date:</label>
                        <select style="margin-left: 16px; width: 154px;" class="stdslct" name="sortOrder">
                            
                            <option selected="true" value="DESC">Newest</option>
                            <option value="ASC">Oldest</option>
                        </select>
                    </li>
                    <li>
                        <input id="Filtertbutton" class="regbut" name="submit" type="submit" value="Filter"  />
                    </li>
                </ul>
            </form>            
        </div>
    
    
    
    
    
    <div id="topic_table">
    
    <section> 
      <h1>Topics</h1>
      <div class="tbl-header">
          <table class="topicTable" style= "margin: 0 auto;">
              <thead>
                <tr>
                  <th>Topic Name / Creator</th>
                  <th>Number of Comments</th>
                  <th>Created</th>
                </tr>
              </thead>
          </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">  
          <tbody>
            <?php
                // Second Argument is the topics array:
                $topics = $arguments[2];

                foreach ($topics as $topic)
                {
                    echo(
                    "<tr style='color:#808080;'>
                        <td><a class='topicListHeader' href=?menu=mdetail_topic&topicID={$topic['id']}><font color='#fff'>{$topic['title']}</font></a> <br><p style='font-size:12px; margin:0px;'>By:{$topic['username']}</p></td>
                        <td>{$topic['commentCount']}</td>
                        <td>{$topic['dateCreated']}</td>
                    </tr>\n");

                }
            ?>
          </tbody>
        </table>
      </div>
    </section>
      
      
      
</div>
</body>
</html>