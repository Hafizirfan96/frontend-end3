     <?php

	  
//$conn=mysqli_connect('localhost','skilling_arsalan','k?8LB?KCXkA^');
//mysqli_select_db("root",$conn);
     include "dbconn.php";

/*if (isset($_GET["pg"])) {
      // Put the two words together with a space in the middle to form "hello world"
      $get_district = $_GET["pg"];
      // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
	 // echo $get_district;
   }
*/
?><head>

    <meta charset="utf-8">
    <title>Balochistan Details Page</title>
   

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.png">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>


  <div class="container">
      <div class="demo-headline">
		<h1 class="demo-logo">
<div class="logo"></div>
          <div style="border:dotted; border-width:thin; background:#ecf0f1; border-radius: 25px;">
		  Balochistan
          <small>All Districts</small>
        </div>
		</h1>
     
	  </div> <!-- /demo-headline -->

<!-- .......................... -->
<h3 class="demo-panel-title">Institute</h3>
<div class="line"></div><br>
      <div class="row demo-swatches-row">
	      <div class="swatches-col">
		      
			  <div class="pallete-itemfull">
			  <img src="img/arrow.png">College of Technologies (Numbers) 
			  </div>
			  
			  <div class="pallete-item">
			      <dl class="palette palette-turquoise">
                <dt><p align="center"><img src="img/maleicon.png" width="28" height="62"></p></dt>
              </dl>
              <dl class="palette palette-green-sea">
                <dt>Male-GCT</dt>
                <dd>
