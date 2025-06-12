<?php
    include "dbconn.php";

    // Assuming you have already connected to the database ($db) and sanitized input
    $district_id = $_GET['district'];
    $sector_name = $_GET['sector'];

    // Query to fetch district name
    $query_district = "
        SELECT name
        FROM districts
        WHERE id = $district_id
    ";
    $result_district = $db->query($query_district);
    if ($result_district && $result_district->num_rows > 0) {
        $row_district = $result_district->fetch_assoc();
        $district_name = $row_district['name'];

        // First query to get the male, female, and grand total sums
        $query_totals = "
            SELECT 
                SUM(Total) AS Total_Sum, 
                SUM(Total1) AS Total1_Sum, 
                SUM(G_Total) AS G_Total_Sum
            FROM nsis_demand_main
            WHERE `Sub-sector` = '$sector_name'
            AND District = (SELECT name FROM districts WHERE id = $district_id)
        ";

        $result_totals = $db->query($query_totals);
        if ($result_totals && $result_totals->num_rows > 0) {
            $row_totals = $result_totals->fetch_assoc();
            $male_total = $row_totals['Total_Sum'];
            $female_total = $row_totals['Total1_Sum'];
            $grand_total = $row_totals['G_Total_Sum'];
        }

        // Second query to get occupation details (ML, WL levels)
    $query_occupation_details = "
    SELECT Occupation,
           SUM(ML1) AS ML1,
           SUM(ML2) AS ML2,
           SUM(ML3) AS ML3,
           SUM(ML4) AS ML4,
           SUM(ML5) AS ML5,
           SUM(WL1) AS WL1,
           SUM(WL2) AS WL2,
           SUM(WL3) AS WL3,
           SUM(WL4) AS WL4,
           SUM(WL5) AS WL5,
           SUM(ML1 + ML2 + ML3 + ML4 + ML5) AS Total_Male,
           SUM(WL1 + WL2 + WL3 + WL4 + WL5) AS Total_Women,
		    (SUM(ML1 + ML2 + ML3 + ML4 + ML5) + SUM(WL1 + WL2 + WL3 + WL4 + WL5)) AS Grand_Total
    FROM nsis_demand_main
    WHERE `Sub-sector` = '$sector_name'
      AND District = (SELECT name FROM districts WHERE id = $district_id)
    GROUP BY Occupation
";

$result_occupations = $db->query($query_occupation_details);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industries for Sector: <?php echo htmlspecialchars($sector_name); ?></title>
    <link rel="shortcut icon" href="img/favicon.png">
    <style>
		
		
		
		
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
            width: 220px;
            cursor: pointer;
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            color: #0093AF;
            margin-bottom: 10px;
        }
        .card p {
            margin: 5px 0;
        }
        .icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: #0093AF;
        }
        .male {
            background-color: rgba(135, 206, 235, 0.3);
        }
        .female {
            background-color: rgba(255, 182, 193, 0.3);
        }
        .grand-total {
            background-color: rgba(144, 238, 144, 0.3);
        }
		
		
		
		
		
		
		
		
		
		table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px 0;
    font-size: 16px;
    text-align: left;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
}

/* Table header styling */
table thead {
    background-color: #0093AF;
    color: white;
}

table thead th {
    padding: 12px 15px;
    text-align: center;
}

/* Table body styling */
table tbody td {
    padding: 10px 15px;
    text-align: center;
    border-bottom: 1px solid #f2f2f2;
}

/* Alternate row background color */
table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Hover effect for table rows */
table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Adding a subtle shadow around the table */
table {
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

/* Table heading and spacing */
table caption {
    font-size: 18px;
    font-weight: bold;
    color: #0093AF;
    margin-bottom: 20px;
}

/* Responsive table */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }
}

    </style>
</head>
<body>

<div style='text-align: center; margin-top: 20px;'> 
<h2 style="color: #ffffff; background-color: #0093AF; padding: 15px; border-radius: 8px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); font-size: 24px; margin-bottom: 20px; display: inline-block;">
    <?php echo htmlspecialchars($district_name); ?>
</h2>
    <h2 style='color: #0093AF;'>Work Force Demand Sector: <?php echo htmlspecialchars($sector_name); ?></h2>

    <div class="card-container">
        <!-- Male Total Card -->
        <div class='card male'>
            <div class='icon'>👨‍💼</div>
            <h3>Male</h3>
            <p><?php echo htmlspecialchars($male_total); ?></p>
        </div>

        <!-- Female Total Card -->
        <div class='card female'>
            <div class='icon'>👩‍💼</div>
            <h3>Female</h3>
            <p><?php echo htmlspecialchars($female_total); ?></p>
        </div>

        <!-- Grand Total Card -->
        <div class='card grand-total'>
            <div class='icon'>📊</div>
            <h3>Grand Total</h3>
            <p><?php echo htmlspecialchars($grand_total); ?></p>
        </div>
    </div> <!-- Closing card container -->

    <table>
        <thead>
            <tr>
                <th>Occupation</th>
              
				<th>Total Male </th>
				<th>Total Female</th>
				<th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display detailed occupation rows from the second query
            if ($result_occupations && $result_occupations->num_rows > 0) {
                while ($row = $result_occupations->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Occupation']) . "</td>";
                  
					   echo "<td>" . htmlspecialchars($row['Total_Male']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Total_Women']) . "</td>";
					  echo "<td>" . htmlspecialchars($row['Grand_Total']) . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

</div> <!-- 

  <th>ML1</th>
                <th>ML2</th>
                <th>ML3</th>
                <th>ML4</th>
                <th>ML5</th>
                <th>WL1</th>
                <th>WL2</th>
                <th>WL3</th>
                <th>WL4</th>
                <th>WL5</th>
  echo "<td>" . htmlspecialchars($row['ML1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ML2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ML3']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ML4']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ML5']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['WL1']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['WL2']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['WL3']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['WL4']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['WL5']) . "</td>";


Closing center alignment div -->

</body>
</html>


<?php
    } else {
        echo "Error fetching district name: " . $db->error;
    }
?>
