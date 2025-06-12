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
         $get_district_id = $_GET["id"];
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
     $districts_table= get_table_by_type('districts','id',$get_district_id);
     //Districts
    $districts=mysqli_fetch_array($districts_table);
    $province=get_table_data('provinces',"id=".$districts['province_id']);
     $Vocational1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1');//Vocational
     $Technical1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2');//Technical
     $Vocational_m1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1','gender','1');//Vocational
     $Technical_m1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2','gender','1');//Technical
     $Vocational_f1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1','gender','2');//Vocational
     $Technical_f1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2','gender','2');//Technical
     $Vocational_co1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','1','gender','3');//Vocational
     $Technical_co1= get_table_by_type('institutes','district_id',$districts['id'],'1','institute_type','2','gender','3');
     //$Industry= get_table_by_type('industries_nsis','District',$districts['pg'],'1');//Technical
//     $condition_s1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','1');//Satisfactory
//     $condition_p1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','2');//Partially Satisfactory
//     $condition_n1= get_table_by_type('institutes','district_id',$districts['id'],'1','condition','3');//Not Satisfactory









$district_id = $_GET['id'];


$total_Institutess = "SELECT COUNT(*) AS total_count
          FROM institutes
          WHERE district_id = $district_id AND institute_type IS NOT NULL";
          
$Institutes = $db->query($total_Institutess);

if ($Institutes) {
    $institute = $Institutes->fetch_assoc();
    $total_Institutes = $institute['total_count'];
} else {
    $total_Institutes = 0; // Default to 0 if query fails
}


$jobss = "SELECT SUM(num_of_posts) AS total_count
          FROM jobs
          WHERE districtid = $district_id";
$jobs = $db->query($jobss);
if ($jobs) {
    $job = $jobs->fetch_assoc();
    $total_Jobs = $job['total_count'] ?? 0; // Use null coalescing operator for safety
} else {
    $total_Jobs = 0; // Default to 0 if query fails
}

$workforcee = "SELECT SUM(G_Total) AS total
               FROM nsis_demand_main
               WHERE district = (
                   SELECT name
                   FROM districts
                   WHERE id = $district_id
               )";

// Execute the query
$workforce = $db->query($workforcee);

if ($workforce) {
    // Fetch the result
    $workforc = $workforce->fetch_assoc();
    
    // Check if the result is not empty and retrieve 'total'
    $total_workforce = $workforc['total'] ?? 0; // Use null coalescing operator for safety
} else {
    $total_workforce = 0; // Default to 0 if the query fails
}



$query = "
    SELECT 
        Occupation AS Jobs, 
        SUM(Jobs_Availabe) AS Value
    FROM 
        PWD
    WHERE 
        District = (
            SELECT name
            FROM districts
            WHERE id = $district_id
        )
    GROUP BY 
        Occupation
";

$result = mysqli_query($db, $query); // Adjust this if you're using PDO
$data = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all results as an associative array

if (!empty($data)) {
    // Data exists, prepare it for the chart
    $labels = json_encode(array_column($data, 'Jobs'));
    $values = json_encode(array_column($data, 'Value'));
} else {
    $labels = json_encode([]);
    $values = json_encode([]);
}









$query = "SELECT COUNT(*) AS total_count
          FROM industries_nsis
          WHERE District = (
              SELECT name
              FROM districts
              WHERE id = $district_id
          )";
    
    $result = $db->query($query);
    
    if ($result) {
        $industry = $result->fetch_assoc();
        $total_industries = $industry['total_count'];
    } else {
        $total_industries = 0; // Default to 0 if query fails
    }


$query = "SELECT Sector AS sector_name, COUNT(*) AS employer_count
          FROM industries_nsis
          WHERE District = (
              SELECT name
              FROM districts
              WHERE id = $district_id
          )
          GROUP BY Sector
		  ORDER BY employer_count DESC
          LIMIT 10";
          
$result = $db->query($query);

