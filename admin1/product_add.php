<?php

	include("connection1.php");
	
	session_start();
	
	if(!isset($_SESSION['adminid']) && $_SESSION['adminid']=="")
	{
		header("location:index.php");
	}
	else
	{
	include("header.php");
?>

<script type="text/javascript" src="jquery-1.10.2.js">
</script>
<script type="text/javascript" src="validate.js"></script>
<script>
		
	$("document").ready(function(){
	
		$("#add_product1").click(function(){
			
			var purchase, supplier,name,type,quantity,price,pay;

			purchase = test_drop("#purchase","#msgpurchase");
			
			supplier = test_drop("#supplier","#msgsupplier");
			
			name = test_name("#name","#msgname");

			type = test_name("#type","#msgtype");

			quantity = test_num("#quantity","#msgquantity");
			
			price = test_num("#price","#msgprice");

			pay = test_drop("#pay","#msgpay");

			if(name == true && purchase == true && supplier == true && type == true && quantity == true && pay == true)
			{
				return true;
				
			}
			else
			{
				//alert("hi......");
				return false;
			}
		});
	
	});
</script>

<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9" >
		    <h4 class="page-title">Add Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="product.php">Product Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
		  
		     <div class="col-lg-6">
        <div class="card">
           <div class="card-body" >
          
            <form action="product_process.php" method="post">
           
		   <div class="form-group">
            <label for="input-1">Purchase Name</label>
            <?php
						
					$tbl_name="purchase";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select id = 'purchase' name='purchase_id' class='form-control form-control-rounded' required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['purchase_id'] ."'>" . $row['purchase_item_name']."</option>";
					}
					
					echo "</select>";
				?>
				<span id="msgpurchase"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-2">Supplier Name</label>
            <?php
						
					$tbl_name="supplier";
					
					$sql="select * from $tbl_name ";

					$result=mysql_query($sql);

					echo "<select name='supplier_id' id = 'supplier' class='form-control form-control-rounded' required/>";
					
					echo "<option value='Select'>".Select."</option>";
					
					while ($row = mysql_fetch_array($result)) 
					{
						echo "<option value='" . $row['supplier_id'] ."'>" . $row['supplier_name']."</option>";
					}
					
					echo "</select>";
				?>
			<span id="msgsupplier"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-3">Product Name</label>
            <input type="text" class="form-control form-control-rounded" id="name" placeholder="Enter Product Name" name = "product_name" required/>
			<span id="msgname"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-4">Product Type</label>
            <input type="text" class="form-control form-control-rounded" id="type" placeholder="Enter Product Type" name = "product_type" required/>
			<span id="msgtype"></span>
           </div>
           
		   <div class="form-group">
            <label for="input-5">Product Total Quantity</label>
            <input type="text" class="form-control form-control-rounded" id="quantity" name = "product_quantity" placeholder="Enter Total Quantity" required/>
			<span id="msgquantity"></span>
           </div>
		   
		   <div class="form-group">
            <label for="input-7">Product Price</label>
            <input type="text" class="form-control form-control-rounded" id="price" name = "product_price" placeholder="Enter Price" required/>
			<span id="msgprice"></span>
           </div>
		   
		   <div class="form-group">
				  <label for="basic-select">Payment Type</label>
					<div class="col-sm-13">
				  <select class="form-control form-control-rounded" id="pay" name="payment_type">
							<option value="Select">Select</option>
							<option value="COD">Cash On Delivery</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Debit Card">Debit Card</option>
							<option value="Net Banking">Net Banking</option>
						</select>
						<span id="msgpay"></span>
		</div>
		</div>
           
		   
            <button type="submit" id = "add_product1" class="btn btn-success btn-round waves-effect waves-light m-1" name="add_product"><i class="icon-lock"></i> Add Product</button>
			<button type="reset" class="btn btn-danger btn-round waves-effect waves-light m-1"><i class="icon-refresh"></i> Reset</button>
			
          </div>
          </form>
        
         </div>
      </div>
    </div>
		  </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	

	
	<?php
	
		include("footer.php");
	}	
	?>