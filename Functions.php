<?php 

if(isset($_GET["number"])) {
    $num = $_GET["number"];

    function calculationOfFormula($num){
        return 3*$num+1;
    }

    function findTheLargestElementInIteration($num){
      $i = 0;
      $numbers = array();
  
      while($num != 1) {
          $numbers[] = $num; 
          if ($num % 2 == 0) {
              $num = $num / 2;
          } else {
              $num = calculationOfFormula($num);
          }
          $i++;
      }
  
      
      $maxValue = $numbers[0]; 
      for ($i = 1; $i < count($numbers); $i++) {
          if ($numbers[$i] > $maxValue) {
              $maxValue = $numbers[$i];
          }
      }
      return $maxValue;
  }
    function findIteration($num) {
      $numCheck = (int)$num;
      if ($numCheck <= 0 || (string)$num !== (string)$numCheck) {
          return "Error: $num is not a positive integer.";
      }
      
        $i = 0;

      
        while ($num != 1 ) {
          if ($num % 2 == 0) {
            $num = $num / 2;
          } else {
            $num = calculationOfFormula($num);
          }
          $i++;
        }
      
        return $i;
    }
    echo "here is the answer of formula calculation ".calculationOfFormula($num)."<br>";
    echo "here is the maximum iterations calculation ".findIteration($num)."<br>";
    echo "here is the maximum number in the iteration ".findTheLargestElementInIteration($num);
}

function findIterationAndMaxValue($lowerBound, $upperBound) {
  $maxValue = 0;
  $normalIterations=0;
  $normalValue= 0;
  $maxIterations = 0;
  $numbers = array();
  $maxValuesAndIterations = array();
  for ($i = $lowerBound; $i <= $upperBound; $i++) {
      
      $iter = findIteration($i);
      if ($iter > $maxIterations) {
          $maxIterations = $iter;
          $maxValue = $i;
          $maxValuesAndIterations[$maxValue] = $maxIterations;
      }else{
        $normalIterations = $iter;
        $normalValue = $i;
        $numbers[$normalValue] =$normalIterations;

      }
  }
  foreach ($numbers as $number) {
      echo "These are the numbers " .$number['number'] . " with iteration " . $number['iteration'] . "<br>";
  }
  foreach ($maxValuesAndIterations as $maxV) {
      echo "These are maximum iteration numbers ".$maxV['number']." and maximum iterations ". $maxV['iterations']. "<br>";
  }
}

if (isset($_GET["lowerBound"]) && isset($_GET["upperBound"])) {
  $lowBound = $_GET["lowerBound"];
  $upBound = $_GET["upperBound"];
 
  findIterationAndMaxValue($lowBound, $upBound);
}

?>