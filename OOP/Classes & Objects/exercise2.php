<?php
class Person {

public $firstName;
public $lastName;
public $yearOfBirth;
public $height;
public $weight;

    public function __construct(string $firstName, string $lastName,int $yearOfBirth, int $height, int $weight) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->yearOfBirth = $yearOfBirth;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function ages($yearOfBirth) {
        return date('Y') - $yearOfBirth;
    }

    //getters

    public function getYearOfBirth() :int {
        return $this->yearOfBirth;
    }
}

$dragan = new Person('Dragan', 'Vujic', 1995, 184, 85);

echo $dragan->ages($dragan->getYearOfBirth());

