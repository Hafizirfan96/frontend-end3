<?php
include_once 'dbconn.php';

$district_id = $districts['id'];
// Fetch total industries
$query_industries = "SELECT COUNT(*) AS total_industries FROM industries_nsis";
$result_industries = $db->query($query_industries);
$row_industries = mysqli_fetch_array($result_industries);
$total_industries = $row_industries['total_industries'];

// Fetch total vocational institutes
$query_vocational = "SELECT COUNT(*) AS total_vocational FROM institutes WHERE institute_type = '1'";
$result_vocational = $db->query($query_vocational);
$row_vocational = mysqli_fetch_array($result_vocational);
$total_vocational = $row_vocational['total_vocational'];

// Fetch total technical institutes
$query_technical = "SELECT COUNT(*) AS total_technical FROM institutes WHERE institute_type = '2'";
$result_technical = $db->query($query_technical);
$row_technical = mysqli_fetch_array($result_technical);
$total_technical = $row_technical['total_technical'];

// Total institutes
$total_institutes = $total_vocational + $total_technical;
?>

<canvas id="myPieChart" width="400" height="400"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Industries', 'Institutes'],
            datasets: [{
                data: [<?php echo $total_industries; ?>, <?php echo $total_institutes; ?>],
                backgroundColor: ['#FF6384', '#36A2EB']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>
