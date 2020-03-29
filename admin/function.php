<?php


   function confirmQuery($result){
       global $connection;     
       if(!$result){
          die("query failed".mysqli_error($connection));
      }
   }

  
   function insert_cat(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title)){
                echo "field is empty";
            }else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUE('$cat_title') ";
                $create_catagory_query = mysqli_query($connection, $query);

                if(!$create_catagory_query){
                    die("catagory adding failed".mysqli_error($connection));
                }
            }
        }
   }


   function insert_All_Cat(){
         
        global $connection;
        $query = "SELECT * FROM categories ";
        $select_catagories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_catagories)){
        $cat_id = $row['cat_id'];  
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='catagories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='catagories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
        }
                
   }

  function delete_Cat(){
      
        global $connection;
        if(isset($_GET['delete'])){
            $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("location: catagories.php");
        }    

  }


?>