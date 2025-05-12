<?php
namespace Zadacha2;

class SavingsAccount extends BankAccount
{
    private int $balance;
    private int $percentage;
    
    public function applyInterest()
    {
        $this->balance += ($this->percentage/100)*$this->balance;
    }

    public function __construct(int $balance, int $percentage)
    {
        $this->balance = $balance;
        $this->percentage = $percentage;
    }
}
