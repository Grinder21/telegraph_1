<?php

    $employee_1 = ['age' => 30, 'gender' => 'male', 'name' => 'Nick', 'surname' => 'Ivanov', 'position' => 'CEO'];
    $employee_2 = ['age' => 33, 'gender' => 'female', 'name' => 'Ann', 'surname' => 'Petrova', 'position' => 'CTO'];

    class Employee {
        public $age, $gender, $name, $surname, $position;

        public function displayName() {
            echo $this->name . PHP_EOL;
        }

        public function displayAge() {
            echo $this->age . PHP_EOL;
        }

        public function changePosition($newPosition) {
            echo $this->position = $newPosition;
        }
    }

    $employee_1 = new Employee();
    $employee_2 = new Employee();



//
//    class Building {
//        const MAX_FLOORS = 20;
//        private $floors;
//
//        public function setFloorsNumber($floorNumber) {
//            if ($floorNumber > self::MAX_FLOORS) {
//                echo "Превышено макс.число этажей!" . PHP_EOL;
//                return;
//            }
//            $this->floors = $floorNumber;
//        }
//
//        public function showFloorsNumber() {
//            echo $this->floors . PHP_EOL;
//        }
//    }
//
//    $building = new Building();
//
//    $building->setFloorsNumber(30);
//    $building->setFloorsNumber(10);
//    $building->showFloorsNumber();