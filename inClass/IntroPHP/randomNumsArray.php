<html>

<head>

</head>

<body>
    <?php
      $total = 0;
      $nums = array();
      echo "#  avg  total<br>";
      for($i=0; $i<9; $i++){
       array_push($nums, rand(0, 100));
       $evenOrOdd = ($nums[$i] %2 == 0)?"even":"odd";
       $total += $nums[$i];
       // for($j=0; $j<4; $j++){
        
       // }
       echo "<div>" . "<div>" . $nums[$i] . " " . round($total/($i+1)) . " " . $total . " " . $evenOrOdd; 
      }

        ?>
</body>

</html>
