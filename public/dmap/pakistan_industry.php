<?php
    include "dbconn.php";

    // Get the sector name and search term from the GET request
    $sector_name = $_GET['sector'];
    $search_term = isset($_GET['search']) ? $_GET['search'] : '';

    // Pagination
    $results_per_page = 20; // Number of employers per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_from = ($page - 1) * $results_per_page;

    // Query to fetch employers based on sector and search term, including subsector and district name
    $query = "
        SELECT Name AS employer_name, District
        FROM industries_nsis
        WHERE Sector = '$sector_name' AND Name LIKE '%$search_term%'
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
    <title>Industries for Sector: <?php echo htmlspecialchars($sector_name); ?> in Pakistan</title>
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
            background-color: #0093AF;
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
            background-color: #0093AF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .search-button:hover {
            background-color: #007c90;
        }
        .pagination-link {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 10px;
            padding: 5px 10px;
            background-color: #0093AF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination-link.active {
            background-color: #005d75;
        }
        .pagination-link:hover {
            background-color: #007c90;
        }
    </style>
</head>
<body>

<div style='text-align: center; margin-top: 20px;'> <!-- Adding top margin for the container -->
    <h2 style='color: #0093AF;'>Industries for Sector: <?php echo htmlspecialchars($sector_name); ?> in Pakistan</h2>
    
    <!-- Search form -->
    <form method='GET' action='pakistan_industry.php' style='margin-bottom: 20px;'>
        <input type='hidden' name='sector' value='<?php echo htmlspecialchars($sector_name); ?>'>
        <input type='text' name='search' value='<?php echo htmlspecialchars($search_term); ?>' placeholder='Search Industry...' class='search-input'>
        <button type='submit' class='search-button'>Search</button>
    </form>

    <div style='margin: 0 auto; width: 80%;'> <!-- Centering the container -->

        <!-- Table structure for displaying employers -->
        <table style='width: 100%;'>
            <thead>
                <tr>
                    <th style='text-align: left;'>Number</th>
                    <th style='text-align: left;'>Employer Name</th>
                    <th style='text-align: left;'>District Name</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $number = ($page - 1) * $results_per_page + 1; // Starting number for pagination

            // Fetch employers and display in table rows
            while ($row = $result->fetch_assoc()) {
                $employer_name = htmlspecialchars($row['employer_name']);
                $district_name = htmlspecialchars($row['District'] ?? 'None'); // Use 'District' here, not 'district_name'
                echo "<tr>";
                echo "<td>$number</td>";
                echo "<td>$employer_name</td>";
                echo "<td>$district_name</td>";
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
            WHERE Sector = '$sector_name' AND Name LIKE '%$search_term%'
        ";

        $result_count = $db->query($query_count);
        $row_count = $result_count->fetch_assoc();
        $total_records = $row_count['total_count'];
        $total_pages = ceil($total_records / $results_per_page);

        $range = 5; // Number of pages to show before and after the current page

        if ($page > 1) {
            echo "<a href='pakistan_industry.php?sector=" . urlencode($sector_name) . "&search=" . urlencode($search_term) . "&page=" . ($page - 1) . "' class='pagination-link'>&laquo; Previous</a>";
        }

        for ($i = max(1, $page - $range); $i <= min($page + $range, $total_pages); $i++) {
            // Ensure current page is highlighted
            $active_class = ($i == $page) ? "active" : "";
            echo "<a href='pakistan_industry.php?sector=" . urlencode($sector_name) . "&search=" . urlencode($search_term) . "&page=$i' class='pagination-link $active_class'>$i</a>";
        }

        if ($page < $total_pages) {
            echo "<a href='pakistan_industry.php?sector=" . urlencode($sector_name) . "&search=" . urlencode($search_term) . "&page=" . ($page + 1) . "' class='pagination-link'>Next &raquo;</a>";
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
?>
