<?php
$sum=0;
$error_amount=""; 
$error_year=""; 
$error_rate="";
$count=0;
if(isset($_POST['submit']) && !empty($_POST['amount']) && !empty($_POST['rate']) 
         && !empty($_POST['year'])) {
        
        $amount=$_POST['amount'];
        $rate=$_POST['rate'];
        $year = $_POST['year'];
            if($amount<0){
                $error_amount="The amount cannot be negative";
                $count=$count+1;
            }
            if($rate<0){
                $error_rate="The rate cannot be negative";
                $count=$count+1;
            }
            if($year<0){
                $error_year="The year cannot be negative";
                $count=$count+1;
            }
            if(($rate==1) && ($count==0)) {
                $r2=($rate/100);
                $sum=($amount*$r2) + $amount;
            }
            elseif($count==0) {
        $r1=($rate/100);
        $forOneYear = ($amount*$r1) + $amount;
        $sum=$forOneYear;
        
        for ($i=1; $i <$year ; $i++) { 
            
            $sum = ($sum * $r1) + $sum;

        }
    }

    }
    if(isset($_POST['submit']) && !empty($_POST['ramount'])) {
        $sum=0;
    }
  

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <h1 style="text-align: center;"><strong>Maturity Calculator<strong></h1>
        <div class="container">
            <form action="index.php" method="post">
            <div class="inner">
                <label>Enter the Amount</label>
                <input id="one" type="number" name="amount" step="0.01" value="<?php print $amount;?>">
                <span style="padding-top: 8px;
                        color: red;
                        font-size: 15px;
                        display:block;" ><?php echo $error_amount; ?></span>
           </div> 

           <div class="inner">
                <label>Enter the Rate</label>
                <input id="two" type="number" name="rate" step="0.01" value="<?php print $rate;?>">
                <span style="padding-top: 1px;
                        color: red;
                        font-size: 15px;
                        display:block;" ><?php echo $error_rate; ?></span>
            </div>

            <div class="inner">
                <label>Enter the Years</label>
                <input id="three" type="number" name="year" step="0.01" value="<?php print $year;?>">
                
                <span style="padding-top: 8px;
                        color: red;
                        font-size: 15px;
                        display:block;" ><?php echo $error_year; ?></span>
            </div>

            <div class="inner">
                <label>The required amount is</label>
                <input id="myInput" type="" name="" value="<?php if(isset($_POST['submit'])) {echo $sum;} ?> ">
                <button class="button" onclick="document.getElementById('myInput').value = ''" 
                onmousemove="this.style.color='yellow'"
                        style=" background-color: black;
                                color : white;
                                font-size: 15px;
                                 width : 30%;">Clear</button>
            </div>

            <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </body>
</html>