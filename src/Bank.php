<?php


namespace App;


class Bank
{
    private $accounts;

    public function __construct() {
        $this->accounts = [];
    }

    public function addAccount(Account $account)
    {
        $this->accounts[] = $account;
    }

    public function getAccountById($accountId)
    {
        //for($i=0; $i <= count($this->accounts); $i++ ){
            //if(in_array($accountId, $this->accounts)){
           // $index = array_search($accountId, $this->accounts);

            return $this->accounts[1];
            //}
        //}
    }
}