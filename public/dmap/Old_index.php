<?php
include "dbconn.php";

//if (isset($_GET["pg"])) {
      // Put the two words together with a space in the middle to form "hello world"
  //    $get_district = $_GET["pg"];
      // Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
	 // echo $get_district;
   //}

//$query = "select * from mapdata where district='Kurramagency'";
//$get=mysqli_query($conn,$query);
//while($row=mysqli_fetch_array($get)){
?>
<html>
<head>
<link rel="shortcut icon" href="img/favicon.png">
<script src="amcharts.js" type="text/javascript"></script>
<script src="pie.js" type="text/javascript"></script>
<script src="ammap_amcharts_extension.js" type="text/javascript"></script>
<script src="serial.js" type="text/javascript"></script>

<script src="pakistanCustom.js"></script>        
		 
<style>
body{
background:#FCF1D8;
/*background-image:url(back.png);*/
}
#chartdiv {
	width	: 60%;
	height	: 500px;
  margin: top;
  float:left;
}
#chartdiv2 {
	width	: 40%;
	height	: 40px;
  margin: top;
  float:right;
  font-family:Geneva, Arial, Helvetica, sans-serif;
  font-size:14px;
}
#chartdiv3 {
	width	: 40%;
	height	: 40px;
  margin: top;
  float:right;
  font-family:Geneva, Arial, Helvetica, sans-serif;
  font-size:14px;
}
#chartdiv4 {
background-color:#F1F1F1;
}
tr:hover{
background-color:#71D8FF;
}
#maplink a{
    display: inline-block;
    border: 1px solid #999;
    padding: 5px;
    background:#FFC000;
    text-decoration: none;
    color: #000;
	border:dotted;
	border-width:thin;
	text-align:right;
}
#maplink a:hover{
    display: inline-block;
    border: 1px solid #999;
    padding: 5px;
    background:#94C600;
    text-decoration: none;
    color: #000;
	border:dotted;
	border-width:thin;
}
.text{
font-size:12px;
font-family:Arial, Helvetica, sans-serif;
font-weight:bold;
}
.texts{
font-size:12px;
font-family:Arial, Helvetica, sans-serif;
}

.sel{
width:120px;
border:thin;
border-style:dotted;
border-color:#FF0000;
background-color:#FFC000;
}

</style>
<title>TVET SECTOR</title></head>
<body>


<div style="width: 100%; height: 630px; position: relative;">

<div id="divtext" style="width: 300px; height:auto; position: absolute; top: 10; left: 90; z-index: 100;"><img src="docs/assets/img/demo/logo-mask.png" width="210" height="70"><font style="font-weight:lighter;" face="Arial, Helvetica, sans-serif"><h1 style="font-weight:lighter; font-size:23px;">District Level Statistics of</h1>TVET SECTOR 2014</font></div>

<div id="chartdiv2" style="width: 580px; height: 40px; position: absolute; top: 10; right: 0; z-index: 100;">

<input type="radio" name='proid'  value="10" id="pakistan" onChange="activateAreasPak();"/>Pakistan
		<input type="radio" name='proid' value="17" id="punjab" onChange="activateAreasPn(list); tableCreatePunjab(); punjab();"/>Punjab
		<input type="radio" name='proid' value="18" id="kpk"  onChange="activateAreasKp(list); tableCreateKPK(); kp();"/>KPK 
		<input type="radio" name='proid' value="16" id="sindh" onChange="activateAreasSn(list); tableCreateSindh(); sindh();" />Sindh
		<input type="radio" name='proid' value="11" id="balochistan" onChange="activateAreasBl(list); tableCreateBalochistan(); balochistan();" />Balochistan
		<input type="radio" name='proid' value="21" id="fata" onChange="activateAreasFATA(list); tableCreateFATA(); fata();" />FATA
		<input type="radio" name='proid' value="19" id="ajk" onChange="activateAreasAJK(list); tableCreateAJK(); ajk();" />AJK
		<input type="radio" name='proid' value="10" id="gb" onChange="activateAreasGb(list); tableCreateGB(); gb();" />GB
		<input type="radio" name='proid' value="15" id="ict" onChange="activateAreasICT(list); tableCreateICT(); ict();" />ICT
		<hr color="#FFC000"> 
</div>

<div id="chartdiv3" style="width: 532px; height: 40px; position: absolute; top: 60; right: 0; z-index: 100;">


<!-- <select id="mySelect" name="province" class="sel" onChange="myFunction()">
   <option>Select Area</option>
   <option value="Punjab">Punjab</option>
   <option value="Khyber Pakhtun Khawa">Khyber Pakhtun Khawa</option>
   <option value="Sindh">Sindh</option>
   <option value="Balochistan">Blochistan</option>
   <option value="FATA">FATA</option>
   <option value="GB">GB</option>
   <option value="Azad Jamu Kashmir">Azad Jamu Kashmir</option>
   <option value="Islamabad Capital Territory">Islamabad Capital Territory (ICT)</option>
   </select>
-->
<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
	if (x=='Select District'){
	}
	else{
	//link.href = "district.php?pg=" + districtid;
	//window.location.href = "district.php?pg=" + x;
window.open('district.php?pg=' + x, '_blank');
	}
    //document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
<select name="district" class="sel" id="mySelect" onchange="myFunction()">
<option>Select District</option>
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
<option value="KarachiCentral">Karachi</option>
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
</select>


</div>
<div id="chartdiv4" style="overflow:scroll; overflow-x:hidden; border:thin; border-style:dotted; width: 530px; height: 200px; position: absolute; top: 100; right: 0; z-index: 100;">

   <table width="100%">
 <thead>
<th class="text" align="left">District</th>
 <th class="text" align="left">Total GCT</th>
	 <th class="text" align="left">Total Voacational</th>
 <th class="text" align="left">Capacity</th>
    <th class="text" align="left">Total Enrollment</th>
  <th class="text" align="left">Dropout</th>
</thead>
  <?php 