if ($result) {
    // Array to store sector names and employer counts
    $sectors = [];

    // Fetching sector names and employer counts
    while ($row = $result->fetch_assoc()) {
        $sector_id = $row['sector_id'];
        $sector_name = $row['sector_name'];
 
        $employer_count = $row['employer_count'];
        $sectors[] = [
            'sector_id' => $sector_id,
            'sector_name' => $sector_name,
            'employer_count' => $employer_count,
            
        ];
    }


$queryy = "SELECT `Sub-sector` AS sector_name, SUM(G_Total) AS grand_total
           FROM nsis_demand_main
           WHERE District = (
               SELECT name
               FROM districts
               WHERE id = ?
           )
           GROUP BY `Sub-sector`"; // Group by sector name
           
$stmt = $db->prepare($queryy);
$stmt->bind_param("i", $district_id); // Assuming $district_id is an integer
	
$stmt->execute();
$resultt = $stmt->get_result();

if ($resultt) {
    // Array to store sector names and grand totals
    $sectorss = [];

    // Fetching sector names and grand totals
    while ($row = $resultt->fetch_assoc()) {
        $sector_name = $row['sector_name'];
        $grand_total = $row['grand_total'];
        $sectorss[] = [
            'sector_name' => $sector_name,
            'grand_total' => $grand_total,
        ];
    }

    // Output the array (for testing purposes)
   
} else {
    echo "Error: " . $db->error;
}

	

	
	
/* $queryTraineedata = "
	SELECT qualificaitonName AS Qualification_Name, SUM(totalCount) as Total_Count
    FROM traineedata_dp
    WHERE district = (
        SELECT name
        FROM districts
        WHERE id = $district_id
    )
	GROUP BY qualificaitonName
	ORDER BY Total_Count DESC
    LIMIT 10
";

// Execute the query
$resulttraine = $db->query($queryTraineedata);
$Trainees = [];
if ($resulttraine) {
    while ($row = $resulttraine->fetch_assoc()) {
        $qualificationName = $row['Qualification_Name'];
        $totalCount = $row['Total_Count'];
        $Trainees[] = [
            'Qualification_Name' => $qualificationName,
            'Total_Count' => $totalCount,
        ];
    }
} else {
    echo "Error executing query: " . $db->error;
}*/

	
	
	
	
	
	$queryTraineedata = "
	SELECT Course_Name AS Qualification_Name, COUNT(Student_Name) as Total_Count
    FROM ptevta_cbt_data_3900
    WHERE district = (
        SELECT name
        FROM districts
        WHERE id = $district_id
    )
	GROUP BY Course_Name
	ORDER BY Total_Count DESC
    LIMIT 8
";

// Execute the query
$resulttraine = $db->query($queryTraineedata);
$Trainees = [];
if ($resulttraine) {
    while ($row = $resulttraine->fetch_assoc()) {
        $qualificationName = $row['Qualification_Name'];
        $totalCount = $row['Total_Count'];
        $Trainees[] = [
            'Qualification_Name' => $qualificationName,
            'Total_Count' => $totalCount,
        ];
    }
} else {
    echo "Error executing query: " . $db->error;
}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
$comparisonquery = "
    SELECT 
        d.Sector,
        COALESCE(SUM(d.Grand_Total), 0) AS total_demand,
        COALESCE(SUM(s.total_supply), 0) AS total_supply,
        (COALESCE(SUM(d.Grand_Total), 0) - COALESCE(SUM(s.total_supply), 0)) AS difference
    FROM 
        (SELECT `Sub-sector` AS Sector, SUM(G_Total) AS Grand_Total, District
         FROM nsis_demand_main
         GROUP BY `Sub-sector`, District) d
    LEFT JOIN 
        (SELECT Sector, SUM(Total_Capacity) AS total_supply
         FROM sectorwisesupply
         GROUP BY Sector) s
    ON 
        d.Sector = s.Sector
    WHERE d.District = (
        SELECT name
        FROM districts
        WHERE id = $district_id
    )
    GROUP BY 
        d.Sector;
";
// Execute query
$resulttt = $db->query($comparisonquery);

if ($resulttt) {
    // Array to store the data
    $comparisonData = [];

    // Fetching data
    while ($row = $resulttt->fetch_assoc()) {
        $comparisonData[] = [
            'sector' => $row['Sector'],
            'total_demand' => $row['total_demand'],
            'total_supply' => $row['total_supply'],
            'difference' => $row['difference']
        ];
    }

    // Close the connection
  
} else {
    echo "Error: " . $db->error;
}
	
	
	
	
	
	
	
	$demographyQuery = "SELECT *
          FROM demography
          WHERE District = (
              SELECT name
              FROM districts
              WHERE id = $district_id
          )";
    
    $demographyResult = $db->query($demographyQuery);
    
    if ($demographyResult) {
        $demography = $demographyResult->fetch_assoc();
    } else {
        $demography = 0; // Default to 0 if query fails
    }
	
	
		$eprofileQuery = "SELECT *
          FROM economicprofile
          WHERE District = (
              SELECT name
              FROM districts
              WHERE id = $district_id
          )";
    
    $eprofileResult = $db->query($eprofileQuery);
    
    if ($eprofileResult) {
        $economicProfile = $eprofileResult->fetch_assoc();
    } else {
        $economicProfile = 0; // Default to 0 if query fails
    }


	
	
	
	
	
	
	
	
	
	
	
	


     $Vocational=$Vocational1['total'];//Vocational
     $Technical= $Technical1['total'];//Technical
     $Vocational_m=$Vocational_m1['total']; //Vocational
     $Technical_m=$Technical_m1['total']; //Technical
     $Vocational_f=$Vocational_f1['total']; //Vocational
     $Technical_f= $Technical_f1['total']; //Technical
     $Vocational_co=$Vocational_co1['total']; //Vocational
     $Technical_co=$Technical_co1['total']; //Technical

//     $i_where='district_id='.$districts['id']." AND institute_type=";
//echo rec_count('institutes',$i_where.'1');exit;
//     $condition_s=$condition_s1['total']; //Satisfactory
//     $condition_p=$condition_p1['total']; //Partially Satisfactory
//     $condition_n=$condition_n1['total']; //Not Satisfactory
$condition_where="`district_id` = ".$districts['id']." AND `condition` = ";
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
FROM institutes i,batches b WHERE  b.institute_id=i.user_id AND i.district_id=".$districts['id']);
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

   ?>
<?php
function format_number($number) {
    // Check if the value already contains a comma
    if (strpos($number, ',') !== false) {
        return $number; // Already formatted, return as is
    } else {
        return number_format((float) $number); // Apply number_format() if not formatted
    }
}
?>
<head>

    <meta charset="utf-8">
    <title><?=$get_district?> Details Page</title>
 

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
    
    <style>
         ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            font-weight: bold;
            padding: 8px 0;
            color : #0093AF;
            border-bottom: 1px solid #ddd;
        }
        .pagination {
            margin: 20px 0;
        }
        .pagination a {
            text-decoration: none;
            color: #0093AF;
            padding: 8px 16px;
            border: 1px solid #ddd;
            margin: 0 4px;
            border-radius: 4px;
            font-weight: bold;
        }
        .pagination a.active {
            background-color: #0093AF;
            color: #fff;
        }
        .pagination a:hover {
            background-color: #0056b3;
            color: #fff;
        }
         .chart-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          
            margin: 10px auto;
            padding: 5px;
        }
		
		
		
		
	.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  width: 205px;
  height: 300px;
  margin: 15px;
  float: left;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-header {
  padding: 15px;
  text-align: center;
  background-color: #f7f7f7;
  animation: slideDown 0.5s ease-in-out;
}

.card-header img {
  max-width: 100%;
  height: auto;
}

.card-content {
  padding: 15px;
  height: 300px;
  color: #fff;
  text-align: center;
}

.card-content h3 {
  margin: 0 0 10px;
  font-size: 16px;
  text-transform: uppercase;
  animation: fadeIn 0.5s ease-in-out;
}

.card-content p {
  margin: 0;
  font-size: 14px;
  animation: countAnimation 2s ease-in-out;
}

.card-content a {
  color: white;
  text-decoration: none;
  transition: color 0.3s;
}

.card-content a:hover {
  color: #ddd;
}

.card-link {
  text-decoration: none;
  color: inherit;
  display: block;
}

