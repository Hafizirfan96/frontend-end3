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
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            margin: 5px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745; /* Green button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838; /* Darker green */
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
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #28a745; /* Green header */
            color: white;
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
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #28a745; /* Green for pagination */
            color: white;
            border-radius: 4px;
        }
        .pagination a:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>

<h1>Job Listings</h1>

<?php
include 'dbconn.php';

$district_id = isset($_GET['district']) ? $_GET['district'] : 1;
$results_per_page = 20;

$search_term = isset($_GET['search_term']) ? $_GET['search_term'] : '';
$start_from = isset($_GET['page']) ? ($_GET['page'] - 1) * $results_per_page : 0;

$sql = "SELECT title, employer_name, SUM(num_of_posts) AS total_posts 
        FROM jobs 
        WHERE districtId = $district_id 
        AND title LIKE '%$search_term%'
        GROUP BY title, employer_name
        LIMIT $start_from, $results_per_page";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='GET' action=''>";
    echo "<label for='search_term'>Search:</label>";
    echo "<input type='hidden' name='district' value='" . htmlspecialchars($district_id) . "'>";
    echo "<input type='text' name='search_term' value='" . htmlspecialchars($search_term) . "' placeholder='Search Job Title...'>";
    echo "<input type='submit' value='Search'>";
    echo "</form>";

    echo "<table>";
    echo "<tr><th>Title</th><th>Employer Name</th><th>Total Number of Posts</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["title"]) . "</td>
                <td>" . htmlspecialchars($row["employer_name"]) . "</td>
                <td>" . htmlspecialchars($row["total_posts"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center;'>0 results</p>";
}

$sql_count = "SELECT COUNT(DISTINCT title) AS total 
              FROM jobs 
              WHERE districtId = $district_id 
              AND title LIKE '%$search_term%'";

$result_count = $db->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_pages = ceil($row_count['total'] / $results_per_page);

echo "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=" . $i . "&search_term=" . urlencode($search_term) . "&district=" . $district_id . "'>" . $i . "</a> ";
}
echo "</div>";
?>

</body>
</html>
