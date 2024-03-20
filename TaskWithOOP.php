<html>
    <head></head>
    <body>
        <form action="TaskWithOOP.php" method="Post">
            Enter the number...<input type="text" name="number">
        <input type="submit">
    
        <form action="TaskWithOOP.php" method="Post">
            Enter the lower bound...<input type="text" name="lowerBound">
            Enter the upper bound...<input type="text" name="upperBound">
        <input type="submit">
        </form>
        <form action="TaskWithOOP.php" method="Post">
            Enter the a1 number...<input type="text" name="firstNumber">
            Enter d...<input type="text" name="numberDifference">
            Enter progression number...<input type="text" name="progressionNumber">
            <input type="submit">
        </form>
        <?php include "TaskWithOOPClasses.php"?>
    </body>
</html>