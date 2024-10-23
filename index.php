<?php
    $currentBalance = 100;
    $output="";
    if(!empty($_POST) && isset($_POST['continue']) ) {
        $currentBalance = (int)$_POST['balance'] - 10;
        $x = rand(1, 6);
        $y = rand(1, 6);
        $sum = $x+$y;
        $output="First Dice = $x, Second Dice = $y, Congratulation! You win! Your current Balance is ";
        if(($_POST['button1'] == 'Below' && $sum < 7) || ($_POST['button1'] == 'Above' && $sum > 7)) {
            $currentBalance +=20;
            $output .= $currentBalance;
        } elseif($_POST['button1'] == 'Lucky' && $sum == 7) {
            $currentBalance +=30;
            $output .= $currentBalance;
        } else {
            $output="First Dice = $x, Second Dice = $y, Oops! You Loose! Your current Balance is ". $currentBalance;
        }
    } elseif(!empty($_POST) && isset($_POST['justreload'])) {
        $currentBalance = (int)$_POST['balance'];
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lucky 7</title>
    </head>
    <body>
        Welcome to Lucky 7 Game
        <form action="index.php" method="POST">
            Place your bet (Rs 10):
            <input type="radio" value="Below" name="button1" title="Below 7" />Below 7
            <input type="radio" value="Lucky" name="button1" title="Lucky 7" />Lucky 7
            <input type="radio" value="Above" name="button1" title="Above 7" />Above 7
            <input type="hidden" value="<?php echo $currentBalance; ?>" name="balance" />
            <button type="submit" name="continue">Play</button>
            <br />
            <div><?php echo $output; ?></div>
            <button type="submit" name="reset">Reset</button>
            <button type="submit" name="justreload">Continue Playing</button>
        </form> 

    </body>
</html>
