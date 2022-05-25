<?php
$duration=30;
$cleanup=0;
$start="09:00";
$end="15:00";

function timslots($duration, $cleanup, $start, $end)
{
    $start= new DateTime($start);
    $end= new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupinterval = new DateInterval("PT".$cleanup."M");
    $slots=array();

   // for($)
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title></title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkyculHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <h1></h1>

    <?php
    $dt= new DateTime;
    if(isset($_GET['year']) && isset($_GET['week'])){
        $dt->setISODate($_GET['year'],$_GET['week']);
    }else{
        $dt->setISODate($dt->format('o'), $dt->format('W'));
    }
    $year=$dt->format('o');
    $week=$dt->format('W');
    $month=$dt->format('F');
    $year=$dt->format('Y');
    //////////////
   /*$year = (isset($_GET['year'])) ? $_GET['year'] : date("Y");
    $week = (isset($_GET['week'])) ? $_GET['week'] : date('W');
    if($week > 52) {
    $year++;
    $week = 1;
    } 
    elseif($week < 1) {
    $year--;
    $week = 52;
    }*/
    ?>


    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2><?php echo "$month $year";?></h2>
                <a class="btn btn-primary btn-xs" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 52 ? 1 : 1 + $week).'&year='.($week == 52 ? 1 + $year : $year); ?>">Next  Week</a> <!--Next week-->
                <a class="btn btn-primary btn-xs" href="calendar.php">Current Week</a>
                <a class="btn btn-primary btn-xs" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week == 1 ? 52 : $week -1).'&year='.($week == 1 ? $year - 1 : $year); ?>">Pre Week</a> <!--Previous week-->
                <br><br>
            </center>
            <table class="table table-bordered">
                <tr class="success">
                    
                    <?php
                    echo"<center>";
                    do{
                        if($dt->format('d M Y')==date('d M Y'))
                        {
                            echo "<td style='background:yellow'>".$dt->format('I')."<br>".$dt->format('d M Y')."</td>\n";
                        }else{
                            echo "<td>".$dt->format('I')."<br>".$dt->format('d M Y')."</td>\n";
                        }
                        
                        $dt->modify('+1 day');
                    }while($week==$dt->format('W'));
                    echo"</center>";
                    ///////////////////
                       /* if($week < 10) {
                            $week = '0'. $week;
                        }
                        for($day= 1; $day <= 7; $day++) {
                            $d = strtotime($year ."W". $week . $day);

                            echo "<td>". date('l', $d) ."<br>". date('d M', $d) ."</td>";
                        }*/
                    ?>
                    
                 </tr>
            </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.js"></script>
</body>

</html>
