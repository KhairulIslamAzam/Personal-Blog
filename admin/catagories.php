<?php include"include/admin_header.php";?>

<div id="wrapper">

  <!-- Navigation -->
  <?php include"include/admin_navigation.php";?>
      <div id="page-wrapper">
         <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin pannel
                        <small>author</small>
                    </h1>
                        
                <div class="col-xs-6">
                           
                <?php insert_cat(); ?>
                          
            <!-- add category -->
            <form action="" method="post">
               <div class="form-group">
                  <label for="cat_title">Add catagory</label>
                  <input type="text" class="form-control" name="cat_title">
              </div>
              
              <div class="form-group">
                 <input type="submit" class=" btn btn-primary" name="submit" value="Add catagory">
              </div>
            </form>
                            
            <!-- update category -->
                            
           <?php 
                if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                include "include/update_categories.php";
                } 
           ?>

        </div> 
                                
        <div class="col-xs-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>id</th>
                    <th>catagory title</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </thead>
                <tbody>
            
                <?php insert_All_Cat(); ?>
                <?php delete_Cat(); ?>

               </tbody>
             </table>
         </div>
       </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
        
<?php include"include/admin_footer.php";?>
