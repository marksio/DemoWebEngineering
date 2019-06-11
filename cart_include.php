<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <hr>
                <h2 class="intro-text text-center">
                    <strong>Cart Summary</strong>
                </h2>
                <hr>
            </div>
                    <div class="col-lg-8-center">
                    <table id="purchase-table" class="table table-condensed table-bordered table-responsive table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr class="info">
                                <th>ID</th>
                                <th>Your Name</th>
                                <th>Book Title</th>
                                <th>Date & Time of Purchase</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                             <?php
                                $total_amount = 0;
                                $total_quantity = 0;

                                if($result_AllPurchase->num_rows > 0){
                                    while($row = $result_AllPurchase->fetch_assoc())
                                    {
                                        echo "<tr>";
                                            echo "<td id='t_purchase_ID'>". $row['cid'] ."</td>";
                                            echo "<td id='t_product_name'>". $row['name'] ."</td>";
                                            echo "<td id='t_product_title'>". $row['title'] ."</td>";
                                            echo "<td id='t_product_sys_time'>". $row['sys_time'] ."</td>";
                                            echo "<td id='t_product_quantity'>". $row['quantity'] ."</td>";
                                            echo "<td id='t_product_price'>". $row['sum_price'] ."</td>";
                                            echo "<td>";
                                                echo '<button type="button" class="btn btn-warning get_purchaseInformation_EditRow" data-toggle="modal" data-target="#modal_edit_purchase"><span class="glyphicon glyphicon-pencil"></span></button> ';
                                                echo '<button type="button" class="btn btn-danger get_purchaseInformation_DeleteRow" data-toggle="modal" data-target="#modal_delete_purchase"><span class="glyphicon glyphicon-remove"></span></button>';
                                            echo "</td>";
                                        echo "</tr>";

                                        $total_amount += $row['sum_price'];
                                        $total_quantity += $row['quantity'];

                                        $_SESSION['total_amount'] = $total_amount;
                                        $_SESSION['total_quantity'] = $total_quantity;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="container-fluid">
                        <div style="float: right; margin-top: 30px; font-size: 20px;">
                            <p style="display: inline;">Total Quantity Purchase : </p>
                            <p style="display: inline;"><b> &nbsp; <?php echo $total_quantity; ?></b></p>
                            <br><br>
                            <p style="display: inline;">Total Amount : </p>
                            <p style="display: inline;"><b> &nbsp; $ <?php echo $total_amount; ?></b></p>
                        </div>
                        <form role="form" method="GET">
                            <div class="row"> 
                                <div class="form-group col-lg-12">
                                	<?php
                                	if($result_AllPurchase->num_rows > 0)
								        {
								            echo '
		                                    <button type="submit" class="btn btn-default" name="add" style="width: 30%; margin-top: 30px; margin-left: 35%; margin-right: 35%;"><img src="http://alarm.ezyapp.in/images/shop/pay.jpg" style="max-width: 100%"></button>
		                                    ';
								        }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Purchase Modal -->
                <div class="modal fade" id="modal_edit_purchase" tab-index="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <strong>Edit Purchase Item Quantity</strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form class="form-horizontal" method="GET">
                                        <div class="form-group" style="display: none">
                                            <label class="control-label col-sm-2" for="modal_editPurchaseInfo_id">id</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="modal_editPurchaseInfo_id" id="modal_editPurchaseInfo_id" placeholder="id">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="modal_editUserInfo_userStatus">Quantity</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="modal_editPurchaseInfo_quantity" id="modal_editPurchaseInfo_quantity">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-9">
                                                <button type="submit" class="btn btn-success" name="do_UpdatePurchaseInformation">Update</button> <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Purchase Modal -->
                <div class="modal fade" id="modal_delete_purchase" tab-index="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <strong>Confirm?</strong>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="GET">
                                    <input hidden type="text" name="purchaseInformation_delete_purchaseID" id="purchaseInformation_delete_purchaseID" placeholder="PurchaseID">
                                    <label><font color="red">Remove the current purchase item permantently?</font></label><br>
                                    <button type="submit" class="btn btn-success" name="do_purchaseInformation_DeleteRow">Yes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<script>
    $(document).ready(function(){
        $('#purchase-table').DataTable({
            "columns":[
                {"width" : "1%"}, // id
                {"width" : "15%"}, // User Name
                {"width" : "30%"}, // Book Title
                {"width" : "15%"}, // Date & Time of Purchase
                {"width" : "8%"}, // Quantity
                {"width" : "10%"}, // Price
                {"width" : "10%"}, // action
            ]
        });

        // Get userInformation Row Data - Edit
        $(document).on('click',".get_purchaseInformation_EditRow",function(){
            var $row = $(this).closest("tr");
            var $id = $row.find("#t_purchase_ID").text();
            var $quan = $row.find("#t_purchase_quantity").text();

            document.getElementById("modal_editPurchaseInfo_id").value = $id;
            document.getElementById("modal_editPurchaseInfo_quantity").value = $quan;
        });
        
        // Get userInformation Row Data - Delete
        $(document).on('click',".get_purchaseInformation_DeleteRow",function(){
            var $row = $(this).closest("tr");
            var $id = $row.find("#t_purchase_ID").text();
            
            document.getElementById("purchaseInformation_delete_purchaseID").value = $id;
        });

    });
</script>

<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>