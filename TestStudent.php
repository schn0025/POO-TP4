<?php
// Schneider Arthur
declare(strict_types = 1);
require_once "Student.php" ;

//fonction d'autre ex
function decodeBooleen(bool $boul): string
{
    $rep = "Faux";
    if ($boul)
        $rep = "Vrai";
    return $rep;
}

/* Question 1
echo "Question 1 \n";
$inconnu = new Student;
var_dump($inconnu);
echo "\n";
*/

//Qusetion 2
echo "\n Question 2 \n";
$louis = new Student("Dupont", "Louis");
var_dump($louis);

//Qusetion 3
echo "\n Question 3 \n";
$notes = array(9.78 , 18 , 12.5 , 10 , 16.25);
$kevin = new Student("Laplace", "Kevin", $notes);

//Qusetion 5
echo "\n Question 4 \n";
echo $kevin, "\n";
echo $louis, "\n";

//Qusetion 6
echo "\n Question 6 \n";
echo $kevin."\n";
$notes[0] = 0;
echo $kevin."\n";

//Qusetion 7
echo "\n Question 7 \n";
$louis->setLastName("Viton");
echo $kevin->getLastName();
echo "\n $louis \n";

//Qusetion 8
echo "\n Question 8 \n";

try
{
    echo $kevin->getMark(5)."\n";
}
catch (OutOfRangeException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 9
echo "\n Question 9 \n";
echo "$kevin \n";
$kevin->setMark(1,5);
echo "$kevin \n";

//Quetion 10
echo "\n Question 10 \n";
echo decodeBooleen($kevin->isEqual($kevin)),"\n";
echo decodeBooleen($louis->isEqual($kevin)),"\n";

// Question 11
echo "\n Question 11 \n";
echo $kevin->getMarksCount(),"\n";
echo $louis->getMarksCount(),"\n";

//Quetion 12
echo "\n Question 12 \n";
try
{
    echo $kevin->getMean(),"\n";
    echo $louis->getMean(),"\n";
}
catch (DivisionByZeroError $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 13
echo "\n Question 13 \n";
try
{
    echo $kevin->getMinimum(),"\n";
    echo $louis->getMinimum(),"\n";
}
catch (OutOfRangeException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 14
echo "\n Question 14 \n";
echo $kevin,"\n";
try
{
    echo $kevin->getMaximumIndex(),"\n";
    echo $louis->getMaximumIndex(),"\n";
}
catch (OutOfRangeException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 15
echo "\n Question 15 \n";
echo decodeBooleen($kevin->contains(5)),"\n";
echo decodeBooleen($louis->contains(20)),"\n";

//Quetion 16
echo "\n Question 16 \n";
echo $kevin->getOccurenceCount(5),"\n";
echo $louis->getOccurenceCount(5),"\n";

//Quetion 17
echo "\n Question 17 \n";
try
{
    echo $kevin->getFirstOccurrenceIndex(5),"\n";
    echo $louis->getFirstOccurrenceIndex(5),"\n";
}
catch (UnexpectedValueException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 18
echo "\n Question 18 \n";
echo $kevin,"\n";
try
{
    echo $kevin->getLastOccurrenceIndex(16.25),"\n";
    echo $louis->getLastOccurrenceIndex(5),"\n";
}
catch (UnexpectedValueException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}

//Quetion 19
echo "\n Question 19 \n";
echo $kevin,"\n";
try
{
    echo $kevin->swapMarks(0,2),"\n";
    echo $louis->swapMarks(0,3),"\n";
}
catch (OutOfRangeException $e)
{
    //gestion de l’exception, par exemple :
    echo $e->getMessage()."\n";
}
echo $kevin;