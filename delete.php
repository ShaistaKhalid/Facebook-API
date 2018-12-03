<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>

<?php
// GET selected club_id
$club_id = $_GET['club_id'];
if (empty($club_id)) {
    header('location:form.php');
}
// connect
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395613', 'gc200395613', 'QJLKec5DpE');
// set up and execute SQL DELETE command
$sql = "DELETE FROM clubs WHERE club_id = :club_id";
$cmd = $db->prepare($sql);
$cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
$cmd->execute();
// disconnect
$db = null;
// redirect to updated clubs page
header('location:form.php');
?>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="club.js"></script>

</body>
</html>