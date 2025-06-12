     <?php


     include "dbconn.php";

if (isset($_GET["pg"])) {
      // Put the two words together with a space in the middle to form "hello world"
      $get_district = $_GET["pg"];
      // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
	 // echo $get_district;
   }
     if (isset($_GET["id"])) {
         // Put the two words together with a space in the middle to form "hello world"
         $get_province_id = $_GET["id"];
         // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
         // echo $get_district;
     }
     function rec_count($table,$where){
         global $db;
         $query = "select COUNT(*) as total from {$table} WHERE  {$where}";
         $data=$db->query($query);
        $get=mysqli_fetch_array($data);
        return $get['total'];
     }
     function percent($total,$value){
         $return=$value/$total;
         $return=$return*100;
         return round($return,2) ;
     }
     function get_table_data($table,$where){
         global $db;
         $query = "select * from {$table} WHERE  {$where}";
         $data=$db->query($query);
         $get=mysqli_fetch_array($data);
         return $get;
     }
     $provinces_table= get_table_by_type('districts','id',$get_province_id);
     //Districts
     $provinces=mysqli_fetch_array($provinces_table);
    $province=get_table_data('provinces',"id=".$provinces['province_id']);
     $Vocational1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','1');//Vocational
     $Technical1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','2');//Technical
     $Vocational_m1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','1','gender','1');//Vocational
     $Technical_m1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','2','gender','1');//Technical
     $Vocational_f1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','1','gender','2');//Vocational
     $Technical_f1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','2','gender','2');//Technical
     $Vocational_co1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','1','gender','3');//Vocational
     $Technical_co1= get_table_by_type('institutes','province_id',$provinces['id'],'1','institute_type','2','gender','3');//Technical
//     $condition_s1= get_table_by_type('institutes','province_id',$provinces['id'],'1','condition','1');//Satisfactory
//     $condition_p1= get_table_by_type('institutes','province_id',$provinces['id'],'1','condition','2');//Partially Satisfactory
//     $condition_n1= get_table_by_type('institutes','province_id',$provinces['id'],'1','condition','3');//Not Satisfactory
     $Vocational=$Vocational1['total'];//Vocational
     $Technical= $Technical1['total'];//Technical
     $Vocational_m=$Vocational_m1['total']; //Vocational
     $Technical_m=$Technical_m1['total']; //Technical
     $Vocational_f=$Vocational_f1['total']; //Vocational
     $Technical_f= $Technical_f1['total']; //Technical
     $Vocational_co=$Vocational_co1['total']; //Vocational
     $Technical_co=$Technical_co1['total']; //Technical

//     $i_where='province_id='.$provinces['id']." AND institute_type=";
//echo rec_count('institutes',$i_where.'1');exit;
//     $condition_s=$condition_s1['total']; //Satisfactory
//     $condition_p=$condition_p1['total']; //Partially Satisfactory
//     $condition_n=$condition_n1['total']; //Not Satisfactory
$condition_where="`province_id` = ".$provinces['id']." AND `condition` = ";
        $condition_s=rec_count('institutes',$condition_where.'1');//count['total']; //Satisfactory
        $condition_p=rec_count('institutes',$condition_where.'2'); //Partially Satisfactory
     $condition_n=rec_count('institutes',$condition_where.'3'); //Not Satisfactory
     //exit;
     $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,
