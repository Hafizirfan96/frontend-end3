<?php
//   $conn=mysqli_connect('localhost','skilling_arsalan','k?8LB?KCXkA^');
//mysqli_select_db("root",$conn);
include "dbconn.php";
if (isset($_GET["pg"])) {
      // Put the two words together with a space in the middle to form "hello world"
      $get_district = $_GET["pg"];
      // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
	 // echo $get_district;
   }
   //echo $get_district;
   
$query = "select * from mapdata where district='$get_district'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){
$queryshift="select * from shift where district='$get_district'";
$getshift=mysqli_query($conn,$queryshift);
while($rowshift=mysqli_fetch_array($getshift)){

$querycondition="select * from mapcondition where district='$get_district'";
$getcondition=mysqli_query($conn,$querycondition);
while($rowcondition=mysqli_fetch_array($getcondition)){

$querystatus="select * from status where district='$get_district'";
$getstatus=mysqli_query($conn,$querystatus);
while($rowstatus=mysqli_fetch_array($getstatus)){

   ?>

<!DOCTYPE html>
    <head>
    <title>Update Data</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="left" align="center">

     <form class="span4" action="" method="post">
     
  <fieldset>
    <legend>College of Technical & Vocational Institutes Data Updates</legend>

	 <table>
	 <tr>
	 <td>   <label>Area<span class="required">*</span></label>
   <select name="province">
   <option><?php echo $row['province'] ?></option>
   <option value="Punjab">Punjab</option>
   <option value="Khyber Pakhtun Khawa">Khyber Pakhtun Khawa</option>
   <option value="Sindh">Sindh</option>
   <option value="Balochistan">Blochistan</option>
   <option value="FATA">FATA</option>
   <option value="GB">GB</option>
   <option value="Azad Jamu Kashmir">Azad Jamu Kashmir</option>
   <option value="Islamabad Capital Territory">Islamabad Capital Territory (ICT)</option>
   </select></td>
	 <td>	 <label>District<span class="required">*</span></label>
	 <select name="district" size="1">
	   <option><?php echo $row['district'] ?></option>
	   <option value="Islamabad">Islamabad</option>
	   <option value="Rawalpindi">Rawalpindi</option>
<option value="Chakwal">Chakwal</option>
<option value="Lahore">Lahore</option>
<option value="Haripur">Haripur</option>
<option value="Sheikhupura">Sheikh pura</option>
<option value="Attock">Attock</option>
<option value="Sialkot">Sialkot</option>
<option value="TobaTekSingh">Toba Tek Singh</option>
<option value="Faisalabad">Faisalabad</option>
<option value="MandiBahauddin">Mandi Bahauddin</option>
<option value="Narowal">Narowal</option>
<option value="Mirpur">Mirpur</option>
<option value="Skardu">Skardu</option>
<option value="Malakand">Malakand</option>
<option value="Bagh">Bagh</option>
<option value="Haveli">Haveli</option>
<option value="Kotli">Kotli</option>
<option value="Gujrat">Gujrat</option>
<option value="Jhelum">Jehlum</option>
<option value="HunzaNagar">Hunza Nagar</option>
<option value="Gujranwala">Gujranwala</option>
<option value="Bhimber">Bhimber</option>
<option value="Mardan">Mardan</option>
<option value="Nowshera">Nowshera</option>
<option value="Sargodha">Sargodha</option>
<option value="Hafizabad">Hafizabad</option>
<option value="Hattian">Hattian</option>
<option value="Swabi">Swabi</option>
<option value="Chitral">Chitral</option>
<option value="Abbottabad">Abbottabad</option>
<option value="Astor">Astor</option>
<option value="Karak">Karak</option>
<option value="Neelum">Neelum</option>
<option value="Gilgit">Gilgit</option>
<option value="Mansehra">Mansehra</option>
<option value="Layyah">Layyah</option>
<option value="Poonch">Poonch</option>
<option value="Okara">Okara</option>
<option value="Charsadda">Charsadda</option>
<option value="Sahiwal">Sahiwal</option>
<option value="Muzaffarabad">Muzaffarabad</option>
<option value="Karachi">Karachi</option>
<option value="Jhang">Jhang</option>
<option value="Quetta">Quetta</option>
<option value="Kasur">Kasur</option>
<option value="Khanewal">Khanewal</option>
<option value="Bhakkar">Bhakkar</option>
<option value="Sudhnutti">Sudhnutti</option>
<option value="Vehari">Vehari</option>
<option value="Pakpattan">Pakpattan</option>
<option value="Ghizer">Ghizer</option>
<option value="Kech">Kech</option>
<option value="Ghanchi">Ghanchi</option>
<option value="Peshawar">Peshawar</option>
<option value="Bahawalnagar">Bahawalnagar</option>
<option value="Mianwali">Mianwali</option>
<option value="Multan">Multan</option>
<option value="Khushab">Khushab</option>
<option value="NankanaSahib">Nankana Sahib</option>
<option value="Lodhran">Lodhran</option>
<option value="Hyderabad">Hyderabad</option>
<option value="Swat">Swat</option>
<option value="Bannu">Bannu</option>
<option value="Chiniot">Chiniot</option>
<option value="FRTank">FR Tank</option>
<option value="FRBannu">FR Bannu</option>
<option value="Kohat">Kohat</option>
<option value="TorGhar">Tor Ghar</option>
<option value="KillaSaifullah">Killa Saifullah</option>
<option value="Buner">Buner</option>
<option value="NaushehroFeroze">Naushehro Feroze</option>
<option value="Sukkur">Sukkur</option>
<option value="DeraIsmailKhan">Dera Ismail Khan</option>
<option value="Mastung">Mustung</option>
<option value="Kharan">Kharan</option>
<option value="Gwadar">Gwadar</option>
<option value="LowerDir">Lower Dir</option>
<option value="Ziarat">Ziarat</option>
<option value="Dadu">Dadu</option>
<option value="RahimYarKhan">Rahim Yar Khan</option>
<option value="Larkana">Larkana</option>
<option value="Sibi">Sibi</option>
<option value="Bahawalpur">Bahawalpur</option>
<option value="LakkiMarwat">Lakki Marwat</option>
<option value="Orakzaiagency">Orakzai Agency</option>
<option value="Nushki">Nushki</option>
<option value="Muzaffargarh">Muzaffargarh</option>
<option value="Ghotki">Ghtki</option>
<option value="ShaheedBenazirabad">Shaheed Benazir Abad</option>
<option value="TandoAllahYar">Tando Allah Yar</option>
<option value="Zhob">Zhob</option>
<option value="Hangu">Hangu</option>
<option value="Sanghar">Sanghar</option>
<option value="Diamir">Diamir</option>
<option value="UpperDir">Upper Dir</option>
<option value="Lasbela">Lasbela</option>
<option value="Khairpur">Khaipur</option>
<option value="Bajauragency">Bajaur Agency</option>
<option value="JhalMagsi">Jhal Magsi</option>
<option value="Mohmandagency">Mohmand Agency</option>
<option value="Shikarpur">Shikarpur</option>
<option value="Tank">Tank</option>
<option value="Khyberagency">Khyber Agency</option>
<option value="Khuzdar">Khuzdar</option>
<option value="Pishin">Pishni</option>
<option value="Shangla">Shangla</option>
<option value="Matiari">Matiari</option>
<option value="Awaran">Awaran</option>
<option value="Jacobabad">Jacobabad</option>
<option value="Batagram">Batagram</option>
<option value="Tharparkar">Tharparkar</option>
<option value="Badin">Badin</option>
<option value="KambarShahdadkot">Kambar Shahdadkot</option>
<option value="Panjgur">Panjgur</option>
<option value="FRPeshawar">FR Peshawar</option>
<option value="Kashmore">Kashmore</option>
<option value="Jaffarabad">Jaffar Abad</option>
<option value="Mirpurkhas">Mir Pur Khas</option>
<option value="Kalat">Kalat</option>
<option value="DeraGhaziKhan">Dera Ghazi Khan</option>
<option value="Sherani">Sherani</option>
<option value="TandoMuhammadKhan">Tando Muhammad Khan</option>
<option value="Rajanpur">Rajanpur</option>
<option value="Umerkot">Umerkot</option>
<option value="Jamshoro">Jamshoro</option>
<option value="FRDIKhan">FR D.I.Khan</option>
<option value="Barkhan">Barkhan</option>
<option value="Chaghi">Chaghi</option>
<option value="Loralai">Loralai</option>
<option value="Thatta">Thatta</option>
<option value="FRLakkiMarwat">FR Lakki Marwat</option>
<option value="Kohistan">Kohistan</option>
<option value="Harnai">Harni</option>
<option value="Kachhi">Kachhi</option>
<option value="FRKohat">FR Kohat</option>
<option value="Kurramagency">Kurram Agency</option>
<option value="Nasirabad">Nasirabad</option>
<option value="Washuk">Washuk</option>
<option value="Kohlu">Kohlu</option>
<option value="Sohbatpur">Sohbatpur</option>
<option value="Musakhail">Musakhail</option>
<option value="SouthWaziristanagency">South Waziristan Agency</option>
<option value="DeraBugti">Dera Bugti</option>
<option value="KillaAbdullah">Killa Abdullah</option>
<option value="NorthWaziristanagency">North Waziristan Agency</option>
<option value="Sujawal">Sujawal</option>
<option value="Lehri">Lehri</option>
<option value="disputed">Disputed</option>
     </select>
	 </label></td>
	 <td><label>Male GCT<span class="required">*</span></label>
     <input type="text" name="malegct" Value="<?php echo $row['malegct'] ?>"></td>
	 <td>
	      <label>Female GCT<span class="required">*</span></label>
     <input type="text" name="femalegct" class="input-small" Value="<?php echo $row['femalegct'] ?>">
	 </td>
	 <td>
	  <label>Co-Education<span class="required">*</span></label>
     <input type="text" name="coeducation" Value="<?php echo $row['coeducation'] ?>" class="input-small">
	 </td>
	 <td>
	 	  <label>Total GCT<span class="required">*</span></label>
     <input type="text" name="gcttotal" Value="<?php echo $row['gcttotal'] ?>" class="input-small"> 
	 </td>
 </tr>
	
	<tr>
	 <td>
<label>Male Vocational<span class="required">*</span></label>
     <input type="text" name="male_vocational" Value="<?php echo $row['male_vocational'] ?>">
	 </td>
	 <td>
<label>Female Vocational<span class="required">*</span></label>
     <input type="text" name="female_vocational" Value="<?php echo $row['female_vocational'] ?>">	 
	 </td>
	 <td>
<label>Co-Education Vocational<span class="required">*</span></label>
     <input type="text" name="co_education_vocational" Value="<?php echo $row['co_education_vocational'] ?>">	 
	 </td>
	 <td>
	 <label>Total Vocational<span class="required">*</span></label>
     <input type="text" name="total_vocational" Value="<?php echo $row['total_vocational'] ?>">	 
	 </td>
	 <td>
	 	 <label>Capacity<span class="required">*</span></label>
     <input type="text" name="capacity" Value="<?php echo $row['capacity'] ?>" class="input-small">
	 </td>
	 <td>
	 	 	 <label>Male Enrollment<span class="required">*</span></label>
     <input type="text" name="male_enrollment" Value="<?php echo $row['male_enrollment'] ?>" >
	 </td>
	</tr>
<tr>
<td>
	 	 	 <label>Female Enrollment<span class="required">*</span></label>
     <input type="text" name="female_enrollment" Value="<?php echo $row['female_enrollment'] ?>">

</td>
<td>
	 	 	 <label>Total Enrollment<span class="required">*</span></label>
     <input type="text" name="total_enrollment" Value="<?php echo $row['total_enrollment'] ?>">

</td>
<td>
	 	 	 <label>Dropout<span class="required">*</span></label>
     <input type="text" name="dropout" Value="<?php echo $row['dropout'] ?>">

</td>
<td>
	 	 	 <label>Male Staff<span class="required">*</span></label>
     <input type="text" name="male_staff" Value="<?php echo $row['male_staff'] ?>">

</td>
<td>
	 	 	 <label>Female Staff<span class="required">*</span></label>
     <input type="text" name="female_staff" Value="<?php echo $row['female_staff'] ?>" class="input-small">

</td>
<td>

</td>


</tr>
<tr>
<td>
	 	 	 <label>Passed Out Current Status<span class="required">*</span></label>
     <input type="text" name="govt_job" Value="<?php echo $rowstatus['govt_job'] ?>">
     <input type="text" name="private_job" Value="<?php echo $rowstatus['private_job'] ?>">
     <input type="text" name="self_employment" Value="<?php echo $rowstatus['self_employment'] ?>">
     <input type="text" name="unemployed" Value="<?php echo $rowstatus['unemployed'] ?>">
     <input type="text" name="abrod" Value="<?php echo $rowstatus['abrod'] ?>">
     <input type="text" name="higher_studies" Value="<?php echo $rowstatus['higher_studies'] ?>">	      
     <input type="text" name="others" Value="<?php echo $rowstatus['others'] ?>">
     <input type="text" name="internship" Value="<?php echo $rowstatus['internship'] ?>">	 
	 
	 <!-- <textarea name="passed_out_current_status">i.e Govt. Job: 0 etc</textarea> -->

</td>
<td valign="top">
	 	 	 <label>Building Condition<span class="required">*</span></label>
     <input type="text" name="satisfactory" Value="<?php echo $rowcondition['satisfactory'] ?>">
     <input type="text" name="partially_satisfactory" Value="<?php echo $rowcondition['partially_satisfactory'] ?>">
     <input type="text" name="not_satisfactory" Value="<?php echo $rowcondition['not_satisfactory'] ?>">

<!--			 <textarea name="building_condition">i.e Satisfactory= 45.2%</textarea> -->
     
</td>
<td valign="top">

	 	 	 <label>Type of Shift<span class="required">*</span></label>
     <input type="text" name="morning" Value="<?php echo $rowshift['morning'] ?>">
     <input type="text" name="evening" Value="<?php echo $rowshift['evening'] ?>">
     <input type="text" name="bothshift" Value="<?php echo $rowshift['bothshift'] ?>">
	 
<!--			 <textarea name="type_of_shift">i.e Morning= 71.0%</textarea>  -->
</td>

</tr>
<tr>
<td>
	 	 	 <label>Total Teaching Staff<span class="required">*</span></label>
     <input type="text" name="total_teaching_staff" Value="<?php echo $row['total_teaching_staff'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Skilled Demand<span class="required">*</span></label>
     <input type="text" name="skilled_demand" Value="<?php echo $row['skilled_demand'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Drinking Water<span class="required">*</span></label>
     <input type="text" name="drinking_water" Value="<?php echo $row['drinking_water'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Electricity<span class="required">*</span></label>
     <input type="text" name="electricity" Value="<?php echo $row['electricity'] ?>" class="input-small">

</td>

</tr>
<tr>
<td>
	 	 	 <label>Backup Source of Electricity<span class="required">*</span></label>
     <input type="text" name="backup_source_of_electricity" Value="<?php echo $row['backup_source_of_electricity'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Toilet<span class="required">*</span></label>
     <input type="text" name="toilet" Value="<?php echo $row['toilet'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Hostel Facility<span class="required">*</span></label>
     <input type="text" name="hostel_facility" Value="<?php echo $row['hostel_facility'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Transport Facility<span class="required">*</span></label>
     <input type="text" name="transport_facility" Value="<?php echo $row['transport_facility'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Internet Facility<span class="required">*</span></label>
     <input type="text" name="internet_facility" Value="<?php echo $row['internet_facility'] ?>" class="input-small">

</td>
<td>
	 	 	 <label>Sport Facility<span class="required">*</span></label>
     <input type="text" name="sport_facility" Value="<?php echo $row['sport_facility'] ?>" class="input-small">

</td>

</tr>
<tr>
<td>
	 	 	 <label>Library Facility<span class="required">*</span></label>
     <input type="text" name="library_facility" Value="<?php echo $row['library_facility'] ?>">

</td>
<td>
	 	 	 <label>First Aid Kit<span class="required">*</span></label>
     <input type="text" name="first_aid_kit" Value="<?php echo $row['first_aid_kit'] ?>">

</td>
<td>
	 	 	 <label>Student Teacher Ratio<span class="required">*</span></label>
     <input type="text" name="student_teacher_ratio" Value="<?php echo $row['student_teacher_ratio'] ?>">

</td>
</tr>
	 </table>
	 
	 <?php } ?>
	 <?php } ?>
	 <?php } ?>
	 <?php } ?>
	 
         <?php
