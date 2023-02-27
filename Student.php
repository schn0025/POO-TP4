<?php
// Schneider Arthur
declare(strict_types = 1);

class Student{
    private string $lastName;
    private string $firstName;
    private array $marks;
    /**
     * la fonction __construct inisialise les attribut "lastName
     * et "firstName" au valeur passer en parametre. elle crée
     * un tableaux vide pour "marks"
     *
     * @param string $lastName le nom de l'etudiant
     * @param string $firstName le prénom de l'etudiant
     * @param array $marks la liste des notes de l'etudiant
     */
    public function __construct(string $lastName ,string $firstName, array $marks = array())
    {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->marks = array();
            for($i = 0; $i < count($marks); $i++){
                $this->marks[$i] = $marks[$i];
            }
    }
    /**
     * La fonction __toString permet de donner une interprétation l'or de l'appel d'une
     * instance de l'objet Student en type string
     *
     * @return string la chaine a afficher
     */
    public function __toString(): string
    {
        $aff = "$this->lastName $this->firstName \nNotes : [  ";
        for($i = 0; $i < count($this->marks); $i++){
            $aff .= $this->marks[$i];
            $aff .= "  ";
        }
        $aff .= "]";
        return $aff;
    }
    /**
     * getLastName est un accesseur qui envoi le nom de l'etudiant
     *
     * @return string nom de l'etudiant
     */
    public function getLastName():string
    {
        return $this->lastName;
    }
    /**
     * setLastName est un modificateurs qui permet de redefinir le nom de l'etudiant
     *
     * @param string $name nouveau non de l'etudiant
     */
    public function setLastName(string $name)
    {
        $this->lastName = $name;
    }
    /**
     * la fonction getMark est un accesseurs qui renvoi la valeur de la note a l'indice
     * $index ou renvoi une erreur ci l'a valeur de $index n'est pas dans les indice de
     * marks
     *
     * @throws renvoi une value erreur ci index est trop grand ou negatif
     * @param integer $index indice de la valeur chercher
     */
    public function getMark(int $index): float // throw OutOfRangeException
    {
        if($index < 0 || $index >= count($this->marks)){
            throw new OutOfRangeException ( "getMark - indice invalide : $index");
        }
        return $this->marks[$index];
    }
    public function setMark(int $index, float $note)
    {
        if($index < 0 || $index >= count($this->marks)){
            throw new OutOfRangeException ( "getMark - indice invalide : $index");
        }
        $this->marks[$index] = $note;
    }
    /**
     * isEqual retourn true si les deux etudiant on eu les même notes false sinon
     *
     * @param Student $stid2 etudiant deux
     * @return boolean vrais ci les deux etudiant on eu les mêm note false sinon
     */
    public function isEqual(Student $stid2): bool
    { 
        $rep = true;
        $i = 0;
        if(count($this->marks) == count($stid2->marks)){
            while( $rep && $i < count($this->marks)){
                $rep = abs($this->marks[$i] - $stid2->marks[$i]) < 0.0001;
                $i += 1;
            }
        }
        else{
            $rep = false;
        }
        return $rep;
    }
}