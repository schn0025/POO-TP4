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
$kevin->setMark(1,0);
echo "$kevin \n";

//Quetion 10
echo "\n Question 10 \n";
echo decodeBooleen($kevin->isEqual($kevin)),"\n";
echo decodeBooleen($louis->isEqual($kevin)),"\n";
