
<?php
$districts_table= get_table('districts');
//Districts
while ($districts=mysqli_fetch_array($districts_table)){

$Industry= get_table_by_type('employers','district_id',$districts['id'], '1');
$district_id = $districts['id'];
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
    
    
    
    
    
    
    
    
    
    

// $employeeQuery = $db->query("SELECT SUM(total_employees) as total_employees FROM employers WHERE district_id = " . $districts['id']);
 //$employeeRow = mysqli_fetch_array($employeeQuery);
//Technical
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
chartData.<?php echo clean($districts['name'])?> = [

<?php
//    $query = "select * from mapdata where district='Islamabad'";
//$get=mysqli_query($conn,$query);
//while($row=mysqli_fetch_array($get)){
    ?>
     {
    "district": "Industry",
    "numbers": <?php echo $total_industries; ?>,
    "short": "ind",
     "url": "employers_list.php?district_id=<?php echo $districts['id']; ?>"
    },
    {
    "district": "College of Technology",
    "numbers": <?php echo $technicalCount; //echo $row['gcttotal']; ?>,
    "short": "gct"
    },
    {
    "district": "Vocational Institute",
    "numbers": <?php echo  $vocationalCount; ?>,
    "short": "ins"
    },
    {
    "district": "Enrollment",
    "numbers": <?php echo $row['total_enrollment_sum']!=''?$row['total_enrollment_sum']:'0'; ?>,
    "short": "enr"
    }

<?php //} ?>

];
<?php } ?>
chartData.pakistan = [
<?php
//$result = mysqli_query($conn,"SELECT sum(gcttotal) FROM mapdata") or die(mysqli_error());
//while ($grows = mysqli_fetch_array($result)) {
$Vocational= get_table_by_type('institutes','institute_type','1','1');//Vocational
$Technical= get_table_by_type('institutes','institute_type','2','1');//Technical

$query = "SELECT COUNT(*) AS total_employers FROM industries_nsis";
$result = $db->query($query);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $totalEmployers = $row['total_employers']; // Total number of employers
} else {
    $totalEmployers = 0; // Default to 0 if query fails
}


$get = $db->query("SELECT SUM(Total_Enrolments) as total_enrollment_sum FROM supplyside where Year=2024");
$row=mysqli_fetch_array($get)
    ?>
    {
        "district": "Total Industry",
        "numbers": <?php echo $totalEmployers; ?>,
        "short": "emp"
    },
    {
    "district": "College of Technology",
    "numbers": <?php echo $Technical['total']; //echo $row['gcttotal']; ?>,
    "short": "gct"
    },
    {
    "district": "Vocational Institute",
    "numbers": <?php echo  $Vocational['total']; ?>,
    "short": "ins"
    },
    {
    "district": "Enrollment",
    "numbers": <?php echo $row['total_enrollment_sum']!=''?$row['total_enrollment_sum']:'0'; ?>,
    "short": "enr"
    }


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
"district": "Enrollment",
"numbers": 0,
"short": "enr"
}

];