@keyframes slideDown {
  from {
    transform: translateY(-20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.turquoise {
  background-color: #1abc9c;
}

.green-sea {
  background-color: #16a085;
}

.emerald {
  background-color: #2ecc71;
}

.nephritis {
  background-color: #27ae60;
}

.peter-river {
  background-color: #3498db;
}

.belize-hole {
  background-color: #2980b9;
}

.amethyst {
  background-color: #9b59b6;
}

.wisteria {
  background-color: #8e44ad;
}

		
/* General container and card styles */
.conditional-card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 20px;
}

.conditional-card {
    border-radius: 16px;
    overflow: hidden;
    width: 100%; /* Increased width */
    margin: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    position: relative;
    color: #fff; /* Text color for contrast */
    opacity: 0; /* Start hidden */
    transform: scale(0.9); /* Start slightly smaller */
    animation: fadeIn 1s forwards; /* Fade in and scale up */
}

.conditional-card:nth-child(1) {
    animation-delay: 0.2s; /* Stagger animation */
}
.conditional-card:nth-child(2) {
    animation-delay: 0.4s; /* Stagger animation */
}

/* Hover effects */
.conditional-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
}

/* Card body */
	.conditional-card-body {
    padding: 20px;
    position: relative;
    z-index: 1;
    border-radius: 16px;
    overflow: hidden;
}
		
	.conditional-card-body-grw {
    padding: 20px;
    position: relative;
    z-index: 1;
    border-radius: 16px;
    overflow: hidden;
}

.conditional-card-body-grw::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('img/grw.png'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    border-radius: 16px; /* Match the border-radius of the parent */
    opacity: 0.5; /* Adjust opacity as needed */
    z-index: -1; /* Ensure the overlay stays behind the content */
}
		
		
	.conditional-card-body-lhr {
    padding: 20px;
    position: relative;
    z-index: 1;
    border-radius: 16px;
    overflow: hidden;
}

.conditional-card-body-lhr::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('img/lahore.png'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    border-radius: 16px; /* Match the border-radius of the parent */
    opacity: 0.5; /* Adjust opacity as needed */
    z-index: -1; /* Ensure the overlay stays behind the content */
}
	
		.conditional-card-body-slk {
    padding: 20px;
    position: relative;
    z-index: 1;
    border-radius: 16px;
    overflow: hidden;
}

.conditional-card-body-slk::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('img/sialkot.png'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    border-radius: 16px; /* Match the border-radius of the parent */
    opacity: 0.5; /* Adjust opacity as needed */
    z-index: -1; /* Ensure the overlay stays behind the content */
}
		
		
		
		
.conditional-card-body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('<?php echo htmlspecialchars($demography['Image']); ?>'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    border-radius: 16px; /* Match the border-radius of the parent */
    opacity: 0.5; /* Adjust opacity as needed */
    z-index: -1; /* Ensure the overlay stays behind the content */
}
	

/* Card title */
.conditional-card-title {
    font-size: 1.75em;
    margin-bottom: 16px;
    text-align: center;
    font-weight: bold;
    text-shadow: 3px 3px 10px black; /* Enhanced shadow */
}

/* Text and icon content */
.conditional-card-text {
    display: flex;
    align-items: center;
    font-size: 1.1em;
    margin-top: 15px;
    line-height: 1.5;
    text-shadow: 2px 2px 10px black; /* Text shadow */
}

.conditional-card:hover .conditional-card-text {
    font-weight: bold;
}

.icon-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-right: 10px;
    width: 50px;
    opacity: 0; /* Start hidden */
    transform: scale(0.9); /* Start slightly smaller */
    animation: fadeIn 1s forwards; /* Fade in and scale up */
}

.conditional-card:nth-child(1) .icon-content {
    animation-delay: 0.3s; /* Stagger animation */
}
.conditional-card:nth-child(2) .icon-content {
    animation-delay: 0.5s; /* Stagger animation */
}

.text-content {
    flex: 1;
    display: flex;
    margin-left: 19px;
    justify-content: space-between;
}

/* Colorful backgrounds */
.demography-card {
    background: linear-gradient(145deg, #4e91e6, #2a7ac0); /* Vibrant blue */
}

.economic-card {
    background: linear-gradient(145deg, #ff6b6b, #c0392b); /* Vibrant red */
}

/* Adding a subtle overlay */
.conditional-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.1);
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 0;
}

.conditional-card:hover::before {
    opacity: 0.3; /* Slightly more visible overlay */
}

/* Adding a pulse effect on hover */
.icon-content i {
    transition: transform 0.2s, box-shadow 0.2s;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); /* Icon shadow */
}

.conditional-card:hover .icon-content i {
    transform: scale(1.2); /* Slightly enlarge the icon on hover */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); /* Enhanced shadow on hover */
}

/* Keyframes for animations */
@keyframes fadeIn {
    to {
        opacity: 1;
        transform: scale(1);
    }
}

		
		
		
		
		
		
		.demo-panel-title {
    text-align: center;
			
 
}

.line {
    height: 2px;
    background-color: #008B8B;
    margin-bottom: 20px;
}

/* Flexbox container for charts */
.charts-wrapper {
    display: flex;
    justify-content: space-around; /* Adjust as needed */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    margin: 20px;
}

/* Chart container styling */
.chart-container {
    flex: 1; /* Allow containers to grow and shrink */
    min-width: 400px; /* Minimum width to ensure readability */
    margin: 0 20px; /* Space between charts */
    text-align: center;
}

/* Ensuring canvas elements take full width of the container */
.chart-container canvas {
    width: 100%;
    height: 500px;
}

/* Paragraph styling for sources */
.chart-container p {
    color: #008B8B;
    margin-top: 10px;
    text-align: center;
}
		
		
		
		
		
	
.tabs {
    display: flex;
    width: 100%;
}

.tab {
    flex: 1;
	margin-left : 5px;
    padding: 15px;
    border: none;
    background-color: #006374;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}
		
		
		.introtab {
    flex: 1;
	margin-left : 5px;
    padding: 15px;
    border: none;
    background-color: #006374;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-align: center;
}

.tab:hover {
    background-color: #004d56;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    max-width: 80%;
    max-height: 80%;
    overflow-y: auto;
}

.popup .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

#popup-content {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
		
		
	
		
		
		
		.intro-popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.intro-popup-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}



