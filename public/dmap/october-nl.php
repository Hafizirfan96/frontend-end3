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
    $return=(int)$value/(int)$total;
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
function get_count_all($table){
    global $db;
    $query = "select COUNT(*) as total from {$table}   ORDER BY name ASC";
    $d=$db->query($query);
    $get=mysqli_fetch_array($d);
    return $get['total'];
}
//$provinces_table= get_table_by_type('districts','id',$get_province_id);
//Districts
//$provinces=mysqli_fetch_array($provinces_table);
//$province=get_table_data('provinces',"id=".$provinces['province_id']);
$Vocational1= get_table_by_type('institutes','institute_type','1','1');//Vocational
$Technical1= get_table_by_type('institutes','institute_type','2','1');//Technical
$Vocational_m1= get_table_by_type('institutes','institute_type','1','1','gender','1');//Vocational
$Technical_m1= get_table_by_type('institutes','institute_type','2','1','gender','1');//Technical
$Vocational_f1= get_table_by_type('institutes','institute_type','1','1','gender','2');//Vocational
$Technical_f1= get_table_by_type('institutes','institute_type','2','1','gender','2');//Technical
$Vocational_co1= get_table_by_type('institutes','institute_type','1','1','gender','3');//Vocational
$Technical_co1= get_table_by_type('institutes','institute_type','2','1','gender','3');//Technical



$querypak = "SELECT COUNT(*) AS total_employers FROM industries_nsis";
$resultpak = $db->query($querypak);

// Check if the query was successful
if ($resultpak) {
    $row = $resultpak->fetch_assoc();
    $totalEmployers = $row['total_employers']; // Total number of employers
} else {
    $totalEmployers = 0; // Default to 0 if query fails
}
//     $condition_s1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','1');//Satisfactory
//     $condition_p1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','2');//Partially Satisfactory
//     $condition_n1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','3');//Not Satisfactory


$query = "
    SELECT sector, COUNT(*) AS sector_count
    FROM industries_nsis
    GROUP BY sector
";

$result = $db->query($query);

