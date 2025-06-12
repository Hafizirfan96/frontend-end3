<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745; /* Green header */
            color: white;
            font-weight: bold;
        }
        td {
            color: #555;
        }
        tr:hover {
            background-color: #e9f9e9; /* Light green on hover */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        .grand-total {
            font-weight: bold;
            color: #28a745; /* Green for grand total */
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<h1>Work Force Demand</h1>

<?php
include 'dbconn.php';

$district_id = isset($_GET['district']) ? $_GET['district'] : 1;

// Query to fetch all job listings for the selected district
$sql = "SELECT `Sub-sector` AS Sector, SUM(G_Total) AS total_demand 
        FROM nsis_demand_main 
        WHERE District = (
                   SELECT name
                   FROM districts
                   WHERE id = $district_id
               )
        GROUP BY `Sub-sector`;";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Sector</th><th>Grand Total</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["Sector"]) . "</td>
          
                <td class='grand-total'>" . htmlspecialchars($row["total_demand"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>0 results</p>";
}
?>

</body>
</html>
