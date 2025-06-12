<?php
    include "dbconn.php";

    // Assuming you have already connected to the database ($db) and sanitized input
    $district_id = $_GET['district'];
    $sector_name = $_GET['sector'];
    $search_term = isset($_GET['search']) ? $_GET['search'] : '';

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

        // Pagination
        $results_per_page = 20; // Increased number of employers per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($page - 1) * $results_per_page;

        // Query to fetch employers for the selected sector
        $query = "
            SELECT Name AS employer_name
            FROM industries_nsis
            WHERE Sector = '$sector_name'
            AND District = (SELECT name FROM districts WHERE id = $district_id)
            AND Name LIKE '%$search_term%'
            LIMIT $start_from, $results_per_page
        ";

        $result = $db->query($query);

        if ($result) {
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
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Adding top margin to the table */
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #28a745; /* Green color for the table header */
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
            background-color: #28a745; /* Green color for the button */
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
            margin-bottom : 10px;
            padding: 5px 10px;
            background-color: #28a745; /* Green color for pagination links */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination-link.active {
            background-color: #218838; /* Darker green for active page */
        }
        .pagination-link:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>

<div style='text-align: center; margin-top: 20px;'> <!-- Adding top margin for the container -->
    <h2 style='color: #28a745;'>Industries for Sector: <?php echo htmlspecialchars($sector_name); ?></h2>

    <!-- Search form -->
    <form method='GET' action='employers_data.php' style='margin-bottom: 20px;'>
        <input type='hidden' name='district' value='<?php echo htmlspecialchars($district_id); ?>'>
        <input type='hidden' name='sector' value='<?php echo htmlspecialchars($sector_name); ?>'>
        <input type='text' name='search' value='<?php echo htmlspecialchars($search_term); ?>' placeholder='Search Industry names...' class='search-input'>
        <button type='submit' class='search-button'>Search</button>
    </form>

    <div style='margin: 0 auto; width: 80%;'> <!-- Centering the container -->

        <!-- Table structure for displaying employers -->
        <table style='width: 100%;'>
            <thead>
                <tr>
                    <th style='text-align: left;'>Number</th>
                    <th style='text-align: left;'>Employer Name</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $number = ($page - 1) * $results_per_page + 1; // Starting number for pagination

            // Fetch employers and display in table rows
            while ($row = $result->fetch_assoc()) {
                $employer_name = htmlspecialchars($row['employer_name']);
                echo "<tr>";
                echo "<td>$number</td>";
                echo "<td>$employer_name</td>";
                echo "</tr>";
                $number++;
            }
            ?>

            </tbody>
        </table>

    </div> <!-- Closing centered container -->

    <!-- Pagination links -->
    <div style='margin-top: 20px;'> <!-- Top margin for pagination section -->

        <?php
        // Pagination logic
        $query_count = "
            SELECT COUNT(*) AS total_count
            FROM industries_nsis
            WHERE Sector = '$sector_name' AND District = (SELECT name FROM districts WHERE id = $district_id) AND Name LIKE '%$search_term%'
        ";

        $result_count = $db->query($query_count);
        $row_count = $result_count->fetch_assoc();
        $total_records = $row_count['total_count'];
        $total_pages = ceil($total_records / $results_per_page);

        $range = 5; // Number of pages to show before and after the current page

        if ($page > 1) {
            echo "<a href='employers_data.php?district=$district_id&sector=" . urlencode($sector_name) . "&page=" . ($page - 1) . "&search=" . urlencode($search_term) . "' class='pagination-link'>&laquo; Previous</a>";
        }

        for ($i = max(1, $page - $range); $i <= min($page + $range, $total_pages); $i++) {
            // Ensure current page is highlighted
            $active_class = ($i == $page) ? "active" : "";
            echo "<a href='employers_data.php?district=$district_id&sector=" . urlencode($sector_name) . "&page=$i&search=" . urlencode($search_term) . "' class='pagination-link $active_class'>$i</a>";
        }

        if ($page < $total_pages) {
            echo "<a href='employers_data.php?district=$district_id&sector=" . urlencode($sector_name) . "&page=" . ($page + 1) . "&search=" . urlencode($search_term) . "' class='pagination-link'>Next &raquo;</a>";
        }
        ?>

    </div>

</div> <!-- Closing center alignment div -->

</body>
</html>
<?php
        } else {
            echo "Error executing query: " . $db->error;
        }
    } else {
        echo "Error fetching district name: " . $db->error;
    }
?>
