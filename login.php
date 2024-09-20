<?php
include("query.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
                <div class="container p-5">
                        <div class="col-7">
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="">Email</label>
                              <input value="<?php echo $u_Email?>" type="text" name="userEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-danger"><?php echo $u_EmailErr?></small>
                            </div>
                            <div class="form-group">
                              <label for="">Password</label>
                              <input value="<?php echo $u_Pass?>" type="text" name="userPassword" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small id="helpId" class="text-danger"><?php echo $u_PassErr?></small>
                            </div>
                            <button class="btn btn-info" name="userLogin">Login</button>
                            </form>
                        </div>
                </div>
  </body>
</html>