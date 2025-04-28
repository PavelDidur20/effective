<?php
declare(strict_types=1);

// Задание 3 Современные версии и их ключевые возможности
class User
{
      public  readonly  int $id;
    public readonly string $email;
    public readonly string $name;
    public function __construct(int $id,string $email, string $name )
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
    }
}



enum OrderStatus
{
    case Pending;
    case Shipped;
    case Delivered;
}

// Задание 1
function getStatusMessage(string $status): string
{
    return match ($status) {
        'success' => "Операция выполнена успешно",
        'error'   => "Произошла ошибка",
        'pending' => "Операция в ожидании",
        default   => "Неизвестный статус",
    };
}

// Задание 2 
function calculatePrice(int $basePrice, float $discount, float $tax): int
{
    return (int)($basePrice * (1 - $discount) + $basePrice * $tax);
}

// Задание 4
function getDeliveryMessage(OrderStatus $status): string
{
    return match ($status) {
        OrderStatus::Pending   => "Заказ в ожидании",
        OrderStatus::Shipped   => "Заказ отправлен",
        OrderStatus::Delivered => "Заказ доставлен",
    };
}

// Задание 5: 
function getUserEmail(array $userData): ?string
{
    return $userData['profile']['email'] ?? null;
}

// Задание  1
function multiply(int|float $a, int|float $b): float
{
    return $a * $b;
}

//Задание  2  
function isAdult(int $age): bool
{
    return $age >= 18;
}

//Задание  3 
function calculateTax(float $cost, float $tax): float
{
    return round($cost * (1 + $tax), 2);
}

//Задание  3  
function getNamesLength(array $names): int
{
    foreach ($names as $name) {
        if (!is_string($name)) {
            throw new InvalidArgumentException('Все элементы массива должны быть строками.');
        }
    }
    return count($names);
}

//Задание  3 
function formatValue(int|float|string $val): string
{
    return (string)$val;
}

//Задание  4 
function filterEvenNumbers(array $numbers): array
{
    return array_values(array_filter($numbers, fn($v) => $v % 2 === 0));
}

//Задание  5 
function squareNumbers(array $numbers): array
{
    return array_map(fn($v) => $v * $v, $numbers);
}

// Задание  6 
function getUserEmails(array $users): array
{
    return array_map(fn($u) => $u['email'], $users);
}

//Задание  1 
function checkNumber(int|float $n): string
{
    if ($n > 0) return 'Положительное';
    if ($n < 0) return 'Отрицательное';
    return 'Ноль';
}

// Задание  2 
function getAgeCategory(int $age): string
{
    return match (true)
    {
        $age >= 0   && $age <= 12  => 'Ребенок',
        $age >= 13  && $age <= 17  => 'Подросток',
        $age >= 18  && $age <= 64  => 'Взрослый',
        $age >= 65                  => 'Пожилой',
        default                     => 'Некорректный возраст',
    };
}

//Задание  3 
function printNumbers(int $n): void
{
    for ($i = 1; $i <= $n; $i++)
     {
        echo "$i<br>";
    }
}

//Задание  4 
function factorial(int $n): ?int
{
    if ($n < 0) return null;
    $res = 1;
    while ($n > 1) 
    {
        $res *= $n;
        $n--;
    }
    return $res;
}

//Задание  5  
function printArrayItems(array $arr): void
{
    foreach ($arr as $item) 
    {
        echo "$item<br>";
    }
}

//Задание  6  
function printEvenNumbers(int $n): void
{
    $i = 1;
    while ($i <= $n)
     {
        if ($i % 2 !== 0) 
        { 
        $i++; continue;
    }
        echo "$i<br>";
        $i++;
    }
}

//Задание  1
function greetUser(string $name, string $lang = 'ru'): void
{
    echo $lang === 'ru' ? "Привет, $name!<br>" : "Hello, $name!<br>";
}

//Задание  2 
function calculateDiscount(int $price, int $discount = 10): int
{
    return (int)($price * (100 - $discount) / 100);
}

//Задание  3 
function orderPizza(string $size = 'medium', string $crust = 'thin', array $toppings = ['cheese']): string
{
    foreach ($toppings as $t) {
        if (!is_string($t)) {
            throw new InvalidArgumentException('Все топпинги должны быть строками.');
        }
    }
    $crustRu = $crust === 'thin' ? 'тонком тесте' : 'толстом тесте';
    return "Заказ: $size пицца на $crustRu с " . implode(', ', $toppings);
}

//Задание  4 
function formatText(string $text, bool $uppercase = false): string
{
    return $uppercase ? strtoupper($text) : $text;
}

//Задание  5 
function generatePassword(int $length = 8, bool $includeNumbers = true, bool $includeSpecialChars = false): string
{
    $letters      = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers      = '0123456789';
    $specials     = '!@#$%^&*()-_=+[]{}<>?';
    $alphabet = $letters
              . ($includeNumbers      ? $numbers  : '')
              . ($includeSpecialChars ? $specials : '');
    if (mb_strlen($alphabet) === 0)
    {
        throw new InvalidArgumentException('Нечего использовать для генерации пароля.');
    }
    $pwd = '';
    $max = mb_strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++) 
    {
        $pwd .= mb_substr($alphabet, random_int(0, $max), 1);
    }
    return $pwd;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>задачки</title>
