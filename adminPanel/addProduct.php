<?php
include("query.php");
include("header.php");
?>



 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded justify-content-center mx-0">
                    <div class="col-md-8 p-5">
                        <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="">Name</label>
                          <input value="<?php // echo $pName?>" type="text" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">

                          <small id="helpId" class="text-danger"><?php // echo $pNameErr?></small>
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input  value="<?php // echo $pDes?>" type="text" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger"><?php // echo $pDesErr?></small>
                        </div>
                        <div class="form-group">
                          <label for="">Price</label>
                          <input  value="<?php // echo $pDes?>" type="text" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger"><?php // echo $pDesErr?></small>
                        </div>
                        <div class="form-group">
                          <label for="">Quantity</label>
                          <input  value="<?php // echo $pDes?>" type="text" name="pQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger"><?php // echo $pDesErr?></small>
                        </div>
                        <div class="form-group">
                          <label for="">Image</label>
                          <input  type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-danger"><?php  // echo $imageNameErr?></small>
                        </div>
                        <div class="form-group">
                          <label for="">Category</label>
                                <select class="form-control" name="cId" id="">
                                    <option value="">Select Category</option>

                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($allCategories as $cat){
                                        ?>
                                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                        <?php
                                    }
                                    
                                    ?>
                                </select>
                        </div>

                        <button  name="addProduct" class="btn btn-primary mt-3">Add</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->












<?php
include("footer.php");
?>