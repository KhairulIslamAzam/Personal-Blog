          
<table class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>post_catagorie_id</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Date</th>
                      <th>Image</th>
                      <th>Contents</th>
                      <th>Tags</th>
                      <th>Post Comment Count</th>
                      <th>Status</th>
                           
                  </tr>
              </thead>
              <tbody>
                  
<?php

        $query = "SELECT * FROM posts ";
        $select_post = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_post)){
        $post_id = $row['post_id'];
        $post_catagorie_id = $row['post_catagorie_id'];
            
        $post_title = $row['post_title'];                      
        $post_author = $row['post_author'];                      
                             
        $post_date = $row['post_date'];                      
        $post_image = $row['post_image'];                      
        $post_content = $row['post_content'];                      
        $post_tag = $row['post_tag'];                                            
        $post_comment_count = $row['post_comment_count'];                      
        $post_status = $row['post_status'];
            
        echo "<tr>";
        echo "<td>$post_id</td>";
            
            
            
        $query = "SELECT * FROM categories WHERE cat_id = {$post_catagorie_id} ";
        $select_catagories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_catagories)){
             $cat_id = $row['cat_id'];  
             $cat_title = $row['cat_title'];
              echo "<td>{$cat_title}</td>";
        }
            
            
             
        echo "<td>$post_title</td>";   
        echo "<td>$post_author</td>";   
        echo "<td>$post_date</td>";   
        echo "<td><img width='100' src='../images/$post_image'></td>";   
        echo "<td>$post_content</td>";   
        echo "<td>$post_tag</td>";   
        echo "<td>$post_comment_count</td>";   
        echo "<td>$post_status</td>";   
        echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";  
        echo "<td><a href='post.php?delete={$post_id}'>Delete</a></td>";  
        echo " </tr>";
    }
?>
    
<?php
                  
  if(isset($_GET['delete'])){
      $the_post_id = $_GET['delete'];
      
      $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
      $delete_query = mysqli_query($connection,$query);
      
      header("Location: post.php");
  }                
                  
?>

    </tbody>
</table> 