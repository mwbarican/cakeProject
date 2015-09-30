<?php 
	include("header.php");
?>

<!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 marginB25">
				<div class="row">
					<div class="col-lg-6">
						<ul class="sections">
							<li>1</li>
							<li class="active">2</li>
							<li>3</li>
						</ul>
					</div>
					<div class="col-lg-6">
					</div><!-- /.col-lg-6 -->
				</div>
            </div>
			<div class="col-lg-12 well well-lg">
			
				<div class="text-center marginB50">
					<img src="img/arrow4x4-icon.png" class="img-responsive display-img" />
					<h1 class="text-center title-txt"><strong> Web Reservation <small>order</small></strong></h1>
				</div>
				
				<div>
					<form class="form-horizontal">
						<fieldset>

						<!-- Form Name -->
						<legend>Contact Info</legend>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="firstname">First Name</label>  
						  <div class="col-md-4">
						  <input id="firstname" name="firstname" type="text" placeholder="First Name" class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="lastname">Last Name</label>  
						  <div class="col-md-4">
						  <input id="lastname" name="lastname" type="text" placeholder="Last Name" class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="contactno">Contact No.</label>  
						  <div class="col-md-4">
						  <input id="contactno" name="contactno" type="text" placeholder="Contact No." class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="email">Email Address</label>  
						  <div class="col-md-4">
						  <input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="address">Address</label>  
						  <div class="col-md-4">
						  <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="plateno">Plate No.</label>  
						  <div class="col-md-4">
						  <input id="plateno" name="plateno" type="text" placeholder="Plate No." class="form-control input-md" required="">
							
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="model">Landrover Model</label>  
						  <div class="col-md-4">
						  <input id="model" name="model" type="text" placeholder="Landrover Model" class="form-control input-md" required="">
							
						  </div>
						</div>

						</fieldset>
						</form>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="text-center">Reservation Order</h3>
					</div>
					<div class="panel-body">
						<?php 
							print("Hello World!");
						?>
						<div class="text-center">
							<a href="section2.php" class="btn-proceed btn">Proceed to 2</a>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->




<?php 
	include("footer.php");
?>