$query1 = "select * from mapdata ORDER BY district ASC";
$get=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($get)){
   ?>
 <tr>
 <td class="texts" align="left"><?php echo $row['district'] ?></td>
 <td class="texts" align="left"><?php echo $row['gcttotal'] ?></td>
	 <td class="texts" align="left"><?php echo $row['total_vocational'] ?></td>
 <td class="texts" align="left"><?php echo $row['capacity'] ?></td>
    <td class="texts" align="left"><?php echo $row['total_enrollment'] ?></td>
  <td class="texts" align="left"><?php echo $row['dropout'] ?></td>
  </tr>
  <?php }?>
</table>

</div>
<script>
//---------------------------------Punjab Table -----------------------------------------------
function tableCreatePunjab() {

    var myTable= "<table width='100%'><tr><td class='text' align='left'>District</td>";
    myTable+= "<td class='text' align='left'>Total GCT</td>";
	myTable+= "<td class='text' align='left'>Total Voacational</td>";
	myTable+= "<td class='text' align='left'>Capacity</td>";
	myTable+= "<td class='text' align='left'>Total Enrollment</td>";
    myTable+="<td class='text' align='left'>Dropout</td></tr>";
<?php				

$query = "select * from mapdata where Province='Punjab' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where Province='KP' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
							
				//$query = "select SUM gcttotal AS value_sum from mapdata where province='Punjab'";    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";  
  //}
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

$query = "select * from mapdata where Province='Sindh' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where Province='Balochistan' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where province='FATA' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where province='GB' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where province='Azad Jamu Kashmir' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
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

$query = "select * from mapdata where province='Islamabad Capital Territory' ORDER BY district ASC";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>

    
  //for (var i=0; i<1; i++) {
	myTable+="<tr><td  class='texts' align='left'> <?php echo $row['district'] ?>" + "</td>";
    //myArray[i] = myArray[i].toFixed(3);
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['gcttotal']; ?> + "</td>";
	  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_vocational'] ?> + "</td>";
	    myTable+="<td  class='texts' align='left'>" + <?php echo $row['capacity'] ?> + "</td>";
		  myTable+="<td  class='texts' align='left'>" + <?php echo $row['total_enrollment'] ?> + "</td>";
    myTable+="<td  class='texts' align='left'>" + <?php echo $row['dropout'] ?> + "</td></tr>";
  
  //}
//   myTable+="</table>";

// document.write( myTable);
 document.getElementById('chartdiv4').innerHTML = myTable;
<?php } ?>
    }

	</script>
	
<div id="chartdiv4"> </div>
    <div id="maplink" style="width: 200px; height: 40px; position:absolute; bottom: 14px; right: 485px; z-index: 101;"></div>
    <div id="chartdiv22" style="width: 580px; height: 329px; position: absolute; bottom: 0; right: 0; z-index: 100;"></div>
	<div id="chartdiv5" style=" width: 300px; height: 150px; position: absolute; top: 425; right: 550;"></div>
    <div id="mapdiv" style="width:800px; height: 630px; position:absolute; top: 0; left: 0;"></div>
</div>
<p id="demo"></p>

<script>
var map;

var chart;
var chartData = {};
chartData.Islamabad = [
                
<?php				$query = "select * from mapdata where district='Islamabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                <?php } ?>
                
            ];
chartData.pakistan = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>

                
            ];
chartData.punjab = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='Punjab'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Punjab'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='Punjab'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Punjab'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='Punjab'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.kp = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='KP'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='KP'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='KP'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='KP'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='KP'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.sindh = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='Sindh'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Sindh'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='Sindh'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Sindh'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='Sindh'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.balochistan = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='Balochistan'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.fata = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='FATA'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='FATA'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='FATA'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='FATA'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='FATA'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.gb = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='GB'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='GB'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='GB'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='GB'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='GB'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.ajk = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='Azad Jamu Kashmir'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Azad Jamu Kashmir'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='Azad Jamu Kashmir'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Azad Jamu Kashmir'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='Azad Jamu Kashmir'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.ict = [
<?php
		$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata where province='Islamabad Capital Territory'") or die(mysqli_error());
		while ($grows = mysqli_fetch_array($result)) {
	?>
                {
                    "district": "College of Technology",
                    "numbers": <?php echo $grows['sum(gcttotal)']; ?>,
                    "short": "gct"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(total_vocational) FROM mapdata where province='Islamabad Capital Territory'") or die(mysqli_error());
		while ($vrows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $vrows['sum(total_vocational)']; ?>,
                    "short": "ins"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(capacity) FROM mapdata where province='Islamabad Capital Territory'") or die(mysqli_error());
		while ($crows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Capacity",
                    "numbers": <?php echo $crows['sum(capacity)']; ?>,
                    "short": "cap"
                },
								<?php 
				$result = mysqli_query($conn,"SELECT sum(total_enrollment) FROM mapdata where province='Islamabad Capital Territory'") or die(mysqli_error());
		while ($erows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $erows['sum(total_enrollment)']; ?>,
                    "short": "enr"
                },
				<?php 
				$result = mysqli_query($conn,"SELECT sum(dropout) FROM mapdata where province='Islamabad Capital Territory'") or die(mysqli_error());
		while ($drows = mysqli_fetch_array($result)) {
				?>
                {
                    "district": "Dropout",
                    "numbers": <?php echo $drows['sum(dropout)']; ?>,
                    "short": "dro"
                },
				{
                    "district": "Total Institute",
                    "numbers": <?php $one = $grows['sum(gcttotal)']; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
                    "short": "dro"
                },
                <?php } } } } }?>
            ];