if(isset($_POST['root'])){
//$conn=mysqli_connect('localhost','skilling_arsalan','k?8LB?KCXkA^');
//mysqli_select_db("root",$conn);
$conn=mysqli_connect('localhost','skilling_arsalan','k?8LB?KCXkA^');
mysqli_select_db($conn,"skilling_dmap");

$province=$_POST['province'];
$district=$_POST['district'];
$malegct=$_POST['malegct'];
$femalegct=$_POST['femalegct'];
$coeducation=$_POST['coeducation'];
$gcttotal=$_POST['gcttotal'];
$male_vocational=$_POST['male_vocational'];
$female_vocational=$_POST['female_vocational'];
$co_education_vocational=$_POST['co_education_vocational'];
$total_vocational=$_POST['total_vocational'];
$capacity=$_POST['capacity'];
$male_enrollment=$_POST['male_enrollment'];
$female_enrollment=$_POST['female_enrollment'];
$total_enrollment=$_POST['total_enrollment'];
/*$passed_out_current_status=$_POST['passed_out_current_status'];*/
$dropout=$_POST['dropout'];
$male_staff=$_POST['male_staff'];
$female_staff=$_POST['female_staff'];
$total_teaching_staff=$_POST['total_teaching_staff'];
$skilled_demand=$_POST['skilled_demand'];
/*$building_condition=$_POST['building_condition'];*/
/*$type_of_shift=$_POST['type_of_shift'];*/
$drinking_water=$_POST['drinking_water'];
$electricity=$_POST['electricity'];
$backup_source_of_electricity=$_POST['backup_source_of_electricity'];
$toilet=$_POST['toilet'];
$hostel_facility=$_POST['hostel_facility'];
$transport_facility=$_POST['transport_facility'];
$internet_facility=$_POST['internet_facility'];
$sport_facility=$_POST['sport_facility'];
$library_facility=$_POST['library_facility'];
$first_aid_kit=$_POST['first_aid_kit'];
$student_teacher_ratio=$_POST['student_teacher_ratio'];

/*-----------------------------------*/
$govt_job=$_POST['govt_job'];
$private_job=$_POST['private_job'];
$self_employment=$_POST['self_employment'];
$unemployed=$_POST['unemployed'];
$abrod=$_POST['abrod'];
$higher_studies=$_POST['higher_studies'];
$others=$_POST['others'];
$internship=$_POST['internship'];
/*----------------------------------*/	 
$satisfactory=$_POST['satisfactory'];
$partially_satisfactory=$_POST['partially_satisfactory'];
$not_satisfactory=$_POST['not_satisfactory'];
/*-----------------------------------*/
$morning=$_POST['morning'];
$evening=$_POST['evening'];
$bothshift=$_POST['bothshift'];
/*-----------------------------------*/
if(empty($province)){
	echo "<label class='err'>All field is required</label>";
	}

elseif(!is_numeric($coeducation)){
	echo "<label class='err'>co-education must be numeric</label>";
	}
		else{
$insert="update mapdata SET province='$province',district='$district',malegct='$malegct',femalegct='$femalegct',coeducation='$coeducation',gcttotal='$gcttotal',male_vocational='$male_vocational',female_vocational='$female_vocational',co_education_vocational='$co_education_vocational',total_vocational='$total_vocational',capacity='$capacity',male_enrollment='$male_enrollment',female_enrollment='$female_enrollment',total_enrollment='$total_enrollment',dropout='$dropout',male_staff='$male_staff',female_staff='$female_staff',total_teaching_staff='$total_teaching_staff',skilled_demand='$skilled_demand',drinking_water='$drinking_water',electricity='$electricity',backup_source_of_electricity='$backup_source_of_electricity',toilet='$toilet',hostel_facility='$hostel_facility',transport_facility='$transport_facility',internet_facility='$internet_facility',sport_facility='$sport_facility',library_facility='$library_facility',first_aid_kit='$first_aid_kit',student_teacher_ratio='$student_teacher_ratio' WHERE district='$get_district'";

$rs=mysqli_query($insert) or die(mysqli_error());


$insertst="update status SET govt_job='$govt_job',private_job='$private_job',self_employment='$self_employment',unemployed='$unemployed',abrod='$abrod',higher_studies='$higher_studies',others='$others',internship='$internship',district='$district' WHERE district='$get_district'";
$rs1=mysqli_query($insertst) or die(mysqli_error());

$insertsh="update shift SET morning='$morning',evening='$evening',bothshift='$bothshift' WHERE district='$get_district'";
$rs3=mysqli_query($insertsh) or die(mysqli_error());

$insertd="update mapcondition SET satisfactory='$satisfactory',partially_satisfactory='$partially_satisfactory',not_satisfactory='$not_satisfactory' WHERE district='$get_district'";
$rs2=mysqli_query($insertd) or die(mysqli_error());


?>
<script>alert('Data Entry Updated!');

</script>
<?php }
}
 ?>
<br/>    <button type="submit" name="root" class="btn">Submit</button>
<a href="data.php" class="btn btn-primary">View Data</a>
  </fieldset>
</form>

   </div>
   <?php 
   function save(){
		
	}
   ?>
    </body>
    </html>
	