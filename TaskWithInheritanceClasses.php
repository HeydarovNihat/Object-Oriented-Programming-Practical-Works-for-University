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

 

  
function getProgressionNumber(){
    return $this->progressionValues;
} 
}

class IterationCalculation extends Calculate{
   private $maxValues;

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

   // This method will find how many same number are same iteration
   function findSameIterationNumber($lowerBound,$upperBound){
    $temp=0;
    $counter=0;
    $histogramData = array();
    $sameValues=$this->findMaxIterationsNumberBetweenBounds($lowerBound,$upperBound);
    foreach($sameValues as $x=>$y){
        $counter=0;
        foreach($sameValues as $k=>$l){
    if($y==$l){
        $counter++;
        
    }
        $histogramData[$y]=$counter;
        
    
    }
    }
    return $histogramData;
   }

}

$lowerBound=$_POST["lowerBound"];
$upperBound=$_POST["upperBound"];
$iterationCalculation=new IterationCalculation();
$maxTemp=0;
$maxKey=0;
if(isset($_POST["lowerBound"]) && (isset($_POST["upperBound"])) && is_numeric($_POST["lowerBound"]) && is_numeric($_POST["upperBound"])){
$keyValueArray=$iterationCalculation->findMaxIterationsNumberBetweenBounds($lowerBound,$upperBound);
foreach($keyValueArray as $x=>$y){
    echo "number $x: iteration :$y <br>";
    
   
}
$statistics=$iterationCalculation->findSameIterationNumber($lowerBound,$upperBound);

foreach($statistics as $x=>$y){
    echo "Here is iteration number $x and its iteration statistics $y <br>";
}

}
$progressionValues = array();



?>