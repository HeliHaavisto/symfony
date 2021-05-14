<?php

namespace App\Controller;

use App\Bank;
use App\Account;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BankAccountController extends AbstractController
{
    #[Route('/bank/account')]
    public function index(): Response
    {
        $bank = new Bank();
        $firstAccount = new Account(1000, 12345);
        $secondAccount = new Account(5000, 123);
        $thirdAccount = new Account(10000, 9999);

        $bank->addAccount($firstAccount);
        $bank->addAccount($secondAccount);
        $bank->addAccount($thirdAccount);

        $bank->getAccountById(9999)->deposit(-1000);
        $bank->getAccountById(9999)->deposit(1000);
        $bank->getAccountById(123245)->deposit(1000);

        $bank->getAccountById(123)->withdraw(-10000);
        $bank->getAccountById(123)->withdraw(10000);
        $bank->getAccountById(123)->withdraw(1000);

        return $this->json([
            'bank_id' => 123,
            'balance' => $bank->getAccountById(123)->getBalance(),
        ]);
    }
}