if ($result) {
    $sectors = [];

    while ($row = $result->fetch_assoc()) {
        $sector_name = $row['sector'];
        $sector_count = $row['sector_count'];

        $sectors[] = [
            'sector_name' => $sector_name,
            'sector_count' => $sector_count
        ];
    }









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
$condition_where=" `condition` = ";
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
FROM institutes i,batches b WHERE  b.institute_id=i.user_id ");
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
    <title>Skilling Pakistan - October Newsletter</title>


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
	<style>
		.pallete-itemmineshift {width: 98% !important;}
	</style>
</head>


<div class="container">
    <div class="demo-headline">
        <h1 class="demo-logo">
            <div class="logo"></div>
           <!-- <div style="border:dotted; border-width:thin; background:#ecf0f1; border-radius: 25px;">
                <?php //echo "Pakistan"//$row['district'] ?>
                <small><?php //echo "All Districts"//$province['name'] ?></small>
            </div>-->
        </h1>

    </div> <!-- /demo-headline -->




<!--<h3 class="demo-panel-title">Industry (<?php// echo  $totalEmployers; ?>)</h3> -->
	 
    
    
<?php
/**echo "<style>";
echo "table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #0093AF;
    margin-bottom: 20px;
    font-family: Arial, sans-serif;
}";

echo "th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #0093AF;
}";

echo "th {
    background-color: #0093AF;
    color: white;
}";

echo "tr:hover {
    background-color: #f2f2f2;
}";

echo "</style>";

echo "<table>";
echo "<tr>";
echo "<th>Sector</th>";
echo "<th>#</th>";
echo "</tr>";


foreach ($sectors as $sector) {
    $sector_name = $sector['sector_name'];
    $employer_count = $sector['sector_count'];
    $encoded_sector_name = urlencode($sector_name); // Encode the sector name for URL

    echo "<tr>";
    echo "<td><a href='pakistan_industry.php?sector=$encoded_sector_name' target='_blank' style='color: #0093AF; text-decoration: none;'>$sector_name</a></td>";
    echo "<td>$employer_count</td>";
    echo "</tr>";
}


echo "</table>";

**/

} else {
    echo "Error executing query: " . $db->error;
}





$technicalMaleTotal = $Technical_m; // Technical Male
$technicalFemaleTotal = $Technical_f; // Technical Female
$technicalCoTotal = $Technical_co; // Technical Co-education

$vocationalMaleTotal = $Vocational_m; // Vocational Male
$vocationalFemaleTotal = $Vocational_f; // Vocational Female
$vocationalCoTotal = $Vocational_co; // Vocational Co-education

// Calculate the combined totals
$totalMale = $technicalMaleTotal + $vocationalMaleTotal;
$totalFemale = $technicalFemaleTotal + $vocationalFemaleTotal;
$totalCo = $technicalCoTotal + $vocationalCoTotal;

    ?>
	  
	 






    <!-- .......................... -->

	

    <h3 class="demo-panel-title">Institute</h3>
	   <div class="line"></div><br>
		<div style="width: 100%; margin: 0 auto; height : 500px;">
    <canvas id="comparisonChart"></canvas>
</div>
 
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

	<!--
	<div style="width: 100%; margin: 0 auto; height : 500px;">
    <canvas id="comparisonPieChart"></canvas>
</div>-->
				</div>
            <div class="pallete-itemfull">
                <img src="img/arrow.png">Enrollments (Numbers)
            </div>
<div class="pallete-itemfull">
				<div style="width: 100%; margin: 0 auto; height : 500px;">
    <canvas id="enrollmentChart"></canvas>
</div>
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
			 <div class="pallete-itemfull">
<div>
    <canvas id="shiftPieChart" style="width: 100%; margin: 0 auto; height : 500px;"></canvas>
</div>
	</div>
           <!-- <div class="pallete-itemmineshifticon" align="center">
                <img src="img/time.png" width="200" height="200"></p>
            </div>-->
            <?php
            $total='';
            $morning=0;
            $evening=0;
            $both=0;
            $shift_where=" shift = ";
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
		<div>
    <canvas id="staffPieChart" style="width: 100%; margin: 0 auto; height : 500px;"></canvas>
</div>
    
    <div class="row demo-swatches-row " style="margin-top : 20px;">
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
                    $total_in= get_count_all('institutes');
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
                            <dd><?php  $v1=get_table_by_type('institutes','library','1','1');echo percent($total_in,$v1['total'])."%" ;//$row['library_facility'] ?></dd>
                        </dl>
                        <dl class="palette palette-green-sea">
                            <dd><p align="center"><img src="img/aid.png" width="60" height="60"></p></dd>
                            <dt>First Aid Kit</dt>
                            <dd><?php $v2= get_table_by_type('institutes','first_aid','1','1');echo percent($total_in,$v2['total'])."%" ;//$row['first_aid_kit'] ?></dd>
                        </dl>

                    </div>
                    <div class="pallete-itemmine">

                        <dl class="palette palette-emerald">
                            <dt><p align="center"><img src="img/drinking.png" width="50" height="70"></p></dt>
                            <dt>Drinking water</dt>
                            <dd><?php $v3= get_table_by_type('institutes','drinking_water','1','1');echo percent($total_in,$v3['total'])."% ";//.$total_in." < ".$v3['total']." < ".$total_in ;//$row['drinking_water'] ?></dd>

                        </dl>

                        <dl class="palette palette-nephritis">
                            <dt><p align="center"><img src="img/power.png" width="50" height="70"></p></dt>
                            <dt>Electricity</dt>
                            <dd><?php $v4= get_table_by_type('institutes','electricity','1','1');echo percent($total_in,$v4['total'])."%" ;//$row['electricity'] ?></dd>

                        </dl>
                        <dl class="palette palette-emerald">
                            <dt><p align="center"><img src="img/pwricon.png" width="100" height="50"></p></dt>
                            <dt>Back up source of electricity</dt>
                            <dd><?php $v5= get_table_by_type('institutes','backupsource','1','1');echo percent($total_in,$v5['total'])."%" ;//$row['backup_source_of_electricity'] ?></dd>

                        </dl>
                        <dl class="palette palette-nephritis">
                            <dt><p align="center"><img src="img/Sports-Running.png" width="70" height="70"></p></dt>
                            <dt>Sports facility</dt>
                            <dd><?php $v6= get_table_by_type('institutes','sports','1','1');echo percent($total_in,$v6['total'])."%" ;//$row['sport_facility'] ?></dd>

                        </dl>

                    </div>
                    <div class="pallete-itemmine">

                        <dl class="palette palette-peter-river">
                            <dt><p align="center"><img src="img/toilet.png" width="70" height="70"></p></dt>
                            <dt>Toilet</dt>
                            <dd><?php $v7= get_table_by_type('institutes','toilets','1','1');echo percent($total_in,$v7['total'])."%" ;//$row['toilet'] ?></dd>
                        </dl>
                        <dl class="palette palette-belize-hole">
                            <dt><p align="center"><img src="img/hostel.png" width="60" height="70"></p></dt>
                            <dt>Hostel facility</dt>
                            <dd><?php $v8= get_table_by_type('institutes','hostel','1','1');echo percent($total_in,$v8['total'])."%" ;//$row['hostel_facility'] ?></dd>
                        </dl>
                        <dl class="palette palette-peter-river">
                            <dt><p align="center"><img src="img/TRANSPORT.png" width="100" height="50"></p></dt>
                            <dt>Transport facility</dt>
                            <dd><?php $v9= get_table_by_type('institutes','transport','1','1');echo percent($total_in,$v9['total'])."%" ;//$row['transport_facility'] ?></dd>
                        </dl>
                        <dl class="palette palette-belize-hole">
                            <dt><p align="center"><img src="img/wifi.png" width="70" height="70"></p></dt>
                            <dt>Internet facility</dt>
                            <dd><?php $v10= get_table_by_type('institutes','internet','1','1');echo percent($total_in,$v10['total'])."%" ;//$row['internet_facility'] ?></dd>
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
             


                <img width="227" height="70" src="docs/assets/img/footer/logo.png"/>

            </div> <!-- /col-xs-7 -->

        </div>
    </div>
</footer>

<script src="dist/js/vendor/jquery.min.js"></script>
<script src="dist/js/vendor/video.js"></script>
<script src="dist/js/flat-ui.min.js"></script>
<script src="docs/assets/js/application.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
</script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    const ctx = document.getElementById('comparisonChart').getContext('2d');

    const comparisonChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female', 'Co-education', 'Total'],
            datasets: [
                {
                    label: 'Technical',
                    data: [
                        <?php echo $Technical_m; ?>,
                        <?php echo $Technical_f; ?>,
                        <?php echo $Technical_co; ?>,
                        <?php echo $Technical; ?>
                    ],
                    backgroundColor: 'rgba(52, 152, 219, 1)', // Dark Blue color
                    borderColor: 'rgba(52, 152, 219, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Vocational',
                    data: [
                        <?php echo $Vocational_m; ?>,
                        <?php echo $Vocational_f; ?>,
                        <?php echo $Vocational_co; ?>,
                        <?php echo $Vocational; ?>
                    ],
                    backgroundColor: 'rgba(241, 196, 15, 1)', // Dark Yellow color
                    borderColor: 'rgba(241, 196, 15, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Institutes'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    enabled: true,
                    mode: 'nearest'
                },
                datalabels: {
                    color: 'black',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        },
        plugins: [ChartDataLabels] // Activate the datalabels plugin
    });
