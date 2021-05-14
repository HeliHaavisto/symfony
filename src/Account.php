<?php


namespace App;


class Account
{
    private $balance;
    public $id;


    public function __construct($balance, $id){
        $this->balance = $balance;
        $this->id = $id;
    }

    public function getBalance(){
         return $this->balance;
    }

    public function deposit($depositSum) {
        if ($depositSum > 0) {
           return $this->balance = $this->balance + $depositSum;
        }
    }

    public function withdraw($withdrawSum){
        if ($withdrawSum > 0 && ($withdrawSum < $this->balance)){
            return $this->balance = $this->balance - $withdrawSum;
        }
    }
}