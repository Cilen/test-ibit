<?php


class Validator
{
    protected $isValid = true;

    //Масив доступних арифметичних операцій
    protected $validAction = ['addition', 'subtraction', 'multiplication', 'division'];

    private static $instance;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    //Перевірити чи вхідні дані є числом (integer or float)
    public function isNumeric($data) {
        if (!is_numeric($data)) $this->isValid = false;
    }

    //Перевірити чи вхідні дані знаходять в масиві доступних операцій
    public function isValidAction($data){
        if (!in_array($data, $this->validAction)) $this->isValid = false;
    }

    //Перевірити чи вхідні дані не рівні 0
    public function isZero ($data){
        if ($data == 0) $this->isValid = false;
    }

    //Витягнути приватну властивість $isValid
    public function getValidState(){
        return $this->isValid;
    }

}