</script>

<script>
    const ctxPie = document.getElementById('comparisonPieChart').getContext('2d');

    const comparisonPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Male', 'Female', 'Co-education'],
            datasets: [{
                data: [
                    <?php echo $totalMale; ?>,
                    <?php echo $totalFemale; ?>,
                    <?php echo $totalCo; ?>
                ],
                backgroundColor: [
                    'rgba(0, 123, 255, 1)',   // Dark Blue for Male
                    'rgba(255, 102, 204, 1)', // Dark Pink for Female
                    'rgba(153, 102, 255, 1)'  // Dark Purple mix for Co-education
                ],
                borderColor: [
                    'rgba(0, 123, 255, 1)',
                    'rgba(255, 102, 204, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    enabled: true
                },
                datalabels: {
                    color: 'white',
                    formatter: (value) => value,
                    font: {
                        weight: 'bold'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        },
        plugins: [ChartDataLabels] // Activate the datalabels plugin
    });
</script>

<script>
    const totalEnrollments = <?php echo $row['totalenroll']; ?>;
    const totalCapacity = <?php echo $row['capacity']; ?>;
    const capacityDifference = totalCapacity - totalEnrollments;

    const ctxx = document.getElementById('enrollmentChart').getContext('2d');

    const enrollmentChart = new Chart(ctxx, {
        type: 'bar', // Primary chart type is bar
        data: {
            labels: ['Male Enrollment', 'Female Enrollment', 'Total Enrollment', 'Capacity'],
            datasets: [
                {
                    label: 'Enrollment Numbers',
                    data: [
                        <?php echo $row['enrollment_m']; ?>,
                        <?php echo $row['enrollment_f']; ?>,
                        totalEnrollments,
                        null // Leave Capacity as null for the bar chart dataset
                    ],
                    backgroundColor: [
                        'rgba(0, 123, 255, 1)',   // Dark Blue for Male
                        'rgba(255, 102, 204, 1)', // Dark Pink for Female
                        'rgba(46, 204, 113, 1)',  // Dark Green for Total Enrollment
                        'rgba(255, 255, 255, 0)'  // Transparent for Capacity
                    ],
                    borderColor: [
                        'rgba(0, 123, 255, 1)',
                        'rgba(255, 102, 204, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(255, 255, 255, 0)' // Transparent border for Capacity
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Total to Capacity Line',
                    data: [
                        null, null, totalEnrollments, totalCapacity
                    ],
                    type: 'line', // Line chart connecting Total Enrollment to Capacity
                    borderColor: 'rgba(255, 159, 64, 1)', // Dark Orange color for the line
                    backgroundColor: 'rgba(255, 159, 64, 0.2)', // Light orange fill
                    fill: false,
                    pointRadius: 5,
                    pointBackgroundColor: 'rgba(255, 159, 64, 1)',
                    tension: 0.1 // Small curve for smoothness
                }
            ]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            if (context.dataset.label === 'Total to Capacity Line') {
                                if (context.dataIndex === 3) {
                                    // Display the Total Capacity and the difference
                                    return [
                                        `Total Capacity: ${totalCapacity}`,
                                        `Difference: ${capacityDifference}`
                                    ];
                                }
                            }
                            return `${context.dataset.label}: ${context.raw}`;
                        }
                    },
                    enabled: true,
                    mode: 'index',
                    intersect: false
                },
                datalabels: {
                    color: 'black',
                    anchor: 'end',
                    align: 'top',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value, context) {
                        // Hide value for the first point of the capacity line (index 0)
                        if (context.dataset.label === 'Total to Capacity Line' && context.dataIndex === 0) {
                            return ''; // Hide label for first point of the line
                        }
                        return value; // Show value for other points
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Enrollment Types'
                    }
                }
            }
        },
        plugins: [ChartDataLabels] // Activate the datalabels plugin
    });
