<?php
class Students {
    protected $studentName;
    protected $rollNo;
    protected $college;

    public function setBasicInfo($name,$roll,$college){
        $this->studentName = $name;
        $this->rollNo = $roll;
        $this->college = $college;
    }

    public function showGreeting(){
        self::showGrades();
        echo "Hello $this->studentName".",</br> Your roll number is $this->rollNo and your college is $this->college";
    }

    private function showGrades(){
        echo "Showing the grade";
    }

}

$newStudent = new Students();
$newStudent->setBasicInfo("Ashis Khadka",1,"KCT");
$newStudent->showGreeting();


echo "</br></br>";

$newStudent1 = new Students();
$newStudent1->setBasicInfo("Saurya Manandhar",2,"Herald");
$newStudent1->showGreeting();


echo "</br></br>";
$newStudent->showGreeting();
echo "</br></br>";

$newStudent1->showGreeting();



?>