<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>loan Scheme</title>
  </head>
  <body>
  
        <div class="container p-5">
                    <form action="" method="post">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="userName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Age</label>
                          <input type="text" name="userAge" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Basic Salary</label>
                          <input type="text" name="userSalary" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Loan Amount</label>
                          <input type="text" name="userAmount" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <label for="">Select Duration</label>
                          <select class="form-control" name="timeDuration" id="">
                            <option>Select</option>
                            <option value="5">5</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                        <button class="btn btn-info" name="sub">Submit</button>
                    </form>
        </div>  

                    <?php
                    if(isset($_POST['sub'])){
                        $userName = $_POST['userName'];
                        $userAge = $_POST['userAge'];
                        $userSalary = $_POST['userSalary'];
                        $loanAmount = $_POST['userAmount'];
                        $timeDuration = $_POST['timeDuration'];
                        $installment = $loanAmount/($timeDuration*12);

                        if($userAge>=21 && $userSalary>=40000 && ($loanAmount>=200000 && $loanAmount<=1000000)){
                                echo $userName . " your monthly installment is " . $installment;
                        }
                    }
                    
                    ?>
  </body>
</html>