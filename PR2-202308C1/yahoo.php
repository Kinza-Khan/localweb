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
  

  <div class="container">
    <form action="" method="post">

        <div class="form-group">
          <label for="">Enter Email</label>
          <input type="text" name="userEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
       
        </div>
        <button class="btn btn-info" name="sub">Submit</button>
    </form>
  </div>

  <?php
    
      if(isset($_POST['sub']))  {
        $userEmail = $_POST['userEmail'];
        // echo $userEmail;
        $emailArray = explode('@',$userEmail);
        // print_r($emailArray);
        $emailLastIndex = $emailArray[count($emailArray)-1];
        // echo $emailLastIndex ;
        $restricDomain = "yahoo.com";
        $finalDomain = strcmp($emailLastIndex,$restricDomain);
        if($finalDomain == 0){
                echo "restriced this domain";
        }
        else{
            echo "allow";
        }

      }

  ?>
    
  </body>
</html>