.introtab:hover {
    background-color: #004d56;
}
		
		 .custom-pre {
  width: 100%; /* Adjust as needed */
        white-space: pre-wrap; /* Ensures text wraps to the next line */
        word-wrap: break-word; /* Forces long words to wrap */
        overflow-wrap: break-word; /* Additional word wrapping support */
        font-family: 'Roboto', 'Helvetica', 'Arial', sans-serif; /* Modern, readable font */
        font-size: 18px; /* Adjust the font size for readability */
        line-height: 1.6; /* Improves readability by increasing line height */
        border: 1px solid #ddd; /* Optional: add a border */
        padding: 10px; /* Adds space inside the element */
        box-sizing: border-box; /* Ensures padding is included in the width */
        background-color: #f9f9f9; /* Light background for a better contrast */
        color: #333; /* Darker text color for better readability */
        border-radius: 5px; /* Rounded corners for a modern look */
    }
		.demo-swatches-row .swatches-col {
    width: 1000;
    margin-left: -5px;
}
.custom{
	  width: 800px!important;
		}
		.pallete-item {
    float: left;
    width: 235px;
    margin: 0 0 15px 15px;
}
		.pallete-teach {
    float: left;
    width: 251px!important;
    margin: 0 0 15px 15px;
}
	.palette dd {
    margin-left: 0;
    font-weight: bold;	
		}
	.icon-sm {
    width: 29px;
    height: 29px;
    margin-bottom: 8px;
    margin-right: 0px;
    vertical-align: middle;
}
.demo-panel-title {
    padding-top: 0px;
    margin: 15px 0 14px!important;
    font: bold 33px / 40px "Helvetica Neue", Helvetica, Arial, sans-serif;
}
		.palette {
    padding: 15px;
    margin: 0;
    font-size: 15px;
    line-height: 1.214;
    color: #fff;
    text-transform: uppercase;
}
		.pallete-itemmineshift {
    float: left;
    width: 424px;
    margin: 0 0 15px 15px;
    border: thin;
    border-style: dotted;
    border-color: #000000;
}
		
		
		
		
		.translate-button .goog-te-gadget-simple {
    background-color: #9BCA5B; /* Button background color */
    color: white; /* Text color */
    height: 40px; /* Set a fixed height for alignment */
    line-height: 40px; /* Vertically center the text */
    border: none;
			 letter-spacing: 2px;
   /* border-radius: 20px;*/
    font-size: 14px;
			margin-bottom :5px;
    cursor: pointer;
    display: inline-flex;
    align-items: center; /* Align items in the center */
    justify-content: center; /* Center text horizontally */
    padding: 0 20px; /* Horizontal padding */
    transition: background-color 0.3s ease;
}

/* Change color on hover */
.translate-button .goog-te-gadget-simple:hover {
    background-color: #98b66f;
}

/* Remove extra spacing and color adjustments inside Google Translate */
.goog-te-gadget-simple .goog-te-menu-value span {
    color: #fff;
    font-weight: bold;
    line-height: 1;
	 letter-spacing: 2px;/* Reset line-height inside span */
}

/* Hide the Google Translate icon */
.goog-te-gadget-icon {
    display: none; /* Hides Google Translate icon */
}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>

<div style="text-align: right; margin: 10px; display:none!important;">
    <button id="exportPdfBtn" class="btn btn-primary ">Export to PDF</button>
</div>

  <div class="container">
      <div class="demo-headline">
		<h1 class="demo-logo">

          <div style="border:dotted; border-width:thin; background:#ecf0f1; border-radius: 25px;">
		  <?php echo $get_district//$row['district'] ?>
          <small><?php echo $province['name'] ?></small>
		  <div id="google_translate_element" class="translate-button"></div>
        </div>
		</h1>
     
	  </div> <!-- /demo-headline -->
	   <?php if ($demography != null): ?>
	  <div class="tabs">
	  <button class="introtab"  id="openIntroPopup">Introduction</button>
	  </div>
<div id="IntroPopup" class="intro-popup">
    <div class="intro-popup-content">
        <span class="close">&times;</span>
        <h2 align="center">INTRODUCTION</h2>
        <pre class="custom-pre">
           <?php echo $demography['Introduction'] ?>
        </pre>
    </div>
