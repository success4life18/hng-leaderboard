<?php

include ("dbconn.php");

$dsc = isset($_POST["dsc"]);
$asc = isset($_POST["asc"]);


$sql = "SELECT `s/n`, `fullname`, `points` FROM `leadertb` ORDER BY `points` DESC";
$result = mysqli_query($conn, $sql) or die('failed');


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaderBoard | HNG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
</head>

<body>
<div class="container container-fluid">
    
    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">        
        <div class="row">
                <div class="col-md-12 heading">
                        <h3>HNGi7 INTERNS</h3>
                </div>
        </div>

        <div class="row">  
            <div class="col-md-6 subhead">
                <h4>SORT BY</h4>
            </div>
                <div class="col-md-3 btn">
                    <input class="form-control btn btn-primary" type="submit" value="Ascending" name="asc">
                </div>

                <div class="col-md-3 btn">
                    <input class="form-control btn btn-primary" type="submit" value="Discending" name="dsc">
                </div>
        </div>
    </form>
    

<!-- three best interns -->
<div class="row">
    <div class="col-md-6 main">
        <h4>Top INTERNS</h4>
            <table class="table table-striped table-borderless">
                <tr>
                    <td>Alumona Micah</td>
                    <td>39</td>
                    <td>facebook</td>
                </tr>
                <tr>
                    <td>Joseph Kalu</td>
                    <td>24</td>
                    <td>facebook</td>
                </tr>
                <tr>
                    <td>Paul Shotolu</td>
                    <td>23</td>
                    <td>facebook</td>
                </tr>
            </table>
    </div>
</div>
<!--Review submision data and display it on the Table -->
<div class="ro">
        <div class="col-md-12">
                    <table class="table table-striped table-borderless"> 
                        <th scope="row" class="head">
                            <tr>
                                <td>POSITION</td>
                                <td>FULLNAME</td>
                                <td>POINTS</td>
                                <td>SOCIAL MEDIA</td>
                            </tr>
                        </th> 
                    
                        <?php if ($dsc) { 
                        while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row["s/n"]; ?></td>
                            <td><?php echo $row["fullname"]; ?></td>
                            <td><?php echo $row["points"]; ?></td>
                            <td> <a href="http://facebook.com/login">Facebook</a></td>
                        </tr>
                            <?php };?>
                        <?php } elseif ($asc) {
                $sql = "SELECT `s/n`, `fullname`, `points` FROM `leadertb` ORDER BY `points` ASC";
                $result = mysqli_query($conn, $sql) or die('failed'); 
                        while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row["s/n"]; ?></td>
                            <td><?php echo $row["fullname"]; ?></td>
                            <td><?php echo $row["points"]; ?></td>
                            <td href="#"> Facebook</td>
                        </tr>
                    <?php };  };?>
                </table>
        </div>
  </div>
</div>
</body>
</html>
