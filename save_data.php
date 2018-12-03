<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving the Data</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>

<?php
//storing the input values into variables
$club_name = $_POST['club_name'];
$club_id = $_POST['club_id'];
$ground = $_POST['ground'];

//connect

$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395613', 'gc200395613', 'QJLKec5DpE');
//setup and execute insert the command.
    if (empty($club_id)) {
        $sql = "INSERT INTO clubs(club_name, ground)
VALUES(:club_name,:ground)";
    } else {
        $sql = "UPDATE clubs SET club_name=:club_name, ground=:ground where club_id=:club_id";
    }
    $cmd = $db->prepare($sql);
    $cmd->bindparam(':club_name', $club_name, PDO::PARAM_STR, 50);
    $cmd->bindparam(':ground', $ground, PDO::PARAM_STR, 50);
    if (!empty($club_id)) {
        $cmd->bindparam(':club_id', $club_id, PDO::PARAM_INT, 50);
    }
    $cmd->execute;
    //disconnect
    $db = null;

    echo "Values Saved";
    header('location:form.php');

 ?>
<!--Connecting JS -->
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="club.js"></script>


</body>
</html>