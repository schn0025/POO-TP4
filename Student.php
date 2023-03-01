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
     * @throws OutOfRangeException renvoi une value erreur ci index est trop grand ou negatif
     * @param integer $index indice de la valeur chercher
     */
    public function getMark(int $index): float // throw OutOfRangeException
    {
        if($index < 0 || $index >= count($this->marks)){
            throw new OutOfRangeException ( "getMark - indice invalide : $index");
        }
        return $this->marks[$index];
    }
    /**
     * setMark modifi un note a un indice donné
     *
     * @param integer $index indice de la note
     * @param float $note nouvelle note
     */
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
    /**
     * getMarksCount retourne le nombre de notes dont dispose un etudiant
     *
     * @return integer nombre de note de l'etudiant
     */
    public function getMarksCount(): int
    {
        $nbNote = 0;
        foreach($this->marks as $note){
            $nbNote++;
        }
        return $nbNote;
    }
    /**
     * getMean retourne la moyenne des notes d'un etudiant
     *
     * @throws DivisionByZeroError renvoi un erreur si il n'y a pas de note
     * @return float renvoi la moyenne des notes
     */
    public function getMean():float
    {
        if($this->getMarksCount() == 0){
            throw new DivisionByZeroError ( "getMark - Division par 0");
        }
        $somme = 0;
        foreach($this->marks as $note){
            $somme + $note;
        }
        return $somme / $this->getMarksCount();
    }
    /**
     * getMinimum retourne la note minimale obtenue par un  etudiant
     *
     * @return float renvoi la plus petit note de l'etudiant
     */
    public function getMinimum():float
    {
        $mini = $this->getMark(0);
        foreach($this->marks as $note){
            if($mini == -1){
                $mini = $note;
            }
            elseif($note < $mini){
                $mini = $note;
            }
        }
        return $mini;
    }
    /**
     * getMaximumIndex retourne l’indice de la note maximale obtenue par un etudiant
     *
     * @return integer
     */
    public function getMaximumIndex():int
    {
        $this->getMark(0);
        $maxI = 0;
        foreach($this->marks as $id=>$note){
            if($this->marks[$maxI] < $note){
                $maxI = $id;
            }
        }
        return $maxI;
    }
    /**
     * contains prend en paraetre une note. Elle retourne true si 
     * la note est presente parmi les notes de l’etudiant, false sinon
     *
     * @param float $note note rechercher
     * @return boolean True ci l'etudiant a la note et False sinon
     */
    public function contains(float $note): bool
    {
        $i = 0;
        $rep = False;
        while($i < $this->getMarksCount() && !$rep){
            if(abs($this->marks[$i] - $note) < 0.0001){
                $rep = True;
            }
            $i++;
        }
        return $rep;
    }
    /**
     * getOccurenceCount prend en parametre une note. Elle retourne le nombre de fois 
     * ou la note est presente parmi les notes de l’etudian
     *
     * @param float $note note a chercher
     * @return integer nombre de fois ou la note apparet
     */
    public function getOccurenceCount(float $note): int
    {
        $nb = 0;
        foreach($this->marks as $noteIn){
            if(abs($noteIn - $note) < 0.0001){
                $nb ++;
            }
        }
        return $nb;
    }
    /**
     * getFirstOccurrenceIndex prend en parametre une note. Elle retourne 
     * l’indice de la premiere occurrence de la note parmi les notes de l’etudiant
     *
     * @throws UnexpectedValueException renvoi une erreu ci la valeur n'est pas presente
     * @param float $note note a chercher
     * @return integer indice de la premiere occurrence
     */
    public function getFirstOccurrenceIndex(float $note):int
    {
        if(!$this->contains($note)){
            throw new UnexpectedValueException ("note non presente");
        }
        $i = 0;
        $trouver = False;
        while($i < $this->getMarksCount() && !$trouver){
            if(abs($this->marks[$i] - $note) < 0.0001){
                $trouver = True;
            }
            else{
                $i++;
            }
        }
        return $i;
    }
    /**
     * getLastOccurrenceIndex prend en parametre une note. Elle retourne l’indice de 
     * la derniere occurrence de la note parmi les notes de l’ ́etudian
     *
     * @throws UnexpectedValueException renvoi une erreu ci la valeur n'est pas presente
     * @param float $note note a chercher
     * @return integer indice de la derrnier occurrence 
     */
    public function getLastOccurrenceIndex(float $note): int
    {
        if(!$this->contains($note)){
            throw new UnexpectedValueException ("note non presente");
        }
        $i = 0;
        $trouver = 0;
        $occ = $this->getOccurenceCount($note);
        while($i < $this->getMarksCount() && $trouver < $occ){
            if(abs($this->marks[$i] - $note) < 0.0001){
                $trouver++ ;
            }
            else{
                $i++;
            }
        }
        return $i;
    }
    /**
     * swapMarks rend en parametre deux indices. Elle  ́echange le contenu de 
     * deux cases de l’attribut d’instance marks
     * dont les indices sont pass ́es en parametre
     *
     * @param integer $ind1 indice de la 1er note 
     * @param integer $ind2 indice de la 2eme note
     */
    public function swapMarks(int $ind1, int $ind2)
    {
        $note1 = $this->getMark($ind1);
        $note2 = $this->getMark($ind2);
        $this->setMark($ind1, $note2);
        $this->setMark($ind2, $note1);
    }
    
}