</script>


<script>
    // Include the Chart.js datalabels plugin
    Chart.register(ChartDataLabels);

    const ctxxx = document.getElementById('shiftPieChart').getContext('2d');
    const shiftPieChart = new Chart(ctxxx, {
        type: 'pie',
        data: {
            labels: ['Morning', 'Evening', 'Both'],
            datasets: [{
                data: [
                    <?php echo $morning; ?>,
                    <?php echo $evening; ?>,
                    <?php echo $both; ?>
                ],
                backgroundColor: [
                    'rgba(0, 123, 255, 1)',   // Dark Blue for Morning
                    'rgba(255, 99, 132, 1)',  // Dark Pink for Evening
                    'rgba(153, 102, 255, 1)'  // Dark Purple for Both
                ],
                borderColor: [
                    'rgba(0, 123, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ${value}%`; // Display percentage
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top'
                },
                datalabels: {
                    display: true,  // Enable displaying values
                    color: 'white', // Color of the text on the pie chart
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    formatter: (value) => {
                        return `${value}%`; // Display the percentage on the slice
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>


<script>
    const ctt = document.getElementById('staffPieChart').getContext('2d');
    const staffPieChart = new Chart(ctt, {
        type: 'pie',
        data: {
            labels: ['Male Staff', 'Female Staff', 'Total Staff'],
            datasets: [{
                data: [
                    <?php echo $row['male_staff']; ?>,
                    <?php echo $row['female_staff']; ?>,
                    <?php echo $row['male_staff'] + $row['female_staff']; ?> // Total
                ],
                backgroundColor: [
                    'rgba(0, 123, 255, 1)',   // Blue for Male Staff
                    'rgba(255, 99, 132, 1)',   // Pink for Female Staff
                    'rgba(75, 192, 192, 1)'   // Teal for Total Staff
                ],
                borderColor: [
                    'rgba(0, 123, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ${value}`;
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>