<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <?php
        $errors=[];
        $oldValues=[];
        if(isset($_GET['errors']) || isset($_GET['oldValues'])){
          if(!empty($_GET['errors'])){
            $errors=(array)json_decode($_GET['errors']);
          }

          if(!empty($_GET['oldValues'])){
            $oldValues=(array)json_decode($_GET['oldValues']);
          }
        }
    ?>

    <!-- Start Form -->
    <div style="width:70%;margin:auto;margin-top: 50px;margin-bottom: 150px;">
      <form action="CRUDS/add.php" method="post">
        <fieldset>
          <legend>Test Form</legend>
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" id="firstName" name="firstName" class="form-control <?php if(isset($errors['fname']))echo 'border border-danger'; ?>" placeholder="enter your first name" value="<?php if(isset($oldValues['fname'])) echo $oldValues['fname']; ?>" >
            <small id="helpId" class="form-text text-danger"><?php echo $errors['fname'] ?></small>
          </div>

          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="form-control <?php if(isset($errors['lastName']))echo 'border border-danger'; ?>" placeholder="enter your last name" value="<?php if(isset($oldValues['lastName'])) echo $oldValues['lastName']; ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $errors['lastName'] ?></small>
          </div>

          <div class="form-floating">
            <label for="floatingTextarea2">Address</label>
            <textarea class="form-control" placeholder="type your address" name="address" style="height: 100px"></textarea>
          </div>

          <br>
          <div class="form-floating">
            <label for="">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select name="country" class="form-select" aria-label="Default select example">
              <option selected value="Egypt">Egypt</option>
              <option value="UAE">UAE</option>
              <option value="USA">USA</option>
              <option value="Austoria">Austoria</option>
            </select>
          </div>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="male" id="">
            <label class="form-check-label" for="">
              Male
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="female" id="">
            <label class="form-check-label" for="">
              Female
            </label>
          </div>
          <small id="helpId" class="form-text text-danger"><?php echo $errors['gender'] ?></small>

          <div class="form-floating">
            <label for="">Skills&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="skills[]" value="PHP" id="1">
              <label class="form-check-label" for="1">
                PHP
              </label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input class="form-check-input" type="checkbox" name="skills[]" value="MySQL" id="2">
              <label class="form-check-label" for="2">
                MySQL
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="skills[]" value="JavaScript" id="3">
              <label class="form-check-label" for="3">
                JavaScript
              </label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input class="form-check-input" type="checkbox" name="skills[]" value="NodeJs" id="4">
              <label class="form-check-label" for="4">
                NodeJs
              </label>
            </div>
          </div>
          <br><br>
          <div class="mb-3">
            <label for="" class="form-label">User Name</label>
            <input type="text" class="form-control <?php if(isset($errors['username']))echo 'border border-danger'; ?>" name="username" value="<?php if(isset($oldValues['username'])) echo $oldValues['username'] ?>">
            <small id="helpId" class="form-text text-danger"><?php echo $errors['username'] ?></small>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control <?php if(isset($errors['password']))echo 'border border-danger'; ?>" name="password" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-danger"><?php echo $errors['password'] ?></small>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Department</label>
            <input type="text"
              class="form-control" name="department" id="" aria-describedby="helpId" placeholder="OpenSource">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Code</label>
            <input type="text"
              class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            <label for="">Please Enter Your Code Here</label>
          </div>

          <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
          <button type="reset" name="resetBtn" class="btn btn-primary">Reset</button>
      </form>
    </div>
    <!-- End Form -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