</head>
<body>
    <h1>задачки блок1</h1>
    <section><h2>getStatusMessage()</h2>
        <pre><?php
            echo getStatusMessage('success'), "\n";
            echo getStatusMessage('error'), "\n";
            echo getStatusMessage('pending'), "\n";
            echo getStatusMessage('unknown'), "\n";
        ?></pre>
    </section>
    <section><h2>calculatePrice()</h2>
        <pre><?php
            echo calculatePrice(basePrice: 1000, discount: 0.1, tax: 0.15), "\n";
            echo calculatePrice(tax: 0.2, discount: 0.05, basePrice: 2000), "\n";
        ?></pre>
    </section>
    <section><h2>getDeliveryMessage()</h2>
        <pre><?php
            echo getDeliveryMessage(OrderStatus::Pending), "\n";
            echo getDeliveryMessage(OrderStatus::Shipped), "\n";
            echo getDeliveryMessage(OrderStatus::Delivered), "\n";
        ?></pre>
    </section>
    <section><h2>getUserEmail()</h2>
        <pre><?php
            echo getUserEmail(['profile'=>['email'=>'test@example.com']]), "\n";
            echo var_export(getUserEmail(['profile'=>null]), true), "\n";
        ?></pre>
    </section>
    <section><h2>multiply()</h2>
        <pre><?php
            echo multiply(3, 2), "\n";
            echo multiply(3.5, 2), "\n";
        ?></pre>
    </section>
    <section><h2>isAdult()</h2>
        <pre><?php
            var_export(isAdult(20));
            echo('<br>');
            var_export(isAdult(17));
            echo('<br>');
        ?></pre>
    </section>
    <section><h2>calculateTax()</h2>
        <pre><?php
            echo calculateTax(100, 0.2), "\n";
            echo calculateTax(99.99, 0.05), "\n";
        ?></pre>
    </section>
    <section><h2>getNamesLength()</h2>
        <pre><?php
            echo getNamesLength(['Alice','Bob','Charlie']), "\n";
            try { getNamesLength(['Alice',123]); } catch (Exception $e) { echo $e->getMessage(), "\n"; }
        ?></pre>
    </section>
    <section><h2>formatValue()</h2>
        <pre><?php
            echo formatValue(100), "\n";
            echo formatValue(99.99), "\n";
            echo formatValue('text'), "\n";
        ?></pre>
    </section>
    <section><h2>filterEvenNumbers()</h2>
        <pre><?php
            print_r(filterEvenNumbers([1,2,3,4,5,6]));
        ?></pre>
    </section>
    <section><h2>squareNumbers()</h2>
        <pre><?php
            print_r(squareNumbers([1,2,3,4]));
        ?></pre>
    </section>
    <section><h2>getUserEmails()</h2>
        <pre><?php
            print_r(getUserEmails([
                ['email'=>'a@example.com'],['email'=>'b@example.com']
            ]));
        ?></pre>
    </section>
    <section><h2>checkNumber()</h2>
        <pre><?php
            echo checkNumber(10), "\n";
            echo checkNumber(-5), "\n";
            echo checkNumber(0), "\n";
        ?></pre>
    </section>
    <section><h2>getAgeCategory()</h2>
        <pre><?php
            echo getAgeCategory(8), "\n";
            echo getAgeCategory(30), "\n";
            echo getAgeCategory(70), "\n";
        ?></pre>
    </section>
    <section><h2>printNumbers()</h2>
        <?php printNumbers(5); ?>
    </section>
    <section><h2>factorial()</h2>
        <pre><?php
            echo factorial(5), "\n";
            echo factorial(0), "\n";
            var_export(factorial(-1));
            echo('<br>');
        ?></pre>
    </section>
    <section><h2>printArrayItems()</h2>
        <?php printArrayItems(['apple','banana','cherry']); ?>
    </section>
    <section><h2>printEvenNumbers()</h2>
        <?php printEvenNumbers(10); ?>
    </section>
    <section><h2>greetUser()</h2>
        <?php
            greetUser('Иван');
            greetUser('John','en');
        ?>
    </section>
    <section><h2>calculateDiscount()</h2>
        <pre><?php
            echo calculateDiscount(price:1000), "\n";
            echo calculateDiscount(price:2000, discount:20), "\n";
        ?></pre>
    </section>
    <section><h2>orderPizza()</h2>
        <pre><?php
            echo orderPizza(), "\n";
            echo orderPizza(size:'large', toppings:['cheese','pepperoni']), "\n";
        ?></pre>
    </section>
    <section><h2>formatText()</h2>
        <pre><?php
            echo formatText('hello'), "\n";
            echo formatText('hello',true), "\n";
        ?></pre>
    </section>
    <section><h2>generatePassword()</h2>
        <pre><?php
            echo generatePassword(), "\n";
            echo generatePassword(length:12, includeSpecialChars:true), "\n";
        ?></pre>
    </section>
</body>
</html>
