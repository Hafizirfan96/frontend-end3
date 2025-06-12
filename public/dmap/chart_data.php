chartData.Islamabad = [

<?php				$query = "select * from mapdata where district='Islamabad'";
$get=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($get)){   ?>
    {
    "district": "College of Technology",
    "numbers": <?php echo $sum; //echo $row['gcttotal']; ?>,
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
    "numbers":  <?php echo $sum; //grows['sum(gcttotal)']; ?>,
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
                    "numbers": <?php $one = $sum/*grows['sum(gcttotal)']*/; $two = $vrows['sum(total_vocational)']; echo $one+$two;?>,
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