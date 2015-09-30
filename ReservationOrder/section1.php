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
							<li class="active">1</li>
							<li>2</li>
							<li>3</li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="input-group">
						  <input type="text" name="typeahead" class="typeahead form-control" autocomplete="off" placeholder="Search...">
						  <span class="input-group-btn">
							<button class="btn btn-default" type="button" id="">Search</button>
						  </span>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
				</div>
            </div>
			<div class="col-lg-12 well">
				<?php
				
				//connection to the database
				$con = mysql_connect("localhost","root","")
					or die("Unable to connect to MySQL");
					echo "Connected to MySQL<br>";

				//select a database to work with
				$selected = mysql_select_db("projectarrow4x4",$con) 
				  or die("Could not select reservation");

				//execute the SQL query and return records
				$result = mysql_query("SELECT id, item_type, item, description, quantity, image FROM products");

				//fetch tha data from the database 
				while ($row = mysql_fetch_array($result)) {
					print('<div class="col-lg-2">
						1
					</div>
					<div class="col-lg-2">
						2
					</div>
					<div class="col-lg-2">
						3
					</div>
					<div class="col-lg-2">
						4
					</div>
					<div class="col-lg-2">
						5
					</div>
					<div class="col-lg-2">
						6
					</div>');
				   echo "ID:".$row{'id'}." Item Type:".$row{'item_type'}." Item:". //display the results
				   $row{'item'}." Description:".$row{'description'}." Quantity:".$row{'quantity'}." Image:".$row{'image'}."<br>";
				}
				//close the connection
				mysql_close($con);
				?>
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