SUM(b.enrollment_m) as enrollment_m,
SUM(b.enrollment_f) as enrollment_f,
SUM(b.enrollment_morning) as morning,
SUM(b.enrollment_evening) as evening,
(SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,
(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(b.capacity) as capacity,
(SUM(i.sanc_teachers_m)+SUM(i.filled_teacher_m)+SUM(i.sanc_non_teachers_m)+SUM(i.filled_non_teachers_m)) as male_staff,
(SUM(i.sanc_teachers_f)+SUM(i.filled_teacher_f)+SUM(i.sanc_non_teachers_f)+SUM(i.filled_non_teachers_f)) as female_staff
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.province_id=".$provinces['id']);
     $row=mysqli_fetch_array($get)
//$query = "select * from mapdata where district='$get_district'";
///*$dist=['district'];
//$query2 = "select * from mapcondition where district='Khyberagency'";
//$query3 = "select * from shift where district='Khyberagency'";
//$query4 = "select * from status where district='Khyberagency'";*/
//$get=mysqli_query($conn,$query);
///*$get1=mysqli_query($conn,$query2);
//$get2=mysqli_query($conn,$query3);
//$get3=mysqli_query($conn,$query4);*/
//while($row=mysqli_fetch_array($get)){
//$queryshift="select * from shift where district='$get_district'";
//$getshift=mysqli_query($conn,$queryshift);
//while($rowshift=mysqli_fetch_array($getshift)){
//
//$querycondition="select * from mapcondition where district='$get_district'";
//$getcondition=mysqli_query($conn,$querycondition);
//while($rowcondition=mysqli_fetch_array($getcondition)){
//
//$querystatus="select * from status where district='$get_district'";
//$getstatus=mysqli_query($conn,$querystatus);
//while($rowstatus=mysqli_fetch_array($getstatus)){
   ?><head>

    <meta charset="utf-8">
    <title><?=$get_district?> Details Page</title>
 

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
		  <?php echo $get_district//$row['district'] ?>
          <small><?php echo "All Districts"//$province['name'] ?></small>
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
                <dd><?php echo $Technical_m//$row['malegct'] ?></dd>
              </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Female-GCT</dt>
              <dd><?php echo $Technical_f//$row['femalegct'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-peter-river">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-belize-hole">
              <dt>Co.education</dt>
              <dd><?php echo $Technical_co//$row['coeducation'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-amethyst">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
            
            </dl>
            <dl class="palette palette-wisteria">
              <dt>Total</dt>
              <dd><?php echo $Technical//$row['gcttotal'] ?></dd>
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
              <dd><?php echo $Vocational_m//$row['male_vocational'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-sun-flower">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
             
            </dl>
            <dl class="palette palette-orange">
              <dt>Female-Vocational</dt>
              <dd><?php echo $Vocational_f//$row['female_vocational'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-carrot">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
             
            </dl>
            <dl class="palette palette-pumpkin">
              <dt>Co.education</dt>
              <dd><?php echo $Vocational_co//$row['co_education_vocational'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-alizarin">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
   
            </dl>
            <dl class="palette palette-pomegranate">
              <dt>Total</dt>
              <dd><?php echo $Vocational//$row['total_vocational'] ?></dd>
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
              <dd><?php echo $row['enrollment_m'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-concrete">
              <dt><p align="center"><img src="img/femaleicon.png" width="32" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-asbestos">
              <dt>Female-Enrollment</dt>
              <dd><?php echo $row['enrollment_f'] ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-turquoise">
              <dt><p align="center"><img src="img/malefemale.png" width="64" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-green-sea">
              <dt>Total</dt>
              <dd><?php echo $row['totalenroll']; ?></dd>
            </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/capacity-icon.png" width="74" height="62"></p></dt>
        
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Capacity</dt>
              <dd><?php echo $row['capacity'] ?></dd>
            </dl>
		      </div>
<div class="pallete-itemfull">
 <img src="img/arrow.png">Type of shifts
</div>
<div class="pallete-itemmineshifticon" align="center">
<img src="img/time.png" width="200" height="200"></p>
</div>
              <?php
              $total='';
              $morning=0;
              $evening=0;
              $both=0;
              $shift_where="province_id = ".$provinces['id']." AND shift = ";
              $morningd=rec_count('institutes',$shift_where.'1');
            //  $total=$row['morning']+$row['evening'];
              $bothd=rec_count('institutes',$shift_where.'3');
              $eveningd=rec_count('institutes',$shift_where.'2');
              $total=$morningd+$bothd+$eveningd;
                if($morningd ){
//                    $morning=$total/$row['morning'];
//                    $morning=$morning*100;
                    $morning=percent($total,$morningd);
                }if($eveningd){
//                  $evening=$total/$row['evening'];
//                  $evening=$evening*100;
                  $evening=percent($total,$eveningd);
              }if($bothd){
                  $both=percent($total,$bothd);
              }


               ?>
<div class="pallete-itemmineshift">
			      <dl class="palette palette-turquoise">
				<dt><img src="img/arrow2.png">Morning</dt>
                <dd><?php echo $morning."%"//$row['morning'] ?></dd>
              </dl>
              <dl class="palette palette-green-sea">
                <dt><img src="img/arrow2.png">Evening</dt>
                <dd><?php echo $evening."%"//$row['evening'] ?></dd>
              </dl>
<dl class="palette palette-turquoise">
                <dt><img src="img/arrow2.png">Both</dt>
                <dd><?php echo $both."%"//$row['bothshift'] ?></dd>
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
              <dd><?php echo $row['male_staff']+$row['female_staff'];//$row['total_teaching_staff'] ?></dd>
            </dl>
		      </div>
			  
		      <div class="pallete-item">
			      <dl class="palette palette-turquoise">
                <dt><p align="center"><img src="img/maleicon.png" width="28" height="62"></p></dt>

              </dl>
              <dl class="palette palette-green-sea">
                <dt>Male Staff</dt>
                <dd><?php echo $row['male_staff'] ?></dd>
              </dl>
		      </div>
		      <div class="pallete-item">
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/femaleicon.png" width="28" height="62"></p></dt>
              
            </dl>
            <dl class="palette palette-nephritis">
              <dt>Female Staff</dt>
              <dd><?php echo $row['female_staff'] ?></dd>
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
              <dd><?php echo $row['totaldropout'] ?></dd>
            </dl>
		      </div>
	      </div> <!-- /swatches items -->
		  	      <div class="swatches-desc-col">

<img src="img/dropout.jpg">
	      </div> <!-- /swatches desc -->
      </div> <!-- /swatches row -->

<br>
<!-- .......................... .................................................. -->

<!--<div class="container">-->
<!--<div style="border:dotted; border-width:thin; background:#95E8B8; width:100%; margin-bottom:15px;">-->
<!--<br>-->
<!--<div class="row demo-swatches-rowmine" align="center">-->
<!--	      <div class="swatches-col">-->
<!--		      <div class="pallete-itemmine">-->
<!--			      <dl class="palette palette-turquoise">-->
<!--                <dt><p align="center"><img src="img/education.png" width="80" height="70"></p></dt>-->
<!--              -->
<!--              </dl>-->
<!--              <dl class="palette palette-green-sea">-->
<!--                <dt>Student, Teacher Ratio</dt>-->
<!--                <dd>--><?php //echo $row['student_teacher_ratio'] ?><!--</dd>-->
<!--              </dl>-->
<!--		      </div>-->
<!--		      <div class="pallete-itemmine">-->
<!--			              <dl class="palette palette-nephritis">-->
<!--						  <dt><img src="img/i.png" width="70" height="70"></dt>-->
<!--              <dt>Passed out current status</dt>-->
<!--              -->
<!--            </dl>   -->
<!--			  -->
<!--			      <dl class="palette palette-emerald">-->
<!--              <dt><img src="img/arrow2.png">Govt.Job</dt>-->
<!--              <dd>--><?php //echo $rowstatus['govt_job'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Private Job</dt>-->
<!--              <dd>--><?php //echo $rowstatus['private_job'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Self Employment</dt>-->
<!--              <dd>--><?php //echo $rowstatus['self_employment'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Unemployed</dt>-->
<!--              <dd>--><?php //echo $rowstatus['unemployed'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Abroad</dt>-->
<!--              <dd>--><?php //echo $rowstatus['abrod'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Higher Studies</dt>-->
<!--              <dd>--><?php //echo $rowstatus['higher_studies'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Others</dt>-->
<!--              <dd>--><?php //echo $rowstatus['others'] ?><!--</dd>-->
<!--			  <dt><img src="img/arrow2.png">Internship</dt>-->
<!--              <dd>--><?php //echo $rowstatus['internship'] ?><!--</dd>			  -->
<!--            </dl>-->
<!--              </div>-->
<!--		      <div class="pallete-itemmine">-->
<!--			      <dl class="palette palette-peter-river">-->
<!--              <dt>Skilled demand</dt>-->
<!--              -->
<!--            </dl>-->
<!--            <dl class="palette palette-belize-hole">-->
<!--              <dt></dt>-->
<!--              <dd>--><?php //echo $row['skilled_demand'] ?><!--</dd>-->
<!--            </dl>-->
<!--		      </div>-->
<!---->
<!--	</div>-->
<!--	</div>-->
<!---->
<!--</div>-->
<!--</div>-->

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
              <?php
              $condition=intval($condition_n)+intval($condition_p)+intval($condition_s);
//if()
              $cond_n=0;
              $cond_p=0;
              $cond_s=0;
              if($condition_s!=0  ){
              $cond_s=$condition_s/$condition;
                  $cond_s=$cond_s*100;
              }
              if($condition_p!=0  ){
//              $cond_p=$condition_p/$condition;
//                  $cond_p=$cond_p*100;

                  $cond_p=percent((int)$condition,(int)$condition_p);
               // exit;
              }
              if($condition_n!=0  ){
              $cond_n=$condition_n/$condition;
                  $cond_n=$cond_n*100;
              }
              ?>

		      <div class="pallete-itemmine">
			      <dl class="palette palette-turquoise">
                <dt>Building Condition</dt>
                <dd></dd>
              </dl>
			   <dl class="palette palette-green-sea">
                <dt><img src="img/arrow2.png">Satisfactory</dt>
                <dd><?php echo round($cond_s,2)."%"//.$condition_s//$rowcondition['satisfactory'] ?></dd>
				<dt><img src="img/arrow2.png">Partially Satisfactory</dt>
                <dd><?php echo $cond_p."% "//.$condition_p//$rowcondition['partially_satisfactory'] ?></dd>
				<dt><img src="img/arrow2.png">Not Satisfactory</dt>
                <dd><?php echo round($cond_n,2)."%"//.$condition_n//$rowcondition['not_satisfactory'] ?></dd>
				
              </dl>

    <dl class="palette palette-turquoise">
                
                <dd><p align="center"><img src="img/lib.png" width="60" height="65"></p></dd>
                <dt>Library Facility</dt>
                <dd><?php  $v1=get_table_by_type('institutes','province_id',$provinces['id'],'1','library','1');echo percent($row['Totalinstitutes'],$v1['total'])."%" ;//$row['library_facility'] ?></dd>
              </dl>
			   <dl class="palette palette-green-sea">
<dd><p align="center"><img src="img/aid.png" width="60" height="60"></p></dd>
                <dt>First Aid Kit</dt>
                <dd><?php $v2= get_table_by_type('institutes','province_id',$provinces['id'],'1','first_aid','1');echo percent($row['Totalinstitutes'],$v2['total'])."%" ;//$row['first_aid_kit'] ?></dd>
              </dl>
			  
              </div>
		      <div class="pallete-itemmine">
			  
			      <dl class="palette palette-emerald">
              <dt><p align="center"><img src="img/drinking.png" width="50" height="70"></p></dt>
			  <dt>Drinking water</dt>
			  <dd><?php $v3= get_table_by_type('institutes','province_id',$provinces['id'],'1','drinking_water','1');echo percent($row['Totalinstitutes'],$v3['total'])."%" ;//$row['drinking_water'] ?></dd>
              
            </dl>
			
            <dl class="palette palette-nephritis">
			<dt><p align="center"><img src="img/power.png" width="50" height="70"></p></dt>
              <dt>Electricity</dt>
			  <dd><?php $v4= get_table_by_type('institutes','province_id',$provinces['id'],'1','electricity','1');echo percent($row['Totalinstitutes'],$v4['total'])."%" ;//$row['electricity'] ?></dd>
              
            </dl>
				<dl class="palette palette-emerald">
				<dt><p align="center"><img src="img/pwricon.png" width="100" height="50"></p></dt>
              <dt>Back up source of electricity</dt>
			  <dd><?php $v5= get_table_by_type('institutes','province_id',$provinces['id'],'1','backupsource','1');echo percent($row['Totalinstitutes'],$v5['total'])."%" ;//$row['backup_source_of_electricity'] ?></dd>
              
            </dl>
			<dl class="palette palette-nephritis">
			<dt><p align="center"><img src="img/Sports-Running.png" width="70" height="70"></p></dt>
              <dt>Sports facility</dt>
			  <dd><?php $v6= get_table_by_type('institutes','province_id',$provinces['id'],'1','sports','1');echo percent($row['Totalinstitutes'],$v6['total'])."%" ;//$row['sport_facility'] ?></dd>
              
            </dl>
				
		      </div>
		      <div class="pallete-itemmine">
			  
			      <dl class="palette palette-peter-river">
			  <dt><p align="center"><img src="img/toilet.png" width="70" height="70"></p></dt>
              <dt>Toilet</dt>
              <dd><?php $v7= get_table_by_type('institutes','province_id',$provinces['id'],'1','toilets','1');echo percent($row['Totalinstitutes'],$v7['total'])."%" ;//$row['toilet'] ?></dd>
            </dl>
            <dl class="palette palette-belize-hole">
			<dt><p align="center"><img src="img/hostel.png" width="60" height="70"></p></dt>
              <dt>Hostel facility</dt>
              <dd><?php $v8= get_table_by_type('institutes','province_id',$provinces['id'],'1','hostel','1');echo percent($row['Totalinstitutes'],$v8['total'])."%" ;//$row['hostel_facility'] ?></dd>
            </dl>
						      <dl class="palette palette-peter-river">
							  <dt><p align="center"><img src="img/TRANSPORT.png" width="100" height="50"></p></dt>
              <dt>Transport facility</dt>
              <dd><?php $v9= get_table_by_type('institutes','province_id',$provinces['id'],'1','transport','1');echo percent($row['Totalinstitutes'],$v9['total'])."%" ;//$row['transport_facility'] ?></dd>
            </dl>
			 <dl class="palette palette-belize-hole">
			 <dt><p align="center"><img src="img/wifi.png" width="70" height="70"></p></dt>
              <dt>Internet facility</dt>
              <dd><?php $v10= get_table_by_type('institutes','province_id',$provinces['id'],'1','internet','1');echo percent($row['Totalinstitutes'],$v10['total'])."%" ;//$row['internet_facility'] ?></dd>
            </dl>
			
		      </div>

	</div>
	</div>





</div>
</div>
<?php //}?>
<?php //}?>
<?php //}?>
<?php //}?>
</div>
<div style="width: 300px; height:auto; position:relative; bottom:0; left: 220px; z-index: 100;">
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