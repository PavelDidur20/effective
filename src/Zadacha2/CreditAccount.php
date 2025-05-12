<?php
namespace Zadacha2;

class CreditAccount extends BankAccount
{
    private int $balance;
    
    public function withdraw( int $amount)
    {
        if ($this->balance > $amount)
        {
            $this->balance -= $amount;
            echo 'Баланс уменьшился на ' . $amount;
        }
          
        else
        {
            $this->balance -= $amount;
            echo 'Баланс ушел в '.  $this->balance ; 
        }
    }

}
