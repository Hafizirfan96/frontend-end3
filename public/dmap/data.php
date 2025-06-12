<!DOCTYPE html>
    <head>
    <title>Get Data</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="right">
   <table class="table table-striped table-bordered span5" width="90%">
 <thead>
 <th>Edit</th>
 <th>Province</th>
 <th>District</th>
 <th>Male GCT</th>
 <th>Female GCT</th>
 <th>Co-Education</th>
 <th>Total GCT</th>
  <th>Male Vocational</th>
   <th>Female Vocational</th>
    <th>Co Education Vocatinoal</th>
	 <th>Total Voacational</th>
 <th>Capacity</th>
  <th>Male Enrollment</th>
   <th>Female Enrollment</th>
    <th>Total Enrollment</th>
  <th>Dropout</th>
   <th>Male Staff</th>
    <th>Female Staff</th>
 <th>Total Teaching Staff</th>
  <th>Skilled Demand</th>
 <th>Drinking Water</th>
  <th>Electricity</th>
   <th>Backup Electricty</th>
    <th>Toilet</th>
 <th>Hostel Facility</th>
  <th>Transport Facility</th>
   <th>Internet Facility</th>
    <th>Sport Facility</th>
 <th>Library Facility</th>
  <th>First Aid Kit</th>
   <th>Student Teacher Ratio</th>	 
 </thead>
   <?php 
//   $conn=mysqli_connect('localhost','skilling_arsalan','k?8LB?KCXkA^');
//mysqli_select_db("root",$conn);
   include "dbconn.php";

$query1 = "select * from mapdata";
$get=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($get)){
   ?>
 <tr>
 <td><button onClick="javascript:window.location.href='http://skillingpakistan.org/dmap/updatedata.php?pg=<?php echo $row['district'] ?>';">Edit</button></td>
 
 <td><?php echo $row['province'] ?></td>
 <td><?php echo $row['district'] ?></td>
 <td><?php echo $row['malegct'] ?></td>
 <td><?php echo $row['femalegct'] ?></td>
 <td><?php echo $row['coeducation'] ?></td>
 <td><?php echo $row['gcttotal'] ?></td>
  <td><?php echo $row['male_vocational'] ?></td>
   <td><?php echo $row['female_vocational'] ?></td>
    <td><?php echo $row['co_education_vocational'] ?></td>
	 <td><?php echo $row['total_vocational'] ?></td>
 <td><?php echo $row['capacity'] ?></td>
  <td><?php echo $row['male_enrollment'] ?></td>
   <td><?php echo $row['female_enrollment'] ?></td>
    <td><?php echo $row['total_enrollment'] ?></td>
  <td><?php echo $row['dropout'] ?></td>
   <td><?php echo $row['male_staff'] ?></td>
    <td><?php echo $row['female_staff'] ?></td>
 <td><?php echo $row['total_teaching_staff'] ?></td>
  <td><?php echo $row['skilled_demand'] ?></td>
 <td><?php echo $row['drinking_water'] ?></td>
  <td><?php echo $row['electricity'] ?></td>
   <td><?php echo $row['backup_source_of_electricity'] ?></td>
    <td><?php echo $row['toilet'] ?></td>
 <td><?php echo $row['hostel_facility'] ?></td>
  <td><?php echo $row['transport_facility'] ?></td>
   <td><?php echo $row['internet_facility'] ?></td>
    <td><?php echo $row['sport_facility'] ?></td>
 <td><?php echo $row['library_facility'] ?></td>
  <td><?php echo $row['first_aid_kit'] ?></td>
   <td><?php echo $row['student_teacher_ratio'] ?></td>	 

 </tr>
   <?php }?>
   <tr>
   <td colspan="7"><a href="dataentry.php" class="btn btn-primary">Add Entry</a></td>
   </tr>
</table>


</div>
    </body>
    </html>