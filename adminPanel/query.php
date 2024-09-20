<?php
include('../dbcon.php');
session_start();
$cName = $cDes = $imageName = "";
$cNameErr = $cDesErr = $imageNameErr = "";
if(isset($_POST['addCategory'])){   
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $imageName = $_FILES['cImage']['name'];
    if(empty($cName)){

        $cNameErr = "Category Name is Required";
    }
    if(empty($cDes)){

        $cDesErr = "Category Description is Required";
    }
        $format = ["jpg","png","jpeg","webp"];
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        if(!in_array($extension, $format)){
            $imageNameErr = "Invalid Format";
        }
    if(empty($cNameErr ) && empty($cDesErr) && empty($imageNameErr)){
    $imageTmpName = $_FILES['cImage']['tmp_name'];
    $imageSize = $_FILES['cImage']['size'];  
    $destination = "img/".$imageName;
                  if(move_uploaded_file($imageTmpName,$destination)){
                            $query = $pdo->prepare("insert into categories (name ,des, image) values (:name , :des ,:image)");
                            $query->bindParam('name',$cName);
                            $query->bindParam('des',$cDes);
                            $query->bindParam('image',$imageName);
                            $query->execute();
                            echo "<script>alert('category added successfully');
                            location.assign('viewCategory.php')
                            </script>";
                }
        }
        

}

// update work

if(isset($_POST['updateCategory'])){
    $cId = $_GET['id'];
    $cName = $_POST['cName']; 
    $cDes = $_POST['cDes'];
    $query = $pdo->prepare("update categories set name = :cName , des = :cDes where id = :cId");
    if(isset($_FILES['cImage'])){
            $cImageName = $_FILES['cImage']['name'];
            $cImageTmpName = $_FILES['cImage']['tmp_name'];
            $destination = "img/".$cImageName;
            $extension  = pathinfo($cImageName , PATHINFO_EXTENSION);
            $format = ["jpge","jpg" ,"png" , "webp"];
            if(in_array($extension , $format)){
                  if(move_uploaded_file($cImageTmpName,$destination)){  
                    $query = $pdo->prepare("update categories set name = :cName , des = :cDes , image = :cImage where id = :cId");
                    $query->bindParam('cImage',$cImageName);   
                  } 
            }
    }
    $query->bindParam('cName',$cName);
    $query->bindParam('cDes',$cDes);
    $query->bindParam('cId',$cId);
    $query->execute();
    echo "<script>alert('category updated successfully');
    location.assign('viewCategory.php')
    </script>";
    
}


// delete category
if(isset($_GET['cId'])){
    $cId = $_GET['cId'];
    $query = $pdo->prepare("delete  from categories where id = :cID");
    $query->bindParam('cID',$cId);
    $query  -> execute(); 
    echo "<script>alert('category delete successfully');
    location.assign('viewCategory.php')
    </script>";
}


// add Product 
if(isset($_POST['addProduct'])){
    $pName = $_POST['pName'];
    $pDes = $_POST['pDes'];
    $pQty = $_POST['pQty'];
    $pPrice = $_POST['pPrice'];
    $cId = $_POST['cId'];
    $pImageName = $_FILES['pImage']['name'];
    $pImageTmpName = $_FILES['pImage']['tmp_name'];
    $destination = "img/".$pImageName;
    $extension = pathinfo($pImageName,PATHINFO_EXTENSION);
    $format = ['jpg' , "jpge" , "png" , "webp"];
    if(in_array($extension,$format)){
        if(move_uploaded_file($pImageTmpName,$destination)){
            $query = $pdo->prepare("insert into products (name , price , des , qty , image , c_id ) values (:name ,  :price ,:des , :qty , :image , :c_id )");
            $query->bindParam('name',$pName);
            $query->bindParam('des',$pDes);
            $query->bindParam('qty',$pQty);
            $query->bindParam('price',$pPrice);
            $query->bindParam('c_id',$cId);
            $query->bindParam('image',$pImageName);
            $query->execute();
            echo "<script>alert('product added successfully');
            location.assign('addProduct.php')
            </script>";
        }
    }
}

//products update Work


if(isset($_POST['updateProduct'])){
    $pId = $_GET['id'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pDes = $_POST['pDes'];
    $pQty = $_POST['pQty'];
    $cId = $_POST['cId'];
    $query = $pdo->prepare("update products set name = :pName , price =:pPrice , des = :pDes , qty = :pQty , c_id = :cId where id = :pId");
    if(isset($_FILES['pImage'])){
        $pImageName = $_FILES['pImage']['name'];
        $pImageTmpName = $_FILES['pImage']['tmp_name'];
        $destination = "img/".$pImageName;
        $extension = pathinfo($pImageName,PATHINFO_EXTENSION);
        $format = ["jpg" , "png" , "jpeg" ,"jfif" , "webp"];
        if(in_array($extension , $format)){
            if(move_uploaded_file($pImageTmpName,$destination)){  
              $query = $pdo->prepare("update products set name = :pName , price =:pPrice , des = :pDes , qty = :pQty , c_id = :cId , image = :pImage where id = :pId");
              $query->bindParam('pImage',$pImageName);   
            } 
      }
    }
    $query->bindParam('pName',$pName);
    $query->bindParam('pPrice',$pPrice);
    $query->bindParam('pDes',$pDes);
    $query->bindParam('pQty',$pQty);
    $query->bindParam('cId',$cId);
    $query->bindParam('pId',$pId);
    $query->execute();
    echo "<script>alert('product updated successfully');
    location.assign('viewProducts.php')
    </script>";

}

?>