</div>

	   <?php endif; ?>
	
	  
  <?php if ($demography != null): ?>
    <div class="conditional-card-container">
        <div class="conditional-card demography-card">
            <div class="conditional-card-body">
                <h5 class="conditional-card-title"><i class="fas fa-users"></i> Demography</h5>
                <div class="conditional-card-text">      
                    <div class="icon-content">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="text-content">
                        <strong>Population:</strong>
                        <span ><?php echo format_number($demography['Population']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text"> 
                    <div class="icon-content">
                        <i class="fas fa-chart-area"></i>
                    </div>
                    <div class="text-content">
                        <strong>Population Density per Sq. Km:</strong>
                        <span><?php echo htmlspecialchars($demography['PopulationDensity']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="text-content">
                        <strong>Urban Population:</strong>
                        <span><?php echo format_number($demography['UrbanPopulation']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <div class="text-content">
                        <strong>Rural Population:</strong>
                        <span><?php echo format_number($demography['RuralPopulation']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="text-content">
                        <strong>Male:</strong>
                        <span><?php echo format_number($demography['Male']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-female"></i>
                    </div>
                    <div class="text-content">
                        <strong>Female:</strong>
                        <span><?php echo format_number($demography['Female']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-transgender"></i>
                    </div>
                    <div class="text-content">
                        <strong>Transgender:</strong>
                        <span><?php echo format_number($demography['Transgender']); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="conditional-card economic-card">
            <div class="conditional-card-body">
                <h5 class="conditional-card-title"><i class="fas fa-industry"></i> Economic Profile</h5>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="text-content">
                        <strong>Total Industrial Units:</strong>
                        <span><?php echo format_number($economicProfile['IndustrialUnits']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="text-content">
                        <strong>Direct Employment:</strong>
                        <span><?php echo format_number($economicProfile['DirectEmployment']); ?></span>
                    </div>
                </div>
                <div class="conditional-card-text">
                    <div class="icon-content">
                        <i class="fas fa-tasks"></i>
                    </div>
                     <div class="text-content" style="margin-top : 20px;">
                        <strong style="margin-right : 70px;">Occupations:</strong>
                        <span><?php echo htmlspecialchars($economicProfile['Occupations']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>';
	  
	   <?php endif; ?>
	  
   <?php if ($get_district == 'Faisalabad'): ?>
        <div class="tabs">
            <button class="tab" data-info="education">Education</button>
            <button class="tab" data-info="climate">Climate</button>
			<button class="tab" data-info="agriculture">Agriculture</button>
        </div>

        <div id="popup" class="popup">
            <span class="close">&times;</span>
            <div id="popup-content"></div>
        </div>
    <?php endif; ?>
	

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	
	  
	  
	  
	  
	  
	  
	  
	  
	 
			<a href="total_industry_district.php?district=<?php echo $district_id ?>" class="card-link">
  <div class="card">
    <div class="card-header turquoise">
      <img src="img/industries_logo.png" alt="Industries Logo" />
    </div>
    <div class="card-content green-sea">
      <h3>Total Industry</h3>
      <p class="count" data-count="<?php echo $total_industries; ?>"><?php echo $total_industries; ?></p>
    </div>
  </div>
</a>

<a href="work_force_demand.php?district=<?php echo $district_id ?>" class="card-link">
  <div class="card">
    <div class="card-header emerald">
      <img src="img/work_force.png" alt="Work Force Logo" />
    </div>
    <div class="card-content nephritis">
      <h3>WorkForce Demand</h3>
      <p class="count" data-count="<?php echo $total_workforce; ?>"><?php echo $total_workforce; ?></p>
    </div>
  </div>
</a>

<a href="Job_data_district.php?district=<?php echo $district_id ?>" class="card-link">
  <div class="card">
    <div class="card-header peter-river">
      <img src="img/Job_Logo.png" alt="Job Logo" />
    </div>
    <div class="card-content belize-hole">
      <h3>Jobs</h3>
      <p class="count" data-count="<?php echo $total_Jobs; ?>"><?php echo $total_Jobs; ?></p>
    </div>
  </div>
</a>

<div class="card">
  <div class="card-header amethyst">
    <img src="img/institutes_logo.png" alt="Institutes Logo" />
  </div>
  <div class="card-content wisteria">
    <h3>Total Institute</h3>
    <p class="count" data-count="<?php echo $total_Institutes; ?>"><?php echo $total_Institutes; ?></p>
  </div>
</div>


	  
	  
	  
	  
<h3 class="demo-panel-title" style="margin-top : 300px;">Industry </h3> 
	 <div class="line"></div><br>
    
<?php
echo "<style>";
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



foreach ($sectors as $sector) {
    $sector_id = $sector['sector_id'];
    $sector_name = $sector['sector_name'];
    $employer_count = $sector['employer_count'];
    $encoded_sector_name = urlencode($sector_name); // Encode the sector name for URL

  
}




} else {
    echo "Error executing query: " . $db->error;
}
    ?>
	  
	  <div class="chart-container">
        <canvas id="sectorChart"></canvas>
		<p style="text-align: center;color: #008B8B; margin-top : 10px;">Source : Employer Skill Survey 2024</p>
    </div>
	  
	  
	


  <div class="chart-container" style="margin-top : 30px;">
	   <h3 class="demo-panel-title" style="margin-top : 30px;">Workforce Demand for 2024-2025 </h3> 
<div class="line"></div>
<br>
    <canvas id="sectorChartt"></canvas>
    <p style="text-align: center;color: #008B8B; margin-top : 10px;">Source : Employer Skill Survey 2024</p>
  </div>

  <div class="chart-container" style="margin-top : 30px;">
	  <h3 class="demo-panel-title" style="margin-top : 30px;">Enrollments</h3> 

	
<div class="line"></div>
<br>
    <canvas id="traineesChart"></canvas>
	   <?php if ($province['name'] == 'Punjab'): ?>
    <p style="text-align: center;color: #008B8B; margin-top : 10px;">Source : Punjab Skill Development Authority 2023</p>
	    <?php endif; ?>
  </div>

	    <div class="chart-container" style="margin-top : 30px;">
	  <h3 class="demo-panel-title" style="margin-top : 30px;">Jobs - Marginalize Group </h3> 
	 <div class="line"></div><br>
	 <canvas id="occupationChart" style="display: none; "></canvas>
	  </div>
	  <?php
// Example district name
if ($get_district == 'Faisalabad') {
    echo '
	  <h3 class="demo-panel-title" style="margin-top : 30px;">Sector Wise Demand/Supply </h3> 
	   <div class="line"></div><br>
	    <div class="chart-container">
	    <canvas id="comparisonChart"></canvas>
	  </div>
	  
	 ' ;
}
?>
<!-- .......................... -->
<h3 class="demo-panel-title">
    <img src="img/edu.png" alt="Education Icon" class="icon-sm" />
    Institute
</h3>
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
              $shift_where="district_id = ".$districts['id']." AND shift = ";
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
		
		  
		  	     
      </div> <!-- /swatches row -->

<!-- ........................... -->


<h3 class="demo-panel-title">Teachers</h3>
<div class="line"></div><br>
      <div class="row demo-swatches-row">
	      <div class="swatches-col custom">
		      	      <div class="pallete-item pallete-teach">
			      <dl class="palette palette-sun-flower">
              <dt><p align="center"><img src="img/tea.png" width="36" height="62"></p></dt>

            </dl>
            <dl class="palette palette-orange">
              <dt>Total Teaching staff</dt>
              <dd><?php echo $row['male_staff']+$row['female_staff'];//$row['total_teaching_staff'] ?></dd>
            </dl>
		      </div>
			  
		      <div class="pallete-item pallete-teach">
			      <dl class="palette palette-turquoise">
                <dt><p align="center"><img src="img/maleicon.png" width="28" height="62"></p></dt>

              </dl>
              <dl class="palette palette-green-sea">
                <dt>Male Staff</dt>
                <dd><?php echo $row['male_staff'] ?></dd>
              </dl>
		      </div>
		      <div class="pallete-item pallete-teach">
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

<!--
<div class="container">
    <div style="border:dotted; border-width:thin; background:#ecf0f1; width:100%; margin-bottom:15px;">
        <h3 class="demo-panel-title" align="center">Building Condition</h3>
        <div class="line"></div><br>

        <div class="row demo-swatches-rowmine" align="center">
            <div class="swatches-col">

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
                    // $cond_p=$condition_p/$condition;
                    // $cond_p=$cond_p*100;

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
                        <dd><?php  $v1=get_table_by_type('institutes','district_id',$districts['id'],'1','library','1');echo percent($row['Totalinstitutes'],$v1['total'])."%" ;//$row['library_facility'] ?></dd>
                    </dl>
                    <dl class="palette palette-green-sea">
                        <dd><p align="center"><img src="img/aid.png" width="60" height="60"></p></dd>
                        <dt>First Aid Kit</dt>
                        <dd><?php $v2= get_table_by_type('institutes','district_id',$districts['id'],'1','first_aid','1');echo percent($row['Totalinstitutes'],$v2['total'])."%" ;//$row['first_aid_kit'] ?></dd>
                    </dl>

                </div>
                <div class="pallete-itemmine">

                    <dl class="palette palette-emerald">
                        <dt><p align="center"><img src="img/drinking.png" width="50" height="70"></p></dt>
                        <dt>Drinking water</dt>
                        <dd><?php $v3= get_table_by_type('institutes','district_id',$districts['id'],'1','drinking_water','1');echo percent($row['Totalinstitutes'],$v3['total'])."%" ;//$row['drinking_water'] ?></dd>

                    </dl>

                    <dl class="palette palette-nephritis">
                        <dt><p align="center"><img src="img/power.png" width="50" height="70"></p></dt>
                        <dt>Electricity</dt>
                        <dd><?php $v4= get_table_by_type('institutes','district_id',$districts['id'],'1','electricity','1');echo percent($row['Totalinstitutes'],$v4['total'])."%" ;//$row['electricity'] ?></dd>

                    </dl>
                    <dl class="palette palette-emerald">
                        <dt><p align="center"><img src="img/pwricon.png" width="100" height="50"></p></dt>
                        <dt>Back up source of electricity</dt>
                        <dd><?php $v5= get_table_by_type('institutes','district_id',$districts['id'],'1','backupsource','1');echo percent($row['Totalinstitutes'],$v5['total'])."%" ;//$row['backup_source_of_electricity'] ?></dd>

                    </dl>
                    <dl class="palette palette-nephritis">
                        <dt><p align="center"><img src="img/Sports-Running.png" width="70" height="70"></p></dt>
                        <dt>Sports facility</dt>
                        <dd><?php $v6= get_table_by_type('institutes','district_id',$districts['id'],'1','sports','1');echo percent($row['Totalinstitutes'],$v6['total'])."%" ;//$row['sport_facility'] ?></dd>

                    </dl>

                </div>
                <div class="pallete-itemmine">

                    <dl class="palette palette-peter-river">
                        <dt><p align="center"><img src="img/toilet.png" width="70" height="70"></p></dt>
                        <dt>Toilet</dt>
                        <dd><?php $v7= get_table_by_type('institutes','district_id',$districts['id'],'1','toilets','1');echo percent($row['Totalinstitutes'],$v7['total'])."%" ;//$row['toilet'] ?></dd>
                    </dl>
                    <dl class="palette palette-belize-hole">
                        <dt><p align="center"><img src="img/hostel.png" width="60" height="70"></p></dt>
                        <dt>Hostel facility</dt>
                        <dd><?php $v8= get_table_by_type('institutes','district_id',$districts['id'],'1','hostel','1');echo percent($row['Totalinstitutes'],$v8['total'])."%" ;//$row['hostel_facility'] ?></dd>
                    </dl>
                    <dl class="palette palette-peter-river">
                        <dt><p align="center"><img src="img/TRANSPORT.png" width="100" height="50"></p></dt>
                        <dt>Transport facility</dt>
                        <dd><?php $v9= get_table_by_type('institutes','district_id',$districts['id'],'1','transport','1');echo percent($row['Totalinstitutes'],$v9['total'])."%" ;//$row['transport_facility'] ?></dd>
                    </dl>
                    <dl class="palette palette-belize-hole">
                        <dt><p align="center"><img src="img/wifi.png" width="70" height="70"></p></dt>
                        <dt>Internet facility</dt>
                        <dd><?php $v10= get_table_by_type('institutes','district_id',$districts['id'],'1','internet','1');echo percent($row['Totalinstitutes'],$v10['total'])."%" ;//$row['internet_facility'] ?></dd>
                    </dl>

                </div>

            </div>
        </div>

    </div>
</div>
-->

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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


 <script>
document.getElementById('exportPdfBtn').addEventListener('click', async function () {
    const { jsPDF } = window.jspdf;

    const pdf = new jsPDF('p', 'mm', 'a4');
    const pageHeight = pdf.internal.pageSize.height; 
    let yOffset = 0; 

    document.body.style.cursor = 'progress';

    const sections = document.querySelectorAll('.chart-container, .conditional-card, .demo-panel-title');

    for (const section of sections) {
        const canvas = await html2canvas(section, {
            scale: 2, 
            useCORS: true, 
            scrollY: 0 
        });

        const imgData = canvas.toDataURL('image/png');
        const imgWidth = 210; 
        const imgHeight = (canvas.height * imgWidth) / canvas.width; 

        if (yOffset + imgHeight > pageHeight) {
            pdf.addPage(); 
            yOffset = 0; 
        }

        pdf.addImage(imgData, 'PNG', 0, yOffset, imgWidth, imgHeight);
        yOffset += imgHeight; 
    }

    document.body.style.cursor = 'default';

    pdf.save('enhanced_report.pdf');
});






        // Convert PHP array to JavaScript array
        const sectorsData = <?php echo json_encode($sectors); ?>;

        // Debugging output to verify data
        console.log('Sectors Data:', sectorsData);

        // Sort sectorsData by employer_count in descending order
        sectorsData.sort((a, b) => b.employer_count - a.employer_count);

        // Wait until the document is fully loaded
        document.addEventListener('DOMContentLoaded', (event) => {
            const ctx = document.getElementById('sectorChart').getContext('2d');

            // Extract sector names and employer counts for chart
            const sectorNames = sectorsData.map(sector => sector.sector_name);
            const employerCounts = sectorsData.map(sector => sector.employer_count);

            // Generate a colorful gradient for the bars
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(255, 99, 132, 0.6)');
            gradient.addColorStop(0.5, 'rgba(54, 162, 235, 0.6)');
            gradient.addColorStop(1, 'rgba(75, 192, 192, 0.6)');

            // Create clickable links on click of chart bars
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: sectorNames,
                    datasets: [{
                        label: 'Number of Industries',
                        data: employerCounts,
                        backgroundColor: gradient,
                        borderColor: 'rgba(0, 0, 0, 0.1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // Display bars horizontally
                    onClick: (event, chartElement) => {
                        if (chartElement.length > 0) {
                            const index = chartElement[0].index;
                            const sectorName = encodeURIComponent(sectorNames[index]);
                            console.log('Clicked Index:', index);
                            console.log('Clicked Sector:', sectorName);
                            const url = `employers_data.php?district=<?php echo $district_id ?>&sector=${sectorName}`;
                            console.log('Target URL:', url);
                            window.open(url, '_blank');
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            display: true,
                            anchor: 'end',
                            align: 'end',
                            color: 'rgba(0, 0, 0, 0.7)',
                            font: {
                                weight: 'bold'
                            },
                            formatter: function(value) {
                                return value;
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
        });
    </script>

<script>
    // Sample data - Replace this with your PHP data
    const sectors = <?php echo json_encode($sectorss); ?>;

    // Extract sector names and grand totals
    let sectorData = sectors.map(sector => ({
        name: sector.sector_name,
        total: sector.grand_total
    }));

    // Sort data in descending order by grand total
    sectorData.sort((a, b) => b.total - a.total);

    // Separate the sorted data into names and totals
    const sectorNames = sectorData.map(sector => sector.name);
    const grandTotals = sectorData.map(sector => sector.total);

    // Define a color palette
    const colors = [
        'rgba(75, 0, 130, 0.8)', // Dark Indigo
        'rgba(0, 0, 139, 0.8)',  // Dark Blue
        'rgba(139, 0, 0, 0.8)',   // Dark Red
        'rgba(0, 100, 0, 0.8)',   // Dark Green
        'rgba(139, 69, 19, 0.8)',  // Saddle Brown
        'rgba(128, 0, 128, 0.8)',  // Purple
        'rgba(255, 69, 0, 0.8)'    // Orange Red
    ];

    const borderColors = [
        'rgba(75, 0, 130, 1)', // Dark Indigo
        'rgba(0, 0, 139, 1)',  // Dark Blue
        'rgba(139, 0, 0, 1)',   // Dark Red
        'rgba(0, 100, 0, 1)',   // Dark Green
        'rgba(139, 69, 19, 1)',  // Saddle Brown
        'rgba(128, 0, 128, 1)',  // Purple
        'rgba(255, 69, 0, 1)'    // Orange Red
    ];

    // Generate background and border colors
    const backgroundColors = [];
    const borderColorArray = [];
    for (let i = 0; i < sectorNames.length; i++) {
        backgroundColors.push(colors[i % colors.length]);
        borderColorArray.push(borderColors[i % borderColors.length]);
    }

    // Create the chart
    const ctx = document.getElementById('sectorChartt').getContext('2d');
    const sectorChart = new Chart(ctx, {
        type: 'bar', // Bar chart type
        data: {
            labels: sectorNames,
            datasets: [{
                label: 'Total',
                data: grandTotals,
                backgroundColor: backgroundColors,
                borderColor: borderColorArray,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            indexAxis: 'y', // Horizontal bar chart
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false // Disable the legend
                },
                tooltip: {
                    enabled: true
                },
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    color: '#000',
                    font: {
                        weight: 'bold'
                    },
                    formatter: (value) => value // Display values on the bar
                }
            },
            onClick: (e, elements) => {
                if (elements.length > 0) {
                    const index = elements[0].index;
					console.log(index);
                    const sector = sectorNames[index];
                    const url = `work_force_sector.php?district=<?php echo $district_id ?>&sector=${encodeURIComponent(sector)}`;
                    window.location.href = url;
                }
            }
        },
        plugins: [ChartDataLabels] // Enable ChartDataLabels plugin
    });
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
  const counters = document.querySelectorAll(".count");
  counters.forEach(counter => {
    counter.innerText = "0";
    const updateCounter = () => {
      const target = +counter.getAttribute("data-count");
      const current = +counter.innerText;
      const increment = target / 200;
      
      if(current < target) {
        counter.innerText = `${Math.ceil(current + increment)}`;
        setTimeout(updateCounter, 1);
      } else {
        counter.innerText = target;
      }
    };
    updateCounter();
  });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Convert PHP array to JavaScript
        const traineesData = <?php echo json_encode($Trainees); ?>;
        
        // Debugging: Print the data to the console
        console.log(traineesData);
        
        // Prepare data for the chart
        const labels = traineesData.map(item => {
            const words = item.Qualification_Name.split(' ');
            const filteredWords = words.filter(word => word.toLowerCase() !== 'total'); // Remove the word 'total'
            const lastThreeWords = filteredWords.slice(-3).join(' '); // Get last 3 words and join them back into a string
            return lastThreeWords;
        });
        const dataValues = traineesData.map(item => item.Total_Count);

        // Generate an array of dark colors
        const darkColors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
            '#9966FF', '#FF9F40', '#FF5733', '#C70039',
            '#900C3F', '#DAF7A6'
        ];

        // Create the chart
        const ctx = document.getElementById('traineesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: function(context) {
                        // Return a color based on the index of the data
                        return darkColors[context.dataIndex % darkColors.length];
                    },
                    borderColor: function(context) {
                        // Return a slightly lighter color for the border
                        return darkColors[context.dataIndex % darkColors.length] + 'B3'; // Add opacity to color
                    },
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // This makes the bar chart horizontal
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: false,
                        }
                    },
                    y: {
                        title: {
                            display: true,
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                // Only return the value without the dataset label
                                return context.raw;
                            }
                        }
                    },
                    legend: {
                        display: false // Hide the legend
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'right',
                        color: '#444',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value) => value // Display values on the bars
                    }
                }
            },
            plugins: [ChartDataLabels] // Enable ChartDataLabels plugin
        });
    });