chartData.Rawalpindi = [      
                
<?php				$query = "select * from mapdata where district='Rawalpindi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Chakwal = [
                
<?php				$query = "select * from mapdata where district='Chakwal'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Lahore = [
                
<?php				$query = "select * from mapdata where district='Lahore'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Haripur = [
                
<?php				$query = "select * from mapdata where district='Haripur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sheikhupura = [
                
<?php				$query = "select * from mapdata where district='Sheikhupura'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Attock = [
                
<?php				$query = "select * from mapdata where district='Attock'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sialkot = [
                
<?php				$query = "select * from mapdata where district='Sialkot'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.TobaTekSingh = [
                {
                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                
                
            ];
chartData.Faisalabad = [
                
<?php				$query = "select * from mapdata where district='Faisalabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.MandiBahauddin = [
                
<?php				$query = "select * from mapdata where district='MandiBahauddin'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Narowal = [
                
<?php				$query = "select * from mapdata where district='Narowal'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mirpur = [
                
<?php				$query = "select * from mapdata where district='Mirpur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Skardu = [
                
<?php				$query = "select * from mapdata where district='Skardu'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Malakand = [
                
<?php				$query = "select * from mapdata where district='Malakand'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bagh = [
<?php				$query = "select * from mapdata where district='Bagh'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>                
            ];
chartData.Haveli = [
                
<?php				$query = "select * from mapdata where district='Haveli'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Kotli = [
<?php				$query = "select * from mapdata where district='Kotli'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Gujrat = [
                
<?php				$query = "select * from mapdata where district='Gujrat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Jhelum = [
                
<?php				$query = "select * from mapdata where district='Jhelum'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.HunzaNagar = [
                
<?php				$query = "select * from mapdata where district='HunzaNagar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Gujranwala = [
                
<?php				$query = "select * from mapdata where district='Gujranwala'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bhimber = [
                
<?php				$query = "select * from mapdata where district='Bhimber'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mardan = [
                
<?php				$query = "select * from mapdata where district='Mardan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Nowshera = [
                
<?php				$query = "select * from mapdata where district='Nowshera'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sargodha = [
                
<?php				$query = "select * from mapdata where district='Sargodha'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Hafizabad = [
                
<?php				$query = "select * from mapdata where district='Hafizabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Hattian = [
                
<?php				$query = "select * from mapdata where district='Hattian'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Swabi = [
                
<?php				$query = "select * from mapdata where district='Swabi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Chitral = [
                
<?php				$query = "select * from mapdata where district='Chitral'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Abbottabad = [
                
<?php				$query = "select * from mapdata where district='Abbottabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Astor = [
                
<?php				$query = "select * from mapdata where district='Astor'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Karak = [
                
<?php				$query = "select * from mapdata where district='Karak'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Neelum = [
                
<?php				$query = "select * from mapdata where district='Neelum'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Gilgit = [
                
<?php				$query = "select * from mapdata where district='Gilgit'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mansehra = [
                
<?php				$query = "select * from mapdata where district='Mansehra'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Layyah = [
                
<?php				$query = "select * from mapdata where district='Layyah'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Poonch = [
<?php				$query = "select * from mapdata where district='Poonch'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Okara = [
                
<?php				$query = "select * from mapdata where district='Okara'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Charsadda = [
                
<?php				$query = "select * from mapdata where district='Charsadda'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sahiwal = [
                
<?php				$query = "select * from mapdata where district='Sahiwal'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Muzaffarabad = [
<?php				$query = "select * from mapdata where district='Muzaffarabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.KarachiCentral = [
                
<?php				$query = "select * from mapdata where district='KarachiCentral'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Jhang = [
                
<?php				$query = "select * from mapdata where district='Jhang'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Quetta = [
                
<?php				$query = "select * from mapdata where district='Quetta'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Kasur = [
                
<?php				$query = "select * from mapdata where district='Kasur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Khanewal = [
                
<?php				$query = "select * from mapdata where district='Khanewal'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bhakkar = [
                
<?php				$query = "select * from mapdata where district='Bhakkar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sudhnutti = [
<?php				$query = "select * from mapdata where district='Sudhnutti'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Vehari = [
                
<?php				$query = "select * from mapdata where district='Vehari'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Pakpattan = [
                
<?php				$query = "select * from mapdata where district='Pakpattan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Ghizer = [
                
<?php				$query = "select * from mapdata where district='Ghizer'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Kech = [
                
<?php				$query = "select * from mapdata where district='Kech'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Ghanchi = [
                
<?php				$query = "select * from mapdata where district='Ghanchi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Peshawar = [
                
<?php				$query = "select * from mapdata where district='Peshawar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bahawalnagar = [
                
<?php				$query = "select * from mapdata where district='Bahawalnagar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mianwali = [
                
<?php				$query = "select * from mapdata where district='Mianwali'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Multan = [
                
<?php				$query = "select * from mapdata where district='Multan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Khushab = [
                
<?php				$query = "select * from mapdata where district='Khushab'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.NankanaSahib = [
                
<?php				$query = "select * from mapdata where district='NankanaSahib'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Lodhran = [
                
<?php				$query = "select * from mapdata where district='Lodhran'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Hyderabad = [
                
<?php				$query = "select * from mapdata where district='Hyderabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Swat = [
                
<?php				$query = "select * from mapdata where district='Swat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bannu = [
                
<?php				$query = "select * from mapdata where district='Bannu'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Chiniot = [
                
<?php				$query = "select * from mapdata where district='Chiniot'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.FRTank = [
                {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];
chartData.FRBannu = [
                {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];
chartData.Kohat = [
                
<?php				$query = "select * from mapdata where district='Kohat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.TorGhar = [
                
<?php				$query = "select * from mapdata where district='TorGhar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.KillaSaifullah = [
                
<?php				$query = "select * from mapdata where district='KillaSaifullah'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Buner = [
                
<?php				$query = "select * from mapdata where district='Buner'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.NaushehroFeroze = [
                
<?php				$query = "select * from mapdata where district='NaushehroFeroze'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sukkur = [
                
<?php				$query = "select * from mapdata where district='Sukkur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.DeraIsmailKhan = [
                
<?php				$query = "select * from mapdata where district='DeraIsmailKhan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mastung = [
                
<?php				$query = "select * from mapdata where district='Mastung'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Kharan = [
                
<?php				$query = "select * from mapdata where district='Kharan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Gwadar = [
                
<?php				$query = "select * from mapdata where district='Gwadar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.LowerDir = [
                
<?php				$query = "select * from mapdata where district='LowerDir'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Ziarat = [
                
<?php				$query = "select * from mapdata where district='Ziarat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Dadu = [
                
<?php				$query = "select * from mapdata where district='Dadu'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.RahimYarKhan = [
                
<?php				$query = "select * from mapdata where district='RahimYarKhan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Larkana = [
                
<?php				$query = "select * from mapdata where district='Larkana'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sibi = [
                
<?php				$query = "select * from mapdata where district='Sibi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                 {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bahawalpur = [
                
<?php				$query = "select * from mapdata where district='Bahawalpur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.LakkiMarwat = [
                
<?php				$query = "select * from mapdata where district='LakkiMarwat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Orakzaiagency = [
                
<?php				$query = "select * from mapdata where district='Orakzaiagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Nushki = [
                
<?php				$query = "select * from mapdata where district='Nushki'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Muzaffargarh = [
                
<?php				$query = "select * from mapdata where district='Muzaffargarh'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Ghotki = [
                
<?php				$query = "select * from mapdata where district='Ghotki'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.ShaheedBenazirabad = [
                
<?php				$query = "select * from mapdata where district='ShaheedBenazirabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.TandoAllahYar = [
                
<?php				$query = "select * from mapdata where district='TandoAllahYar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Zhob = [
                
<?php				$query = "select * from mapdata where district='Zhob'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Hangu = [
                
<?php				$query = "select * from mapdata where district='Hangu'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sanghar = [
                
<?php				$query = "select * from mapdata where district='Sanghar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Diamir = [
                
<?php				$query = "select * from mapdata where district='Diamir'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.UpperDir = [
                
<?php				$query = "select * from mapdata where district='UpperDir'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Lasbela = [
                
<?php				$query = "select * from mapdata where district='Lasbela'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Khairpur = [
                
<?php				$query = "select * from mapdata where district='Khairpur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Bajauragency = [
                
<?php				$query = "select * from mapdata where district='Bajauragency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.JhalMagsi = [
                
<?php				$query = "select * from mapdata where district='JhalMagsi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mohmandagency = [
                
<?php				$query = "select * from mapdata where district='Mohmandagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Shikarpur = [
                
<?php				$query = "select * from mapdata where district='Shikarpur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Tank = [
                
<?php				$query = "select * from mapdata where district='Tank'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];

chartData.Khyberagency = [
                
<?php				$query = "select * from mapdata where district='Khyberagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
				            ];
chartData.Khuzdar = [
                
<?php				$query = "select * from mapdata where district='Khuzdar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Pishin = [
                
<?php				$query = "select * from mapdata where district='Pishin'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Shangla = [
                
<?php				$query = "select * from mapdata where district='Shangla'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Matiari = [
                
<?php				$query = "select * from mapdata where district='Matiari'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Awaran = [
                
<?php				$query = "select * from mapdata where district='Awaran'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Jacobabad = [
                
<?php				$query = "select * from mapdata where district='Jacobabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Batagram = [
                
<?php				$query = "select * from mapdata where district='Batagram'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                

            ];
chartData.Tharparkar = [
                
<?php				$query = "select * from mapdata where district='Tharparkar'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Badin = [
                
<?php				$query = "select * from mapdata where district='Badin'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                 {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.KambarShahdadkot = [
                
<?php				$query = "select * from mapdata where district='KambarShahdadkot'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Panjgur = [
                
<?php				$query = "select * from mapdata where district='Panjgur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.FRPeshawar = [
                {
                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];
chartData.KashmoreKandhkot = [
                
<?php				$query = "select * from mapdata where district='Kashmore'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Jaffarabad = [
                
<?php				$query = "select * from mapdata where district='Jaffarabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Mirpurkhas = [
                
<?php				$query = "select * from mapdata where district='Mirpurkhas'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Kalat = [
                
<?php				$query = "select * from mapdata where district='Kalat'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",

                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.DeraGhaziKhan = [
                
<?php				$query = "select * from mapdata where district='DeraGhaziKhan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Sherani = [
                
<?php				$query = "select * from mapdata where district='Sherani'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.TandoMuhammadKhan = [
                
<?php				$query = "select * from mapdata where district='TandoMuhammadKhan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Rajanpur = [
                
<?php				$query = "select * from mapdata where district='Rajanpur'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Umerkot = [
                
<?php				$query = "select * from mapdata where district='Umerkot'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                 {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Jamshoro = [
                
<?php				$query = "select * from mapdata where district='Jamshoro'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.FRDIKhan = [
                {
                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];
chartData.Barkhan = [
                
<?php				$query = "select * from mapdata where district='Barkhan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Chaghi = [
                
<?php				$query = "select * from mapdata where district='Chaghi'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Loralai = [
                
<?php				$query = "select * from mapdata where district='Loralai'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                 {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Thatta = [
                
<?php				$query = "select * from mapdata where district='Thatta'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.FRLakkiMarwat = [
                {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];
chartData.Kohistan = [
                
<?php				$query = "select * from mapdata where district='Kohistan'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];			
chartData.Harnai = [
                
<?php				$query = "select * from mapdata where district='Harnai'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];			
chartData.Kachhi = [
                {
                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];			
chartData.FRKohat = [
                 {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];			
chartData.Kurramagency = [
                
<?php				$query = "select * from mapdata where district='Kurramagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
            ];			
chartData.Washuk = [
                
<?php				$query = "select * from mapdata where district='Washuk'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];			
chartData.Kohlu = [
                
<?php				$query = "select * from mapdata where district='Kohlu'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                 {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	

chartData.Sohbatpur = [
                {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }

                
            ];	

chartData.Musakhail = [
                
<?php				$query = "select * from mapdata where district='Musakhail'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	
chartData.SouthWaziristanagency = [
                
<?php				$query = "select * from mapdata where district='SouthWaziristanagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	
chartData.DeraBugti = [
                
<?php				$query = "select * from mapdata where district='DeraBugti'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	
chartData.KillaAbdullah = [
                
<?php				$query = "select * from mapdata where district='KillaAbdullah'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	
chartData.NorthWaziristanagency = [
                
<?php				$query = "select * from mapdata where district='NorthWaziristanagency'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];	
chartData.Sujawal = [
                {
                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": 0,
                    "short": "dro"
                }

                
            ];	
chartData.Lehri = [
                
<?php				$query = "select * from mapdata where district='Lehri'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
chartData.Nasirabad = [
                
<?php				$query = "select * from mapdata where district='Nasirabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
                {
				    "district": "College of Technology",
                    "numbers": <?php echo $row['gcttotal']; ?>,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": <?php echo $row['total_vocational']; ?>,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": <?php echo $row['capacity']; ?>,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": <?php echo $row['total_enrollment']; ?>,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": <?php echo $row['dropout']; ?>,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": <?php $one = $row['gcttotal']; $two = $row['total_vocational']; echo $one+$two;  ?>,
                    "short": "dro"
                }
                <?php } ?>
                
            ];
				
chartData.disputed = [
                {

                    "district": "College of Technology",
                    "numbers": 0,
                    "short": "gct"
                },
                {
                    "district": "Vocational Institute",
                    "numbers": 0,
                    "short": "ins"
                },
                {
                    "district": "Capacity",
                    "numbers": 0,
                    "short": "cap"
                },
                {
                    "district": "Enrollment",
                    "numbers": 0,
                    "short": "enr"
                },
                {
                    "district": "Dropout",
                    "numbers": 0,
                    "short": "dro"
                },
				 {
                    "district": "Total Institute",
                    "numbers": 0,
                    "short": "dro"
                },
				                {
                    "district": "Total Institutes",
                    "numbers": 0,
                    "short": "dro"
                }
                
            ];				

            AmCharts.ready(function () {
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.pakistan;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 80;
                chart.marginLeft = 40;
                chart.marginRight = 100;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.balloonText = "[[category]]: [[value]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";
              graph.labelText = "[[category]]: [[value]]";
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(50, 40, "Pakistan", "left", 15, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv22");
	
/*	
    */
	

    // *** CREATE MAP ***********************************************************
    
    map = new AmCharts.AmMap();
    map.pathToImages = "http://www.ammap.com/lib/images/";
    //map.panEventsEnabled = true; // this line enables pinch-zooming and dragging on touch devices

    var dataProvider = {
//        mapVar: AmCharts.maps.worldLow	
        mapVar: AmCharts.maps.pakistanCustom
    };

    map.areasSettings = {
        unlistedAreasColor: "#DDDDDD",
        rollOverOutlineColor: "#FFFFFF",
        rollOverColor: "#CC0000" };

    dataProvider.areas = [   
      { title: "Islamabad", id: "Islamabad", selectable: true, color: "#2e7f6c" },
	  { title: "Rawalpindi", id: "Rawalpindi", color: "#94C600", selectable: true},
      { title: "Chakwal", id: "Chakwal", color: "#FFC000", selectable: true },
      { title: "Lahore", id: "Lahore", color: " #00B0F0", selectable: true },
      { title: "Haripur", id: "Haripur", color: "#8F5201", selectable: true },
      { title: "Sheikhupura", id: "Sheikhupura", color: "#2e7f6c", selectable: true },
      { title: "Attock", id: "Attock", color: "#8F5201", selectable: true },
      { title: "Sialkot", id: "Sialkot", color: "#00B0F0", selectable: true },
      { title: "Toba Tek Singh", id: "TobaTekSingh", color: "#2e7f6c", selectable: true },
      { title: "Faisalabad", id: "Faisalabad", color: "#FFC000", selectable: true },
      { title: "Mandi Bahauddin", id: "MandiBahauddin", color: "#2e7f6c", selectable: true },
      { title: "Narowal", id: "Narowal", color: "#94C600", selectable: true },
      { title: "Mirpur", id: "Mirpur", color: "#94C600", selectable: true },
      { title: "Skardu", id: "Skardu", color: "#94C600", selectable: true },
      { title: "Malakand", id: "Malakand", color: "#94C600", selectable: true },
      { title: "Bagh", id: "Bagh", color: "#94C600", selectable: true },
      { title: "Haveli", id: "Haveli", color: "#94C600", selectable: true },
      { title: "Kotli", id: "Kotli", color: "#94C600", selectable: true },
      { title: "Gujrat", id: "Gujrat", color: "#94C600", selectable: true },
      { title: "Jhelum", id: "Jhelum", color: "#94C600", selectable: true },
      { title: "Hunza-Nagar", id: "HunzaNagar", color: "#94C600", selectable: true },
      { title: "Gujranwala", id: "Gujranwala", color: "#94C600", selectable: true },
      { title: "Bhimber", id: "Bhimber", color: "#94C600", selectable: true },
      { title: "Mardan", id: "Mardan", color: "#94C600", selectable: true },
      { title: "Nowshera", id: "Nowshera", color: "#94C600", selectable: true },
      { title: "Sargodha", id: "Sargodha", color: "#94C600", selectable: true },
      { title: "Hafizabad", id: "Hafizabad", color: "#94C600", selectable: true },
      { title: "Hattian", id: "Hattian", color: "#94C600", selectable: true },
      { title: "Swabi", id: "Swabi", color: "#94C600", selectable: true },
      { title: "Chitral", id: "Chitral", color: "#94C600", selectable: true },
      { title: "Abbottabad", id: "Abbottabad", color: "#94C600", selectable: true },
      { title: "Astor", id: "Astor", color: "#94C600", selectable: true },
      { title: "Karak", id: "Karak", color: "#94C600", selectable: true },
      { title: "Neelum", id: "Neelum", color: "#94C600", selectable: true },
      { title: "Gilgit", id: "Gilgit", color: "#94C600", selectable: true },
      { title: "Mansehra", id: "Mansehra", color: "#94C600", selectable: true },
      { title: "Layyah", id: "Layyah", color: "#94C600", selectable: true },
      { title: "Poonch", id: "Poonch", color: "#94C600", selectable: true },
      { title: "Okara", id: "Okara", color: "#94C600", selectable: true },
      { title: "Charsadda", id: "Charsadda", color: "#94C600", selectable: true },
      { title: "Sahiwal", id: "Sahiwal", color: "#94C600", selectable: true },
      { title: "Muzaffarabad", id: "Muzaffarabad", color: "#94C600", selectable: true },
      { title: "Karachi Central", id: "KarachiCentral", color: "#94C600", selectable: true },
      { title: "Jhang", id: "Jhang", color: "#94C600", selectable: true },
      { title: "Quetta", id: "Quetta", color: "#94C600", selectable: true },
      { title: "Kasur", id: "Kasur", color: "#94C600", selectable: true },
      { title: "Khanewal", id: "Khanewal", color: "#94C600", selectable: true },
      { title: "Bhakkar", id: "Bhakkar", color: "#94C600", selectable: true },
      { title: "Sudhnutti", id: "Sudhnutti", color: "#94C600", selectable: true },
      { title: "Vehari", id: "Vehari", color: "#94C600", selectable: true },
      { title: "Pakpattan", id: "Pakpattan", color: "#00B0F0", selectable: true },
      { title: "Ghizer", id: "Ghizer", color: "#00B0F0", selectable: true },
      { title: "Kech", id: "Kech", color: "#00B0F0", selectable: true },
      { title: "Ghanchi", id: "Ghanchi", color: "#00B0F0", selectable: true },
      { title: "Peshawar", id: "Peshawar", color: "#00B0F0", selectable: true },
      { title: "Bahawalnagar", id: "Bahawalnagar", color: "#00B0F0", selectable: true },
      { title: "Mianwali", id: "Mianwali", color: "#00B0F0", selectable: true },
      { title: "Multan", id: "Multan", color: "#00B0F0", selectable: true },
      { title: "Khushab", id: "Khushab", color: "#00B0F0", selectable: true },
      { title: "Nankana Sahib", id: "NankanaSahib", color: "#00B0F0", selectable: true },
      { title: "Lodhran", id: "Lodhran", color: "#00B0F0", selectable: true },
      { title: "Hyderabad", id: "Hyderabad", color: "#00B0F0", selectable: true },
      { title: "Swat", id: "Swat", color: "#00B0F0", selectable: true },
      { title: "Bannu", id: "Bannu", color: "#00B0F0", selectable: true },
      { title: "Chiniot", id: "Chiniot", color: "#00B0F0", selectable: true },
      { title: "FR Tank", id: "FRTank", color: "#00B0F0", selectable: true },
      { title: "FR Bannu", id: "FRBannu", color: "#00B0F0", selectable: true },
      { title: "Kohat", id: "Kohat", color: "#00B0F0", selectable: true },
      { title: "Tor Ghar", id: "TorGhar", color: "#00B0F0", selectable: true },
      { title: "Killa Saifullah", id: "KillaSaifullah", color: "#00B0F0", selectable: true },
      { title: "Buner", id: "Buner", color: "#00B0F0", selectable: true },
      { title: "Naushehro Feroze", id: "NaushehroFeroze", color: "#00B0F0", selectable: true },
      { title: "Sukkur", id: "Sukkur", color: "#00B0F0", selectable: true },
      { title: "Dera Ismail Khan", id: "DeraIsmailKhan", color: "#00B0F0", selectable: true },
      { title: "Mastung", id: "Mastung", color: "#00B0F0", selectable: true },
      { title: "Kharan", id: "Kharan", color: "#00B0F0", selectable: true },
      { title: "Gwadar", id: "Gwadar", color: "#00B0F0", selectable: true },
      { title: "Lower Dir", id: "LowerDir", color: "#00B0F0", selectable: true },
      { title: "Ziarat", id: "Ziarat", color: "#00B0F0", selectable: true },
      { title: "Dadu", id: "Dadu", color: "#00B0F0", selectable: true },
      { title: "Rahim Yar Khan", id: "RahimYarKhan", color: "#00B0F0", selectable: true },
      { title: "Larkana", id: "Larkana", color: "#00B0F0", selectable: true },
      { title: "Sibi", id: "Sibi", color: "#00B0F0", selectable: true },
      { title: "Bahawalpur", id: "Bahawalpur", color: "#00B0F0", selectable: true },
      { title: "Lakki Marwat", id: "LakkiMarwat", color: "#00B0F0", selectable: true },
      { title: "Orakzai agency", id: "Orakzaiagency", color: "#FFC000", selectable: true },
      { title: "Nushki", id: "Nushki", color: "#FFC000", selectable: true },
      { title: "Muzaffargarh", id: "Muzaffargarh", color: "#FFC000", selectable: true },
      { title: "Ghotki", id: "Ghotki", color: "#FFC000", selectable: true },
      { title: "Shaheed Benazirabad", id: "ShaheedBenazirabad", color: "#FFC000", selectable: true },
      { title: "Tando Allah Yar", id: "TandoAllahYar", color: "#FFC000", selectable: true },
      { title: "Zhob", id: "Zhob", color: "#FFC000", selectable: true },
      { title: "Hangu", id: "Hangu", color: "#FFC000", selectable: true },
      { title: "Sanghar", id: "Sanghar", color: "#FFC000", selectable: true },
      { title: "Diamir", id: "Diamir", color: "#FFC000", selectable: true },
      { title: "Upper Dir", id: "UpperDir", color: "#FFC000", selectable: true },
      { title: "Lasbela", id: "Lasbela", color: "#FFC000", selectable: true },
      { title: "Khairpur", id: "Khairpur", color: "#FFC000", selectable: true },
      { title: "Bajaur agency", id: "Bajauragency", color: "#FFC000", selectable: true },
      { title: "Jhal Magsi", id: "JhalMagsi", color: "#FFC000", selectable: true },
      { title: "Mohmand agency", id: "Mohmandagency", color: "#FFC000", selectable: true },
      { title: "Shikarpur", id: "Shikarpur", color: "#FFC000", selectable: true },
      { title: "Tank", id: "Tank", color: "#FFC000", selectable: true },
      { title: "Khyber agency", id: "Khyberagency", color: "#FFC000", selectable: true },
      { title: "Khuzdar", id: "Khuzdar", color: "#FFC000", selectable: true },
      { title: "Pishin", id: "Pishin", color: "#FFC000", selectable: true },
      { title: "Shangla", id: "Shangla", color: "#FFC000", selectable: true },
      { title: "Matiari", id: "Matiari", color: "#FFC000", selectable: true },
      { title: "Awaran", id: "Awaran", color: "#FFC000", selectable: true },
      { title: "Jacobabad", id: "Jacobabad", color: "#FFC000", selectable: true },
      { title: "Batagram", id: "Batagram", color: "#FFC000", selectable: true },
      { title: "Tharparkar", id: "Tharparkar", color: "#FFC000", selectable: true },
      { title: "Badin", id: "Badin", color: "#FFC000", selectable: true },
      { title: "Kambar-Shahdadkot", id: "KambarShahdadkot", color: "#FFC000", selectable: true },
      { title: "Panjgur", id: "Panjgur", color: "#FFC000", selectable: true },
      { title: "FR Peshawar", id: "FRPeshawar", color: "#FFC000", selectable: true },
      { title: "Kashmore", id: "KashmoreKandhkot", color: "#FFC000", selectable: true },
      { title: "Jaffarabad", id: "Jaffarabad", color: "#FFC000", selectable: true },
      { title: "Mirpurkhas", id: "Mirpurkhas", color: "#8F5201", selectable: true },
      { title: "Kalat", id: "Kalat", color: "#8F5201", selectable: true },
      { title: "Dera Ghazi Khan", id: "DeraGhaziKhan", color: "#8F5201", selectable: true },
      { title: "Sherani", id: "Sherani", color: "#8F5201", selectable: true },
      { title: "Tando Muhammad Khan", id: "TandoMuhammadKhan", color: "#8F5201", selectable: true },
      { title: "Rajanpur", id: "Rajanpur", color: "#8F5201", selectable: true },
      { title: "Umerkot", id: "Umerkot", color: "#8F5201", selectable: true },
      { title: "Jamshoro", id: "Jamshoro", color: "#8F5201", selectable: true },
      { title: "FR DI Khan", id: "FRDIKhan", color: "#8F5201", selectable: true },
      { title: "Barkhan", id: "Barkhan", color: "#8F5201", selectable: true },
      { title: "Chaghi", id: "Chaghi", color: "#8F5201", selectable: true },
      { title: "Loralai", id: "Loralai", color: "#8F5201", selectable: true },
      { title: "Thatta", id: "Thatta", color: "#8F5201", selectable: true },
      { title: "FR Lakki Marwat", id: "FRLakkiMarwat", color: "#8F5201", selectable: true },
      { title: "Kohistan", id: "Kohistan", color: "#8F5201", selectable: true },
      { title: "Harnai", id: "Harnai", color: "#8F5201", selectable: true },
      { title: "Kachhi", id: "Kachhi", color: "#8F5201", selectable: true },
      { title: "FR Kohat", id: "FRKohat", color: "#E08201", selectable: true },
      { title: "Kurram agency", id: "Kurramagency", color: "#E08201", selectable: true },
      { title: "Nasirabad", id: "Nasirabad", color: "#E08201", selectable: true },
      { title: "Washuk", id: "Washuk", color: "#E08201", selectable: true },
      { title: "Kohlu", id: "Kohlu", color: "#E08201", selectable: true },
      { title: "Sohbatpur", id: "Sohbatpur", color: "#E08201", selectable: true },
      { title: "Musakhail", id: "Musakhail", color: "#E08201", selectable: true },
      { title: "South Waziristan agency", id: "SouthWaziristanagency", color: "#E08201", selectable: true },
      { title: "Dera Bugti", id: "DeraBugti", color: "#E08201", selectable: true },
      { title: "Killa Abdullah", id: "KillaAbdullah", color: "#E08201", selectable: true },
      { title: "North Waziristan agency", id: "NorthWaziristanagency", color: "#E08201", selectable: true },
      { title: "Sujawal", id: "Sujawal", color: "#E08201", selectable: true },
      { title: "Lehri", id: "Lehri", color: "#E08201", selectable: true },
      { title: "disputed", id: "disputed", color: "#dddddd", selectable: true }

		
    ];

    map.dataProvider = dataProvider;
    map.write("mapdiv");


    map.addListener("clickMapObject", function (event) {
        if (event.mapObject.id != undefined && chartData[event.mapObject.id] != undefined) {
            chart.dataProvider = chartData[event.mapObject.id];
            chart.clearLabels();
            //chart.addLabel("0", "!20", event.mapObject.title, "center", 16);
			chart.addLabel(50, 40, "District:", "left", 15, "#000000", 0, 1, true);
			
			chart.addLabel(125, 38, event.mapObject.title, "left", 15, "#000000", 0, 1, true);
            chart.validateData();
			
			  var link = document.createElement("a");
  document.getElementById("maplink").innerHTML = "";
  //link.href = event.mapObject.id+".html"; 
  var districtid= event.mapObject.id;

  //alert (districtid);

    //window.location.href = "district.php?pg=" + districtid;
   
  link.href = "district.php?pg=" + districtid; //"district.php"; 
  //for url changes after click
               //window.location.hash = "?pg=" + districtid;
//  link.innerHTML = "District Details"+event.mapObject.id;
  link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>District Details</font>";
link.target="_blank";
  document.getElementById("maplink").appendChild(link);

        }
		

    });

});
//---------------punjab graph---------------------------------
function punjab(){
                 // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.punjab;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 80;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
               graph.balloonText = "[[value]]";
			   
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";
              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Punjab", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");
}
//---------------kp graph---------------------------------
function kp(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.kp;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 80;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";
              
			                graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Khyber Pakhtunkhwa", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");
}
//---------------sindh graph---------------------------------
function sindh(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.sindh;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";

              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Sindh", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");
}
//---------------balochistan graph---------------------------------
function balochistan(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.balochistan;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";

              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Balochistan", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");
}
//---------------ajk graph---------------------------------
function ajk(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.ajk;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";

              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Azad Jamu Kashmir", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");

}
//---------------gb graph---------------------------------
function gb(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.gb;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";

              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
			  
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Gilgit Baltistan", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");

}
//---------------fata graph---------------------------------
function fata(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.fata;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";
                            graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;
			  
  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "FATA", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");

}
//---------------ict graph---------------------------------
function ict(){
                // SERIAL CHART
                var chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData.ict;
                chart.categoryField = "district";
                chart.rotate = true;
                chart.color = "#000000";
                chart.handDrawn = false;
                chart.handDrawScatter = 4;

                // this line makes the chart to show image in the background
                //chart.backgroundImage = "images/bg.jpg";

                // sometimes we need to set margins manually
                // autoMargins should be set to false in order chart to use custom margin values
                chart.autoMargins = false;
                chart.marginTop = 20;
                chart.marginLeft = 5;
                chart.marginRight = 60;
                chart.startDuration = 2;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.labelsEnabled = false;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridAlpha = 0;
                valueAxis.axisAlpha = 0;
                valueAxis.labelsEnabled = false;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                //graph.balloonText = "[[category]]";
                graph.valueField = "numbers";
                graph.type = "column";
                graph.lineAlpha = 2;
                graph.fillAlphas = 0.8;
                // you can pass any number of colors in array to create more fancy gradients
                graph.fillColors = ["#FFC000", "#00B0F0"];
                graph.gradientOrientation = "horizontal";
               // graph.labelPosition = "inside";
              graph.labelText = "[[category]],[[value]]";
			  graph.fontSize = 10;

  //             graph.balloonText = "[[category]]: [[value]]";
                chart.addGraph(graph);


                // LABEL
                chart.addLabel(10, 5, "Islamabad", "left", 10, "#000000", 0, 1, true);

                chart.creditsPosition = "bottom-right";


                // WRITE
                chart.write("chartdiv5");
}

//-----------------GB-------------------------------
//var list = ['Lehri'];

//map.dataProvider = dataProvider;
function activateAreasGb(list) {
var list = ["Gilgit","Ghizer","Skardu","Ghanchi","Astor","HunzaNagar","Diamir"];
  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
 
}
//----------------------------KPK---------------------------
function activateAreasKp(list) {
var list = ["Abbottabad","Bannu","Batagram","Buner","Charsadda","Chitral","DeraIsmailKhan","Hangu","Haripur","Karak","Kohat","Kohistan","LakkiMarwat","LowerDir","Malakand","Mansehra","Mardan","Nowshera","Peshawar","Shangla","Swabi","Swat","Tank","UpperDir"];
  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
}
//-----------------------------------punjab------------------------------------------------------------
function activateAreasPn(list) {
var list = ["Rawalpindi","Attock","Bahawalnagar","Bahawalpur","Bhakkar","Chakwal","Chiniot","DeraGhaziKhan","Faisalabad","Gujranwala","Gujrat","Hafizabad","Jhang","Jhelum","Kasur","Khanewal","Khushab","Lahore","Layyah","Lodhran","MandiBahauddin","Mianwali","Multan","Muzaffargarh","NankanaSahib","Narowal","Okara","Pakpattan","RahimYarKhan","Rajanpur","Sahiwal","Sargodha","Sheikhupura","Sialkot","TobaTekSingh","Vehari"];
  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
}

//-----------------------------------Balochistan------------------------------------------------------------
function activateAreasBl(list) {
var list = ["Awaran","Barkhan","Bolan","Chaghi","DeraBugti","Gwadar","Harnai","Jaffarabad","JhalMagsi","Kalat","Kech","Kharan","Khuzdar","Kohlu","Lasbela","Loralai","Mastung","Musakhail","Nasirabad","Nushki","Panjgur","Pishin","KillaAbdullah","KillaSaifullah","Quetta","Sherani","Sibi","Washuk","Zhob","Ziarat"];

// list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
  
}

//-----------------------------------Sindh------------------------------------------------------------
function activateAreasSn(list) {
var list = ["Badin","Dadu","Ghotki","Hyderabad","Jacobabad","Jamshoro","KarachiCentral","Kashmore","Khairpur","Larkana","Matiari","Mirpurkhas","Sanghar","ShaheedBenazirabad","Shikarpur","Sukkur","TandoAllahYar","TandoMuhammadKhan","Tharparkar","Thatta","Umerkot","KambarShahdadkot","NaushehroFeroze"];

  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
}

//-----------------------------------FATA------------------------------------------------------------
function activateAreasFATA(list) {
var list = ["Kurramagency","Khyberagency","Mohmandagency","Bajuaragency","Orakzaiagency","NorthWaziristanagency","SouthWaziristanagency"];

  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
}

//-----------------------------------AJK------------------------------------------------------------
function activateAreasAJK(list) {
var list = ["Muzaffarabad","Bagh","Mirpur","Kotli","Bhimber","Poonch","Sudhnutti","Hattian","Neelum"];
  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
  

  
  
}
//-----------------------------------ICT------------------------------------------------------------
function activateAreasICT(list) {
var list = ["Islamabad"];

  // list is an array of area ids to make "enabled"
  for( var i = 0; i < map.dataProvider.areas.length; i++) {
 //alert ("for working!");
	var area = map.dataProvider.areas[i];
	if (list.indexOf(area.id) === -1) {
	// alert ("if working!");
      // area not in the list
      area.color = "#ccc";
      area.selectable = false;

    }
    else {
	 //alert ("if else working!");
      // area in the list
      area.color = "#94C600";
      area.selectable = true;
    }
  }
  map.validateData();
}
function activateAreasPak() {
window.location.href = "http://skillingpakistan.org/dmap/";
}
/*var list = ["disputed","Lehri"];
function activateAreas(list) {
alert ("demo text");
// list is an array of area ids to make "enabled"
for( var i = 0; i < map.dataProvider.areas; i++) {
alert ("demo text inside for "); 
var area = map.dataProvider[i];
if (list.indexOf(area.id) === -1) {
// area not in the list
area.color = "#ddd";
area.selectable = false;
}
else {
// area in the list
area.color = "#c55";
area.selectable = true;
}
}
map.validateData();
}
*/

</script>


<p style="padding-left:5px;"></p>
<!-- 00000000000000000000000000000000000000000000000 --> 
 <div id="legenddiv" style="border: 1px dotted #94C600; margin: 7px 0 1px 0;"></div>
</body>																			
</html>