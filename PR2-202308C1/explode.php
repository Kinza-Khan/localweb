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
    <div class="container p-5" >
        <form action="" method="post">
                <div class="form-group">
                  <label for="">Choose File </label>
                  <input type="file" name="fileName" id="" class="form-control" placeholder="">
               
                </div>
                <button class="btn btn-info" name="sub">Submit</button>
        </form>
    </div>

        <?php
        if(isset($_POST['sub'])){
            $fileName = $_POST['fileName'];
            $array = explode(".",$fileName);
            $extension = $array[count($array)-1]
            ?>
                    <h1><?php echo $extension?></h1>
            <?php
        }
        ?>
    
  </body>
</html>