</script>



<script>
    (function() {
        // Convert PHP array to JavaScript array
        const chartData = <?php echo json_encode($comparisonData); ?>;

        // Extract data using unique variable names
        const sectorss = chartData.map(item => item.sector);
        const demands = chartData.map(item => item.total_demand);
        const supplies = chartData.map(item => item.total_supply);
        const differences = chartData.map(item => item.difference);

        // Ensure unique variable name for the canvas context
        const chartContext = document.getElementById('comparisonChart').getContext('2d');

        // Initialize the chart with unique variable names
        const comparisonChart = new Chart(chartContext, {
            type: 'bar',
            data: {
                labels: sectorss,
                datasets: [
                    {
                        label: 'Total Demand',
                        data: demands,
                        backgroundColor: 'rgba(75, 192, 192, 0.8)', // Sharp green
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        barThickness: 20,
                        categoryPercentage: 0.5,
                        barPercentage: 0.8
                    },
                    {
                        label: 'Total Supply',
                        data: supplies,
                        backgroundColor: 'rgba(153, 102, 255, 0.8)', // Sharp purple
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        barThickness: 20,
                        categoryPercentage: 0.5,
                        barPercentage: 0.8
                    },
                    {
                        label: 'Difference',
                        data: differences,
                        backgroundColor: 'rgba(225, 25, 22, 0.8)', // Sharp red
                        borderColor: 'rgba(225, 25, 22, 1)',
                        borderWidth: 1,
                        barThickness: 20,
                        categoryPercentage: 0.5,
                        barPercentage: 0.8
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            }
                        }
                    },
                    datalabels: {
                        color: '#000',  // Text color
                        anchor: 'end',  // Position of labels
                        align: 'top',   // Align above the bars
                        formatter: (value) => value  // Display the value on the bar
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        title: {
                            display: true,
                        },
                        ticks: {
                            autoSkip: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]  // Enable the datalabels plugin
        });
    })();
</script>



<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab');
    const popup = document.getElementById('popup');
    const popupContent = document.getElementById('popup-content');
    const closeBtn = document.querySelector('.popup .close');

    const educationData = `
        <h2>Education Profile</h2>
        <table>
            <tr>
                <th>Variable</th>
                <th>Urban</th>
                <th>Rural</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Population that has ever attended school</td>
                <td>78.00</td>
                <td>63.00</td>
                <td>70.00</td>
            </tr>
            <tr>
                <td>Population (%) completed primary or higher</td>
                <td>70.00</td>
                <td>54.00</td>
                <td>62.00</td>
            </tr>
            <tr>
                <td>Gross enrolment ratio at primary level</td>
                <td>118.00</td>
                <td>104.00</td>
                <td>110.00</td>
            </tr>
            <tr>
                <td>Gross enrolment ratio at middle level</td>
                <td>79.00</td>
                <td>66.00</td>
                <td>72.00</td>
            </tr>
            <tr>
                <td>Gross enrolment ratio at the Matric level</td>
                <td>68.00</td>
                <td>62.00</td>
                <td>65.00</td>
            </tr>
            <tr>
                <td>Literacy Population 10 years & older</td>
                <td>77.00</td>
                <td>61.00</td>
                <td>69.00</td>
            </tr>
            <tr>
                <td>Adult literacy rate 15 years & older</td>
                <td>75.00</td>
                <td>57.00</td>
                <td>66.00</td>
            </tr>
        </table>
        <h3>School Statistics</h3>
        <p>Number of primary schools: 1329</p>
        <p>Number of middle schools: 491</p>
        <p>Number of high schools: 446</p>
        <p>Number of higher secondary schools: 95</p>
        <h3>Score (Out of 100)</h3>
        <p>Learning Score: 76.24</p>
        <p>Availability of Electricity: 98.04</p>
        <p>Availability of Water: 99.92</p>
        <p>Availability of Toilet: 99.70</p>
    `;

    const climateData = `
        <h2>Climate Profile</h2>
        <table>
            <tr>
                <th>Variable</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Mean temperature in June (Max)</td>
                <td>34.00</td>
            </tr>
            <tr>
                <td>Mean temperature in January (Min)</td>
                <td>11.90</td>
            </tr>
            <tr>
                <td>Rainfall in July (mm)</td>
                <td>102</td>
            </tr>
            <tr>
                <td>Rainfall in November (mm)</td>
                <td>3</td>
            </tr>
        </table>
    `;

    const agricultureData = `
        <h2>Agriculture Profile</h2>
        <table>
            <tr>
                <th>Variable</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Reported Area</td>
                <td>582,000</td>
            </tr>
            <tr>
                <td>Cultivated Area</td>
                <td>481,000</td>
            </tr>
            <tr>
                <td>Cropped Area</td>
                <td>673,000</td>
            </tr>
            <tr>
                <td>Uncultivated Area</td>
                <td>101,000</td>
            </tr>
            <tr>
                <td>Culturable Waste</td>
                <td>50,000</td>
            </tr>
            <tr>
                <td>Forest</td>
                <td>1,000</td>
            </tr>
            <tr>
                <td>N.A for Cultivation</td>
                <td>50,000</td>
            </tr>
        </table>
    `;

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const info = tab.getAttribute('data-info');
            let content = '';

            switch(info) {
                case 'education':
                    content = educationData;
                    break;
                case 'climate':
                    content = climateData;
                    break;
                case 'agriculture':
                    content = agricultureData;
                    break;
                case 'health':
                    content = '<h2>Health</h2><p>Health data not available</p>';
                    break;
                case 'economy':
                    content = '<h2>Economy</h2><p>Economic data not available</p>';
                    break;
                default:
                    content = '<h2>Information</h2><p>No data available</p>';
            }

            popupContent.innerHTML = content;
            popup.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });
});


