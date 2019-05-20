<!DOCTYPE html>
<html>
<head>
    <title>Status result page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <h1>Search Status Result Page</h1>

    <?php
 
    
     // sql info or use include 'file.inc'
            require_once("../../conf/settings.php");
        
        $conn = @mysqli_connect($host, $user, $pswd, $dbnm);
        
        // Checks if connection is successful
        if (!$conn) {
            // Displays an error message
            echo "<p>Database connection failure</p>";
        } else {
            // Upon successful connection
            
                     
            // Set up the SQL command to retrieve the data from the table
            // % symbol represent a wildcard to match any characters
            // like is a compairson operator
            
            $query = "select * from Tree";
            
            // executes the query and store result into the result pointer
            $result = mysqli_query($conn, $query);
            // checks if the execuion was successful
            if (!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
       
        if (mysqli_num_rows($result) > 0) {
        echo"<table>";
            $i = 0;
        while ($record = mysqli_fetch_assoc($result)) {
            if($i%3 == 0){
            echo"<tr>";
        }
        ?>
        <div class="col-lg-4 col-sm-6">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $record['photo']; ?>" alt="Card image cap">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $record['treeName']; ?></li>
    <li class="list-group-item"><?php echo $record['height']; ?></li>
    <li class="list-group-item"><?php echo $record['sunlight']; ?></li>
  </ul>
  
</div>
</div>

        <!-- <div class="col-lg-4 col-sm-6"></div>
        <div class="card hovercard">
            <div class="cardheader">
                <div class="avatar">
                    <img alt="" src="<?php echo $record['photo']; ?>">
                </div>
            </div>
            <div class="card-body info">

                <div class="desc"><?php echo $record['treeName']; ?></div>
                <div class="desc"><?php echo $record['height']; ?></div>
            </div>

        </div> -->

        <?php 
        if($i%3 == 2){
        echo"</tr>";
    }
    $i++;
    }

} else {
echo "0 results";
}
echo"</table>";





// Frees up the memory, after using the result pointer
mysqli_free_result($result);
} // if successful query operation

// close the database connection
mysqli_close($conn);
}

//if successful database connection







?>



</body>
</html>