<?php				$result = mysqli_query($conn,"SELECT sum(malegct) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(malegct)']; $malegct = $row['sum(malegct)']; }?></dd>
              </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Female-GCT</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(femalegct) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(femalegct)']; $femalegct = $row['sum(femalegct)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-peter-river">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-belize-hole">
              <dt>Co.education</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(coeducation) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(coeducation)']; $coeducation = $row['sum(coeducation)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-amethyst">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
            
            </dl>
            <dl class="palette palette-wisteria">
              <dt>Total</dt>
              <dd><?php $sum = $malegct + $femalegct + $coeducation; echo $sum; ?></dd>
            </dl>
		      </div>
		      
			 <div class="pallete-itemfull">
			  <img src="img/arrow.png">Vocational Institutes (Numbers)
			 </div>
			  
			  <div class="pallete-item">
			      <dl class="palette palette-wet-asphalt">
              <dt><p align="center"><img src="img/maleicon.png" width="32" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-midnight-blue">
              <dt>Male-Vocational</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(male_vocational) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(male_vocational)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-sun-flower">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
             
            </dl>
            <dl class="palette palette-orange">
              <dt>Female-Vocational</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(female_vocational) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(female_vocational)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-carrot">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
             
            </dl>
            <dl class="palette palette-pumpkin">
              <dt>Co.education</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(co_education_vocational) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(co_education_vocational)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-alizarin">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
   
            </dl>
            <dl class="palette palette-pomegranate">
              <dt>Total</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(total_vocational)']; }?></dd>
            </dl>
		      </div>
			  
			 <div class="pallete-itemfull">
			  <img src="img/arrow.png">Enrollments (Numbers)
			 </div>
			 
		      <div class="pallete-item">
			      <dl class="palette palette-clouds">
              <dt><p align="center"><img src="img/maleicon.png" width="32" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-silver">
              <dt>Male-Enrollment</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(male_enrollment) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(male_enrollment)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-concrete">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-asbestos">
              <dt>Female-Enrollment</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(female_enrollment) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(female_enrollment)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-turquoise">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-green-sea">
              <dt>Total</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(total_enrollment)']; }?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/capacity-icon.png" width="74" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Capacity</dt>
              <dd>3519

<?php			//	$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(capacity)']; }?></dd>
            </dl>
		      </div>
<div class="pallete-itemfull">
 <img src="img/arrow.png">Type of shifts
</div>
<div class="pallete-itemmineshifticon" align="center">
<img src="img/time.png" width="200" height="200"></p>
</div>
<div class="pallete-itemmineshift">
			      <dl class="palette palette-turquoise">
				<dt><img src="img/arrow2.png">Morning</dt>
                <dd>65.3%<?php //echo $rowshift['morning'] ?></dd>
              </dl>
              <dl class="palette palette-green-sea">
                <dt><img src="img/arrow2.png">Evening</dt>
                <dd>4.1%<?php //echo $rowshift['evening'] ?></dd>
              </dl>
<dl class="palette palette-turquoise">
                <dt><img src="img/arrow2.png">Both</dt>
                <dd>30.6%<?php //echo $rowshift['bothshift'] ?></dd>
              </dl>
		      </div>
<!-- ---------------------------------------------------------------------------------- -->
	      </div> <!-- /swatches items -->
		
		  
		  	      <div class="swatches-desc-col">

<img src="img/edu.png">
	      </div> <!-- /swatches desc -->
      </div> <!-- /swatches row -->

<!-- ........................... -->


<h3 class="demo-panel-title">Teachers</h3>
<div class="line"></div><br>
      <div class="row demo-swatches-row">
	      <div class="swatches-col">
		      	      <div class="pallete-itemmine">
			      <dl class="palette palette-sun-flower">
              <dt><p align="center"><img src="img/tea.png" width="36" height="62"></p></dt>

            </dl>
            <dl class="palette palette-orange">
              <dt>Total Teaching staff</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(total_teaching_staff) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(total_teaching_staff)']; }?></dd>
            </dl>
		      </div>
			  
		      <div class="pallete-item">
			      <dl class="palette palette-turquoise">
                <dt><p align="center"><img src="img/maleicon.png" width="28" height="62"></p></dt>

              </dl>
              <dl class="palette palette-green-sea">
                <dt>Male Staff</dt>
                <dd><?php				$result = mysqli_query($conn,"SELECT sum(male_staff) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(male_staff)']; }?></dd>
              </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/femaleicon.png" width="28" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Female Staff</dt>
              <dd><?php				$result = mysqli_query($conn,"SELECT sum(female_staff) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($row = mysqli_fetch_array($result)) {
				 echo $row['sum(female_staff)']; }?></dd>
            </dl>
		      </div>
	      </div> <!-- /swatches items -->
		  	      <div class="swatches-desc-col">

<img src="img/teacher.png">
	      </div> <!-- /swatches desc -->
      </div> <!-- /swatches row -->
<br>
<!-- ........................... -->



<h3 class="demo-panel-title">Dropout</h3>
<div class="line"></div><br>
      <div class="row demo-swatches-row">
	      <div class="swatches-col">
		      <div class="pallete-item">
			      <dl class="palette palette-peter-river">
              <dt><p align="center"><img src="img/dro.png" height="62"></p></dt>

            </dl>
            <dl class="palette palette-belize-hole">
              <dt>Dropout</dt>
              <dd>124<?php	//			$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
				 //echo $row['sum(dropout)']; }?></dd>
            </dl>
		      </div>
	      </div> <!-- /swatches items -->
		  	      <div class="swatches-desc-col">

<img src="img/dropout.jpg">
	      </div> <!-- /swatches desc -->
      </div> <!-- /swatches row -->

<br>
<!-- .......................... .................................................. -->

<div class="container">
<div style="border:dotted; border-width:thin; background:#95E8B8; width:100%; margin-bottom:15px;">
<br>
<div class="row demo-swatches-rowmine" align="center">
	      <div class="swatches-col">
		      <div class="pallete-itemmine">
			      <dl class="palette palette-turquoise">
                <dt><p align="center"><img src="img/education.png" width="80" height="70"></p></dt>
              
              </dl>
              <dl class="palette palette-green-sea">
                <dt>Student, Teacher Ratio</dt>
                <dd>17.8
<?php		//		$result = mysqli_query($conn,"SELECT sum(student_teacher_ratio) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(student_teacher_ratio)']; }?></dd>
              </dl>
		      </div>
		      <div class="pallete-itemmine">
			              <dl class="palette palette-nephritis">
						  <dt><img src="img/i.png" width="70" height="70"></dt>
              <dt>Passed out current status</dt>
              
            </dl>   
			  
			      <dl class="palette palette-emerald">
              <dt><img src="img/arrow2.png">Govt.Job</dt>
              <dd>N/A%<?php //echo $rowstatus['govt_job'] ?></dd>
			  <dt><img src="img/arrow2.png">Private Job</dt>
              <dd>N/A%<?php //echo $rowstatus['private_job'] ?></dd>
			  <dt><img src="img/arrow2.png">Self Employment</dt>
              <dd>N/A%<?php //echo $rowstatus['self_employment'] ?></dd>
			  <dt><img src="img/arrow2.png">Unemployed</dt>
              <dd>N/A%<?php //echo $rowstatus['unemployed'] ?></dd>
			  <dt><img src="img/arrow2.png">Abroad</dt>
              <dd>N/A%<?php //echo $rowstatus['abrod'] ?></dd>
			  <dt><img src="img/arrow2.png">Higher Studies</dt>
              <dd>N/A%<?php //echo $rowstatus['higher_studies'] ?></dd>
			  <dt><img src="img/arrow2.png">Others</dt>
              <dd>N/A%<?php //echo $rowstatus['others'] ?></dd>
			  <dt><img src="img/arrow2.png">Internship</dt>
              <dd>N/A%<?php //echo $rowstatus['internship'] ?></dd>			  
            </dl>
              </div>
		      <div class="pallete-itemmine">
			      <dl class="palette palette-peter-river">
              <dt>Skilled demand</dt>
              
            </dl>
            <dl class="palette palette-belize-hole">
              <dt></dt>
              <dd><?php	//			$result = mysqli_query($conn,"SELECT sum(skilled_demand) FROM mapdata") or die(mysqli_error());
	//	while ($row = mysqli_fetch_array($result)) {
		//		 echo $row['sum(skilled_demand)'] }?></dd>
            </dl>
		      </div>

	</div>
	</div>

</div>
</div>

<!-- ............................................................................. -->

<div class="container">
<div style="border:dotted; border-width:thin; background:#ecf0f1; width:100%; margin-bottom:15px;">
<h3 class="demo-panel-title" align="center">Building Condition</h3>
<div class="line"></div><br>


<div class="row demo-swatches-rowmine" align="center">
	      <div class="swatches-col">

<!--		  
		  			  <div class="pallete-itemfull">
			  <img src="img/arrow.png">Building Condition 
			  </div>
	-->		  

		      <div class="pallete-itemmine">
			      <dl class="palette palette-turquoise">
                <dt>Building Condition</dt>
                <dd></dd>
              </dl>
			   <dl class="palette palette-green-sea">
                <dt><img src="img/arrow2.png">Satisfactory</dt>
                <dd>2.0%<?php //echo $rowcondition['satisfactory'] ?></dd>
				<dt><img src="img/arrow2.png">Partially Satisfactory</dt>
                <dd>85.7%<?php //echo $rowcondition['partially_satisfactory'] ?></dd>
				<dt><img src="img/arrow2.png">Not Satisfactory</dt>
                <dd>12.2%<?php //echo $rowcondition['not_satisfactory'] ?></dd>
				
              </dl>

    <dl class="palette palette-turquoise">
                
                <dd><p align="center"><img src="img/lib.png" width="60" height="65"></p></dd>
                <dt>Library Facility</dt>
                <dd>10.5%<?php	//			$result = mysqli_query($conn,"SELECT sum(library_facility) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(library_facility)'] }?></dd>
              </dl>
			   <dl class="palette palette-green-sea">
<dd><p align="center"><img src="img/aid.png" width="60" height="60"></p></dd>
                <dt>First Aid Kit</dt>
                <dd>100.0%<?php			//	$result = mysqli_query($conn,"SELECT sum(first_aid_kit) FROM mapdata") or die(mysqli_error());
	//	while ($row = mysqli_fetch_array($result)) {
		//		 echo $row['sum(first_aid_kit)'] }?></dd>
              </dl>
			  
              </div>
		      <div class="pallete-itemmine">
			  
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/drinking.png" width="50" height="70"></p></dt>
			  <dt>Drinking water</dt>
			  <dd>80.3%<?php	//			$result = mysqli_query($conn,"SELECT sum(drinking_water) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(drinking_water)'] }?></dd>
              
            </dl>
			
            <dl class="palette palette-nephritis">
			<dt><p align="center"><img src="img/power.png" width="50" height="70"></p></dt>
              <dt>Electricity</dt>
			  <dd>86.8%<?php		//		$result = mysqli_query($conn,"SELECT sum(electricty) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(electricty)'] }?></dd>
              
            </dl>
				<dl class="palette palette-emerald">
				<dt><p align="center"><img src="img/pwricon.png" width="100" height="50"></p></dt>
              <dt>Back up source of electricity</dt>
			  <dd>15.7%<?php	//			$result = mysqli_query($conn,"SELECT sum(backup_source_of_electricty) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(backup_source_of_electricty)'] }?></dd>
              
            </dl>
			<dl class="palette palette-nephritis">
			<dt><p align="center"><img src="img/Sports-Running.png" width="70" height="70"></p></dt>
              <dt>Sports facility</dt>
			  <dd>57.8%<?php	//			$result = mysqli_query($conn,"SELECT sum(sport_facility) FROM mapdata") or die(mysqli_error());
	//	while ($row = mysqli_fetch_array($result)) {
		//		 echo $row['sum(sport_facility)'] }?></dd>
              
            </dl>
				
		      </div>
		      <div class="pallete-itemmine">
			  
			      <dl class="palette palette-peter-river">
			  <dt><p align="center"><img src="img/toilet.png" width="70" height="70"></p></dt>
              <dt>Toilet</dt>
              <dd>100.0%<?php	//			$result = mysqli_query($conn,"SELECT sum(toilet) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
				 //echo $row['sum(toilet)'] }?></dd>
            </dl>
            <dl class="palette palette-belize-hole">
			<dt><p align="center"><img src="img/hostel.png" width="60" height="70"></p></dt>
              <dt>Hostel facility</dt>
              <dd>7.8%<?php		//		$result = mysqli_query($conn,"SELECT sum(hostel_facility) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(hostel_facility)'] }?></dd>
            </dl>
						      <dl class="palette palette-peter-river">
							  <dt><p align="center"><img src="img/TRANSPORT.png" width="100" height="50"></p></dt>
              <dt>Transport facility</dt>
              <dd>100.0%<?php	//			$result = mysqli_query($conn,"SELECT sum(transport_facility) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
				 //echo $row['sum(transprot_facility)'] }?></dd>
            </dl>
			 <dl class="palette palette-belize-hole">
			 <dt><p align="center"><img src="img/wifi.png" width="70" height="70"></p></dt>
              <dt>Internet facility</dt>
              <dd>32.6%<?php			//	$result = mysqli_query($conn,"SELECT sum(internet_facility) FROM mapdata") or die(mysqli_error());
		//while ($row = mysqli_fetch_array($result)) {
			//	 echo $row['sum(internet_facility)'] }?></dd>
            </dl>
			
		      </div>

	</div>
	</div>





</div>
</div>

</div>
<div style="width: 300px; height:auto; position:relative; bottom:0; left: 220; z-index: 100;">
<button onclick="window.print();"><img src="img/icon_print.png" height="30" /> Print</button>
</div>
<hr />
<!-- ............................................................................. -->    
<div class="container">

</div>
<!-- ............................................................................. --> 
    
    </div> <!-- /container -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-xs-7">
            <h3 class="footer-title">Natinoal Skills Information System</h3>


              <img width="227" height="70" src="docs/assets/img/footer/logo.png"/>
          
          </div> <!-- /col-xs-7 -->

        </div>
      </div>
    </footer>

    <script src="dist/js/vendor/jquery.min.js"></script>
    <script src="dist/js/vendor/video.js"></script>
    <script src="dist/js/flat-ui.min.js"></script>
    <script src="docs/assets/js/application.js"></script>

    <script>
      videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
    </script>