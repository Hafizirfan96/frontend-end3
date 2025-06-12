<?php
include "dbconn.php";

// Assuming you have already connected to the database ($db) and sanitized input
$district_id = $_GET['district'];
$search_term = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare statement to fetch district name
$query_district = "SELECT name FROM districts WHERE id = ?";
$stmt_district = $db->prepare($query_district);
$stmt_district->bind_param("i", $district_id);
$stmt_district->execute();
$result_district = $stmt_district->get_result();

if ($result_district && $result_district->num_rows > 0) {
    $row_district = $result_district->fetch_assoc();
    $district_name = $row_district['name'];

    // Pagination
    $results_per_page = 20; // Number of employers per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start_from = ($page - 1) * $results_per_page;

    // Prepare statement to fetch employers
    $query = "
        SELECT Name AS employer_name, Sector, `Group`
        FROM industries_nsis
        WHERE District = ?
        AND Name LIKE ?
        LIMIT ?, ?
    ";
    $stmt = $db->prepare($query);
    $search_param = '%' . $search_term . '%';
    $stmt->bind_param("ssii", $district_name, $search_param, $start_from, $results_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industries for District: <?php echo htmlspecialchars($district_name); ?></title>
    <link rel="shortcut icon" href="img/favicon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #28a745; /* Green color */
            color: white;
        }
        .search-input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-button {
            padding: 10px 20px;
            background-color: #28a745; /* Green color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .search-button:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .pagination-link {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 5px 10px;
            background-color: #28a745; /* Green color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination-link.active {
            background-color: #1e7e34; /* Darker green for active */
        }
        .pagination-link:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>

<div style='text-align: center; margin-top: 20px;'>
    <h2 style='color: #28a745;'>Industries of District: <?php echo htmlspecialchars($district_name); ?></h2>

    <!-- Search form -->
    <form method='GET' action='total_industry_district.php' style='margin-bottom: 20px;'>
        <input type='hidden' name='district' value='<?php echo htmlspecialchars($district_id); ?>'>
        <input type='text' name='search' value='<?php echo htmlspecialchars($search_term); ?>' placeholder='Search Industry names...' class='search-input'>
        <button type='submit' class='search-button'>Search</button>
    </form>

    <div style='margin: 0 auto; width: 80%;'>

        <!-- Table structure for displaying employers -->
        <table>
            <thead>
                <tr>
                    <th style='text-align: left;'>Number</th>
                    <th style='text-align: left;'>Employer Name</th>
                    <th style='text-align: left;'>Sector</th>
                    <th style='text-align: left;'>Group</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $number = ($page - 1) * $results_per_page + 1;

            // Fetch employers and display in table rows
            while ($row = $result->fetch_assoc()) {
                $employer_name = htmlspecialchars($row['employer_name']);
                $sector = htmlspecialchars($row['Sector']);
                $group = htmlspecialchars($row['Group']);
                echo "<tr>";
                echo "<td>$number</td>";
                echo "<td>$employer_name</td>";
                echo "<td>$sector</td>";
                echo "<td>$group</td>";
                echo "</tr>";
                $number++;
            }
            ?>

            </tbody>
        </table>

    </div>

    <!-- Pagination links -->
    <div style='margin-top: 20px;'>

        <?php
        // Pagination logic
        $query_count = "
            SELECT COUNT(*) AS total_count
            FROM industries_nsis
            WHERE District = ?
            AND Name LIKE ?
        ";
        $stmt_count = $db->prepare($query_count);
        $stmt_count->bind_param("ss", $district_name, $search_param);
        $stmt_count->execute();
        $result_count = $stmt_count->get_result();
        $row_count = $result_count->fetch_assoc();
        $total_records = $row_count['total_count'];
        $total_pages = ceil($total_records / $results_per_page);

        $range = 5; // Number of pages to show before and after the current page

        if ($page > 1) {
            echo "<a href='total_industry_district.php?district=$district_id&page=" . ($page - 1) . "&search=" . urlencode($search_term) . "' class='pagination-link'>&laquo; Previous</a>";
        }

        for ($i = max(1, $page - $range); $i <= min($page + $range, $total_pages); $i++) {
            $active_class = ($i == $page) ? "active" : "";
            echo "<a href='total_industry_district.php?district=$district_id&page=$i&search=" . urlencode($search_term) . "' class='pagination-link $active_class'>$i</a>";
        }

        if ($page < $total_pages) {
            echo "<a href='total_industry_district.php?district=$district_id&page=" . ($page + 1) . "&search=" . urlencode($search_term) . "' class='pagination-link'>Next &raquo;</a>";
        }
        ?>

    </div>

</div>

</body>
</html>

<?php
    } else {
        echo "Error executing query: " . $stmt->error;
    }
} else {
    echo "Error fetching district name: " . $stmt_district->error;
}
?>
