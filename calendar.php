<?php
$duration=30;
$cleanup=0;
$start="09:00";
$end="15:00";

function timeslots($duration, $cleanup, $start, $end)
{
    $start= new DateTime($start);
    $end= new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots=array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
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
                    
                    do{
                        if($dt->format('d M Y')==date('d M Y'))
                        {
                            echo "<td style='background:yellow'>".$dt->format('I')."<br>".$dt->format('d M Y')."</td>\n";
                        }else{
                            echo "<td>".$dt->format('I')."<br>".$dt->format('d M Y')."</td>\n";
                        }
                        
                        $dt->modify('+1 day');
                    }while($week==$dt->format('W'));
                    
                    ?>
                 </tr>
                
                 <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
                foreach($timeslots as $ts){
                ?>
                <tr>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                     <td><button class="btn btn-success btn-xs"><?php echo $ts; ?></button></td>
                </tr>
                <?php }?>
            </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.js"></script>
</body>

</html>
