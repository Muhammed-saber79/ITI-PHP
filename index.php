<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php 
      if(isset($_GET['fileErr'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" style="width:75%;margin:10px auto;" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <?php echo $_GET['fileErr'] ?>
        </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>
        
        <?php
      }

      if(isset($_GET['msg'])){
        ?>
        <div class="alert alert-success alert-dismissible fade show" style="width:75%;margin:10px auto;" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <?php echo $_GET['msg'] ?>
        </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>
        
        <?php
      }

      if(isset($_GET['deleted'])){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" style="width:75%;margin:10px auto;" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <?php echo $_GET['deleted'] ?>
        </div>
        
        <script>
          var alertList = document.querySelectorAll('.alert');
          alertList.forEach(function (alert) {
            new bootstrap.Alert(alert)
          })
        </script>
        
        <?php
      }
    ?>
    <h3 class="text-center fs-1 mt-5 mb-5">List Customers Data</h3>
    <!-- Start Table -->    
    <div class="table-responsive text-center rounded-3 shadow-lg p-3 mb-5 bg-dark-subtle" style="width:70%;margin:30px auto;">
        <a href="addForm.php" class="btn btn-outline-primary mb-lg-4">Add New User</a>        
        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle
        rounded-4">
            <thead class="table-light">
              <!-- <caption>Table Name</caption> -->
              <tr class="fs-5 bg-primary">
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>User Name</th>
                  <th>Password</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
              $path="./CRUDS/customers.txt";
              
              $file = fopen($path,"r");
              if(file_exists($path)){
                if(is_readable($path) && is_executable($path)){
                  $dataString=file_get_contents($path);
                  $allData=explode("\n",$dataString);
 
                  foreach($allData as $index=>$item){
                    if($item != ""){
                      $data = explode(":",$item);
                      ?>
                        <tr class="table-primary " >
                            <td scope="row"><?php echo $data[0] ?></td>
                            <td><?php echo $data[1] ?></td>
                            <td><?php echo $data[2] ?></td>
                            <td><?php echo $data[3] ?></td>
                            <td><?php echo $data[4] ?></td>
                            <td>
                              <a href="/iti/Lab2/editForm.php?username=<?php echo $data[3]; ?>"><button class="btn btn-outline-success">Edit</button></a>
                              <a href="/iti/Lab2/CRUDS/delete.php?username=<?php echo $data[3]; ?>"><button class="btn btn-outline-danger">Delete</button></a>
                            </td>
                        </tr>
                      <?php
                    }
                  } 
                }else{
                  echo "this file can nor be accessed(permissions needed)...!";
                }
              }else{
                echo "no such file exists...!";
              }
            ?>
            </tbody>
        </table>
    </div>
    
    <!-- End Table -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
