<?php
class Calculate{
    private $number;
    private $iterationNumber;

    private $firstNumber;

    private $numberDifference;

    private $progressionValues;
    //This method calculate 3*x+1 formula with the giveNumber variable and then set the result to Calculate class number variable

     function calculationOfNumber($givenNumber){
        $this->number= $givenNumber*3+1;
    }
    // This method return result
     function getNumber(){
     return $this ->number;
    }
    // This method will find iterations number by givenNumber variable
    function findIterationsNumber($givenNumber){
    $iteration=0;
    while($givenNumber!=1){
        if($givenNumber%2==0){
            $givenNumber=$givenNumber/2;
        }else{
            $givenNumber=$givenNumber*3+1;
        }
        $iteration++;
    }
    $this->iterationNumber=$iteration;
    }
    // This method will provide iteration number of entered number
    function getIterationNumber(){
        return $this->iterationNumber;
    }
// This function will find iteration number between lower bound and upper bound
function findMaxIterationsNumberBetweenBounds($lowerBound, $upperBound){
    $maxValues = array(); 
    for ($i = $lowerBound; $i <= $upperBound; $i++) {
        $this->findIterationsNumber($i); 
        $iterationNumber = $this->getIterationNumber(); 
        $maxValues["$i"] = $iterationNumber;
    }
    $this->maxValues = $maxValues; 
    return $maxValues; 
}
 

  // This method will find numbers progression from a1 to with d variable value which is difference between numbers
  function findProgressionNumber($enteredNumber, $numberDifference,$progressionNumber){
    $progressionArray = array();
    $progressionCalculation=0;

    for ($i = 1; $i <= $progressionNumber; $i++) {
    $progressionArray["a$i"] = $enteredNumber + $numberDifference * ($i-1);
    }
    $this->progressionValues = $progressionArray;
}

function getProgressionNumber(){
    return $this->progressionValues;
} 
}


$number = $_POST["number"];

$calculate = new Calculate();
if(isset($_POST["number"]) && is_numeric($_POST["number"])){
    $number = (int)$_POST["number"];
    $calculate->calculationOfNumber($number);
    echo "The result of the formula is... ". $calculate->getNumber() . "<br>";

    $calculate->findIterationsNumber($number);
    echo "The iterations number are... ".$calculate->getIterationNumber();
}
$lowerBound=$_POST["lowerBound"];
$upperBound=$_POST["upperBound"];
$maxTemp=0;
$maxKey=0;
if(isset($_POST["lowerBound"]) && (isset($_POST["upperBound"])) && is_numeric($_POST["lowerBound"]) && is_numeric($_POST["upperBound"])){
$keyValueArray=$calculate->findMaxIterationsNumberBetweenBounds($lowerBound,$upperBound);
foreach($keyValueArray as $x=>$y){
    echo "number $x: iteration :$y <br>";
    
   
}
}
$progressionValues = array();

$firstNumber = $_POST["firstNumber"];
$numberDifference = $_POST["numberDifference"]; 
$progressionNumber = $_POST["progressionNumber"];
if (isset($_POST["firstNumber"]) && is_numeric($_POST["firstNumber"]) && isset($_POST["numberDifference"]) && is_numeric($_POST["numberDifference"]) && isset($_POST["progressionNumber"]) && is_numeric($_POST["progressionNumber"])) { // corrected variable name
    $calculate->findProgressionNumber($firstNumber, $numberDifference,$progressionNumber);
    $progressionValues = $calculate->getProgressionNumber();
    foreach ($progressionValues as $x => $y) {
        echo "here is $x  result $y <br>";
    }
    echo "This method will show till a[$progressionNumber]";
}

?>