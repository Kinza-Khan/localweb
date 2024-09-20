<?php
include("query.php");
include("header.php")

?>

<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Register Users</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php
                                        $query = $pdo->query("select products.* , categories.id as catId , categories.name as catName from products inner join categories on products.c_id = categories.id");
                                        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                        // print_r($allUsers);
                           foreach($allProducts as $product){

                                  ?>      
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $product['id']?></td>
                                    <td><?php echo $product['name']?></td>
                                    <td><?php echo $product['des']?></td>
                                    <td><?php echo $product['price']?></td>
                                    <td><?php echo $product['qty']?></td>
                                    <td><?php echo $product['catName']?></td>
                                    <td><img height="100px" src="img/<?php echo $product['image']?>" alt=""></td>
                                    <td><a class="btn btn-sm btn-primary" href="editProduct.php?id=<?php echo $product['id']?>">Edit</a></td>
                                    <td><a class="btn btn-sm btn-danger" href="?cId=<?php echo  $product['id']?>">Delete</a></td>
                                </tr>
                                <?php
                                
                                        }
                                        ?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



<?php
include("footer.php")

?>