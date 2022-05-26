<?php
    $mysqli = new mysqli('localhost', 'root', '', 'projetweb');
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
if(isset($_GET['jour'])){

    $date = $_GET['jour'];
    $stmt = $mysqli->prepare("select * from rdv where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['heure'];
            }
            
            $stmt->close();
        }
    }
}

/*
    $sql = "SELECT * from rdv";
    $result = mysqli_query($mysqli, $sql);
 
    $stmt = $mysqli->prepare("select * from rdv where jour= ? and heure= :heure");
    $stmt->bind_param('ss', $date, $timeslot);
    //$bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Booked already</div>";
            }else{
                $stmt = $mysqli->prepare("INSERT INTO rdv (adresse, mail_etudiant, mail_prof, jour, heure, infos_sup) VALUES ('','','',?,?,'')");
    $stmt->bind_param('ss', $date, $timeslot);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $bookings[]=$timeslot;
    $stmt->close();
    $mysqli->close();

        }
    }
*/


$duration = 15;
$cleanup = 0;
$start = "09:00";
$end = "15:00";

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        
        $slots[] = $intStart->format("H:i:s");//." - ". $endPeriod->format("H:iA");
        
    }
    
    return $slots;
}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($_GET['date'])); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo(isset($msg))?$msg:""; ?>
            </div>
                <?php 
                    $sql = mysqli_query($mysqli,"SELECT DISTINCT heure from rdv");
                    $sql_jour = mysqli_query($mysqli,"SELECT jour from rdv");
                    $result=mysqli_fetch_assoc($sql);
                    $result_jour=mysqli_fetch_row($sql_jour);
                    echo implode(" ",$result);
                    echo implode(" ",$result_jour);
                $timeslots = timeslots($duration, $cleanup, $start, $end); 
                foreach($timeslots as $ts){
                ?>
                    <div class="col-md-2">
                        <div class="form-group">
                           <?php if(in_array($_GET['date'],$result_jour)){
                                    if(mysqli_num_rows($sql)>0){
                                        if(in_array($ts,$result)){
                                            echo '<td><span><a class="btn btn-danger book">'.$ts.'</a><span></td>';
                                        }else{
                                            echo '<td><span><a class="btn btn-success book" href="book_1.php?mail='.$_GET['mail'].'&date='.$_GET['date'].'&time='.$ts.'">'.$ts.'</a><span></td>';?>
                                    <?php }
                                    }
                                }?>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input required type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input required type="email_etudiant" class="form-control" name="email_etudiant">
                                </div>
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>

    <script>
        
    $(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>

</html>