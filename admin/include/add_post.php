<?php 

  if(isset($_POST['create_post'])){
        
        
        $post_title = $_POST['post_title']; 
        $post_author = $_POST['post_author'];
        $post_catagorie_id = $_POST['post_catagory'];
        $post_date = date('d-m-y');
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tag = $_POST['post_tags'];
        $post_status = $_POST['post_status'];
        
        
    move_uploaded_file($post_image_temp, "../images/$post_image");
      
$query = "INSERT INTO posts(post_catagorie_id,post_title,post_author,post_date,post_image,post_content, post_tag,post_status) ";
$query .= "VALUES({$post_catagorie_id},'{$post_title}','{$post_author}',now(),
      '{$post_image}','{$post_content}','{$post_tag}','{$post_status}') ";
      
      $create_post_query = mysqli_query($connection, $query);
     
      confirmQuery($create_post_query);
  }

?>
 

 
 <form action="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
      <label for="post_title">Post Title</label>
      <input class="form-control" type="text" name="post_title">
   </div>
   
   <div class="form-group">
      <select name="post_catagory" id="">
        <?php
            
            $query = "SELECT * FROM categories";
            $select_catagories = mysqli_query($connection,$query);
            confirmQuery($select_catagories);

             while($row = mysqli_fetch_assoc($select_catagories)){
                $cat_id = $row['cat_id'];  
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
             }
        ?>
        
        </select>
   </div>
   
    <div class="form-group">
       <label for="post_author">Post Author</label>
       <input class="form-control" type="text" name="post_author">
   </div>
   
    <div class="form-group">
       <label for="post_status">Post Status</label>
       <input class="form-control" type="text" name="post_status">
   </div>
   
    <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" name="image">
   </div>
   
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
       <input class="form-control" type="text" name="post_tags">
   </div>
   
    <div class="form-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content"  id="" cols="30" rows="10"></textarea>
   </div>
   
    <div class="form-group">

       <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
   </div>
</form>