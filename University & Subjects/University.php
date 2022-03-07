<?php
require_once "AbstractUniversity.php";

/**
 * Class University
 */
class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        $subject = new Subject($code, $name);
        $this->subjects[] = $subject;

        return $subject;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach($this->subjects as $subject) {
            if($subject->getCode() === $subjectCode) {
                return $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
        return null;
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        foreach($this->subjects as $subject) {
            if($subject->getCode() === $subjectCode) {
                foreach($subject->getStudents() as $student) {
                    print_r($student->getName());
                }
            }
    }
    }

    public function getStudentNumberForSubject(string $subjectCode)
    {
        foreach($this->subjects as $subject) {
            if($subject->getCode() === $subjectCode) {
                foreach($subject->getStudents() as $student) {
                    print_r($student->getStudentNumber());
                }
            }
        }
    }

    public function getNumberOfStudents(): int
    {
        $totalNumberOfStudents = (int) 0;

        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $student) {
                $totalNumberOfStudents++;
            }
        }

        return $totalNumberOfStudents;

    }

    public function print()
    {
        foreach($this->subjects as $subject) {
            $subjectCode = $subject->getCode();
            echo $subject->getCode() . " - " . $subject->getName() . "<br>";
            echo "-------------" . "<br>";
            foreach($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber();
                echo "<br>";
            }
            echo "<br>";
        }
    }

}