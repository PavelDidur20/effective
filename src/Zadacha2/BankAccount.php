<?php
namespace Zadacha2;
class BankAccount implements Payable
{

    private int $balance;

    
    public function pay(int $amount)
    {
        $this->withdraw($amount);
    }


    public function __construct(int $amount)
    {
        $this->balance = $amount;
    }
    
    public function deposit(int $amount)
    {
        $this->balance += $amount;
    }
    
    public function withdraw(int $amount)
    {
        if ($this->balance > $amount)
            $this->balance -= $amount;
        else
            echo 'Недостаточно средств';
    }

    public function getBalance()
    {
        echo 'Баланс ' . $this->balance;
    }

}