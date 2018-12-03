<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body>

<!--copied the link from "https://developers.facebook.com/docs/plugins/comments/" -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<?php
//connect
$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200395613', 'gc200395613', 'QJLKec5DpE');
//setup query
$sql = "SELECT * FROM clubs";
$cmd = $db->prepare($sql);
//execute the setup query command
$cmd->execute();
//fetch the data from database
$clubs = $cmd->fetchAll();

//start the table
echo '<table class="table table-striped table-hover"><thead><th>Club Name</th><th>Ground Location</th>
<th>Actions</th></thead>';

//loop through the data & show each club name ona new row.
foreach ($clubs as $c) {
    echo "<tr><td> {$c['club_name']} </td>
        <td> {$c['ground']} </td>
        <td><a href=\"form.php?club_id={$c['club_id']}\">Edit</a> | 
        <a href=\"delete.php?club_id={$c['club_id']}\" 
        class=\"text-danger confirmation\">Delete</a> | <a href=\"showindividual.php?club_id={$c['club_id']}\" >Show </a></td></tr>";
}

//close the table
echo '</table>';
//disconnect
$db = null;
?>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="club.js"></script>
<!--js-->

<!--copied the link from "https://developers.facebook.com/docs/plugins/comments/" -->
<div class="fb-comments" data-href="http://aws.computerstudi.es/~gc200395613/Lab-4/lab2/view.php" data-numposts="5"></div>

</body>
</html>