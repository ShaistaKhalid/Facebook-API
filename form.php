<?php
try {
// initialize variables
    $club_name = null;
    $club_id = null;
    $ground = null;

// was an existing Id passed to this page?  If so, select the matching record from the db
    if (!empty($_GET['club_id'])) {
        $club_id = $_GET['club_id'];
        //connect
        $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395613', 'gc200395613', 'QJLKec5DpE');
        // set up and execute query
        $sql = "SELECT * FROM clubs WHERE club_id = :club_id";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
        $cmd->execute();
        $c = $cmd->fetch();
        // store each column value in a variable
        $club_name = $c['club_name'];
        $club_id = $c['club_id'];
        $ground = $c['ground'];
        // disconnect
        $db = null;
    }
}
//sends the user to main page.
catch(Exception $e)
{
  mail('shaizu10@gmail.com', 'lab 2 errors', $e);
  header('location:error.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>

<h1> CLUBS </h1>
<a href="view.php">Show Table</a><!--It will show table -->
<form action="save_data.php" method="POST">
    <fieldset>
        <label for="club_name">Club Name: </label>
        <input name="club_name" id="club_name" required value="<?php echo $club_name; ?>" />
    </fieldset>
    <fieldset>
        <label for="ground">Ground Location: </label>
        <input name="ground" id="ground" required value="<?php echo $ground; ?>" />
    </fieldset>
    <button>Submit Data</button>
    <input type="hidden" name="club_id" value="<php echo $club_id;?>"/>
</form>

</body>
</html>