<?php
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});


$firstNumber = floatval($_POST["firstNumber"]);
$lastNumber = floatval($_POST['lastNumber']);
$action = $_POST['action'];

//Валідація вхідних даних
$validator = Validator::getInstance();      //Створити обєкт Validator
$validator->isNumeric($firstNumber);
$validator->isNumeric($lastNumber);
$validator->isValidAction($action);
//Якщо виконується операція ділення -- перевіряємо чи $lastNumber == 0
if ($action == 'division') {
    $validator->isZero($lastNumber);
}


//Якщо вхідні дані валідні, виконуємо операцію
if ($validator->getValidState()) {
    echo Calculator::$action($firstNumber, $lastNumber);
} else {
    http_response_code(400);
    echo 'The data entered is incorrect';
}

