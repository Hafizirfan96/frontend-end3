<?php
/**
 * Created by PhpStorm.
 * User: AB-Nexttech
 * Date: 8/23/2019
 * Time: 3:47 PM
 */
//include 'dbconn.php';overflow:scroll; overflow-x:hidden; border:thin; border-style:dotted; width: 530px; height: 200px; position: absolute; top: 100; right: 0; z-index: 100;
?>
<div id="chartdiv4" style="
    overflow-y: auto;
    overflow-x: hidden;
    border: 2px solid #1f7a4e;
    width: 564px;
    height: 310px;
    position: absolute;
    top: 171px;
    right: 1px;
    z-index: 218;
    background-color: #046c44;
    margin-top: 170px;
    color: white;
    padding: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
    border-radius: 10px;
">
    
   <table width="100%" style="border-collapse: collapse; font-family: Arial, sans-serif; color: white;">
        <thead>
            <tr style="background-color: #018c4a; text-align: left;">
                <th class="text" style="padding: 10px; font-size: 13px;">District</th>
                <th class="text" style="padding: 10px; font-size: 13px;">Total Industry</th>
                <th class="text" style="padding: 10px; font-size: 13px;">Total Vocational</th>
                <th class="text" style="padding: 10px; font-size: 13px;">Total GCT</th>
                <th class="text" style="padding: 10px; font-size: 13px;">Total Enrollment</th>
            
            </tr>
        </thead>

        <?php

        //$query1 = "select * from mapdata ORDER BY district ASC";
        //$get=mysqli_query($conn,$query1);

        $districts_table=get_table('districts');
        while ($districts=mysqli_fetch_array($districts_table)){
            $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
            $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
            $district_id = $districts['id'];
             $district_id = $districts['id'];
 			$district_name = $districts['name'];
            // Corrected query to get the total number of industries for the current district
            $query = "SELECT COUNT(*) AS total_industries FROM industries_nsis 
                      WHERE District = (SELECT name FROM districts WHERE id = $district_id)";
            $industry_result = $db->query($query);
            $industry_row = mysqli_fetch_array($industry_result);
            $total_industries = $industry_row['total_industries'];
            
            $get = $db->query("SELECT name FROM districts WHERE id = " . $districts['id']);
$dist = mysqli_fetch_array($get);

if ($dist && isset($dist['name'])) {
  $get = $db->query("
    SELECT 
        SUM(`Male_Enrolments`) + SUM(`Female_Enrolments`) AS total_enrollment_sum
    FROM supplyside 
    WHERE Year = 2024 
    AND District = '" . $dist['name'] . "'
");
    $row = mysqli_fetch_array($get);
	 $totalEnrollmentSum = $row['total_enrollment_sum'] ?? 0;

    // Fetch technical count
    $getTechnical = $db->query("
        SELECT COUNT(DISTINCT Institute) AS technical_count
        FROM supplyside
        WHERE District = '" . $dist['name'] . "'
        AND type = 'gct'
    ");
    $technicalRow = mysqli_fetch_array($getTechnical);
    $technicalCount = $technicalRow['technical_count'] ?? 0;

    // Fetch vocational count
    $getVocational = $db->query("
        SELECT COUNT(DISTINCT Institute) AS vocational_count
        FROM supplyside
        WHERE District = '" . $dist['name'] . "'
        AND type = 'vocational'
    ");
    $vocationalRow = mysqli_fetch_array($getVocational);
    $vocationalCount = $vocationalRow['vocational_count'] ?? 0;
}
			
			
            ?>
             <tbody>
        <tr style="background-color: #046c44; color: white;">
            <td class="texts" style="padding: 10px; font-size: 14px; font-weight: 600;"><?php echo $districts['name'] ?></td>
            <td class="texts" style="padding: 10px; font-size: 14px; font-weight: 600; color: #D3D3D3;"><?php echo $total_industries; ?></td>
            <td class="texts" style="padding: 10px; font-size: 14px; font-weight: 600; color: #D3D3D3;"><?php echo $vocationalCount; ?></td>
            <td class="texts" style="padding: 10px; font-size: 14px; font-weight: 600; color: #D3D3D3;"><?php echo $technicalCount; ?></td>
        
            <td class="texts" style="padding: 10px; font-size: 14px; font-weight: 600; color: #D3D3D3;"><?php echo $row['total_enrollment_sum'] != '' ? $row['total_enrollment_sum'] : '0'; ?></td>
           
        </tr>
    </tbody>
        <?php } ?>


    </table>

</div>
<script>
    //---------------------------------Punjab Table -----------------------------------------------

    function tableCreatePunjab() {

        var myTable= "<table width='100%'><tr><td class='text' style='color : white;' align='left'>District</td>";
        myTable+= "<td class='text' style='color : white;' align='left'>Total GCT</td>";
        myTable+= "<td class='text' style='color : white;' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' style='color : white;' align='left'>Capacity</td>";
        myTable+= "<td class='text' style='color : white;' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' style='color : white;' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',8);

//        $query = "select * from mapdata where Province='Punjab' ORDER BY district ASC";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
            ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td style='color : white;'  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td style='color : #D3D3D3;'  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td style='color : #D3D3D3;'  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td style='color : #D3D3D3;'  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td style='color : #D3D3D3;'  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td style='color : #D3D3D3;'  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------KP Table -----------------------------------------------
    function tableCreateKPK() {

        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";

        <?php
        $districts_table= get_table_by_type('districts','province_id',6);
//        $query = "select * from mapdata where Province='KP'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------Sindh Table -----------------------------------------------
    function tableCreateSindh() {

        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',9);
//        $query = "select * from mapdata where Province='Sindh'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------Balochistan Table -----------------------------------------------
    function tableCreateBalochistan() {

        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',2);
//        $query = "select * from mapdata where Province='Balochistan'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------FATA Table -----------------------------------------------
    function tableCreateFATA() {

        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',3);
//        $query = "select * from mapdata where province='FATA'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }

    //---------------------------------GB Table -----------------------------------------------
    function tableCreateGB() {
        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',4);
//        $query = "select * from mapdata where province='GB'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------AJK Table -----------------------------------------------
    function tableCreateAJK() {
        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',1);
//        $query = "select * from mapdata where province='Azad Jamu Kashmir'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        //
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }
    //---------------------------------ICT Table -----------------------------------------------
    function tableCreateICT() {
        var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
        myTable+= "<td class='text' align='left'>Total GCT</td>";
        myTable+= "<td class='text' align='left'>Total Voacational</td>";
        myTable+= "<td class='text' align='left'>Capacity</td>";
        myTable+= "<td class='text' align='left'>Total Enrollment</td>";
        myTable+="<td class='text' align='left'>Dropout</td></tr>";
        <?php
        $districts_table= get_table_by_type('districts','province_id',5);
//        $query = "select * from mapdata where province='Islamabad Capital Territory'";
//        $get=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_array($get)){
        while ($districts=mysqli_fetch_array($districts_table)){
        $Vocational= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
        $Technical= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
        $get=$db->query("SELECT COUNT(i.user_id) as Totalinstitutes,SUM(b.enrollment_m) as ensum,SUM(b.enrollment_f) as enfsum, (SUM(b.enrollment_m)+SUM(b.enrollment_f)) as totalenroll,(SUM(b.dropout_m)+SUM(b.dropout_f)) as totaldropout,
SUM(capacity) as capacity 
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
        $row=mysqli_fetch_array($get)
        ?>


        //for (var i=0; i<1; i++) {
        myTable+="<tr><td  class='texts' align='left'> <?php echo $districts['name'] ?>" + "</td>";
        //myArray[i] = myArray[i].toFixed(3);
        myTable+="<td  class='texts' align='left'>" + <?php echo $Technical['total']; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $Vocational['total'] ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo  $row['capacity']!=''?$row['capacity']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totalenroll']!=''?$row['totalenroll']:'0'; ?> + "</td>";
        myTable+="<td  class='texts' align='left'>" + <?php echo $row['totaldropout']!=''?$row['totaldropout']:'0';?> + "</td></tr>";

        //}
//   myTable+="</table>";

// document.write( myTable);
        document.getElementById('chartdiv4').innerHTML = myTable;
        <?php } ?>
    }

</script>

<div id="chartdiv4"> </div>