</script>

<script>
	// Get the modal
var modal = document.getElementById("IntroPopup");

// Get the button that opens the modal
var btn = document.getElementById("openIntroPopup");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>


<script>
    const labels = <?php echo $labels; ?>;
    const values = <?php echo $values; ?>;

    // Function to generate a random bright color in rgba format
    function getRandomBrightColor() {
        const r = Math.floor(Math.random() * 128) + 128; // 128 - 255 for bright colors
        const g = Math.floor(Math.random() * 128) + 128; // 128 - 255 for bright colors
        const b = Math.floor(Math.random() * 128) + 128; // 128 - 255 for bright colors
        return `rgba(${r}, ${g}, ${b}, 1`; // Return color with 0.8 opacity
    }

    if (labels.length > 0 && values.length > 0) {
        // If data exists, show the pie chart
        const ctx = document.getElementById('occupationChart').getContext('2d');

        // Generate an array of bright colors for each slice
        const dataColors = labels.map(() => getRandomBrightColor());

        const occupationChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jobs Available',
                    data: values,
                    backgroundColor: dataColors,
                    borderColor: dataColors.map(color => color.replace('0.9', '1')), // Use fully opaque borders
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
                                const percentage = ((value / values.reduce((a, b) => a + b, 0)) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`; // Show label with value and percentage
                            }
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value, context) => `${value}`, // Show values directly on the pie chart
                    }
                }
            },
            plugins: [ChartDataLabels] // Load the ChartDataLabels plugin to show values on the chart
        });

        // Show the canvas element since the chart is now rendered
        document.getElementById('occupationChart').style.display = 'block';
    } else {
        console.log('No data available to display the chart.');
    }
</script>




<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ur',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
