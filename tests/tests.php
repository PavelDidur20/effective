<?php
require_once __DIR__ . "/../vendor/autoload.php";

$user = new App\Models\User("Иван");
echo $user->getName();

$service = new App\Services\UserService();
echo $service->getUserGreeting("Олег") . "\n"; 


$order = new App\Models\Order();
$order->log("Заказ создан"); 

$car = new Zadacha1\Car('Toyota', 'something',14234);
print_r($car->getCarInfo());
print_r($car->getYear());
print_r($car->move());

$elCar = new Zadacha1\ElectricCar('Some brand','Lombardgini',1842,500000);
print_r($elCar->getBatteryInfo());

$bcl = new Zadacha1\Bicycle();
print_r($bcl->move());


$bank = new Zadacha2\BankAccount(0);
$bank->deposit(100);
$bank->withdraw(10);
$bank->withdraw(1000);

$savings = new Zadacha2\SavingsAccount(0, 12);
$savings->deposit(100);
$savings->applyInterest();
print_r($savings->getBalance());
$savings->withdraw(10);
$savings->withdraw(1000);


$credit = new Zadacha2\CreditAccount(0);
$bank->deposit(100);
$bank->withdraw(10);
$bank->withdraw(1000);


function renderShape(Zadacha3\Shape $shape): void
{
        $shape->draw();
        echo "Площадь: " . round($shape->getArea(), 2) . "\n";
}



$rect = new Zadacha3\Rectangle(10, 5);
echo $rect->getArea(); 
$circle = new Zadacha3\Circle(7);

echo round($circle->getArea(), 2); 

$rect->draw(); 
$circle->draw();

renderShape(new Zadacha3\Rectangle(5, 5));

renderShape(new Zadacha3\Circle(3));

$car = new Zadacha3\Car();
$car->move(); 
$car->refuel(); 

$bike = new Zadacha3\Bike();
$bike->move(); 