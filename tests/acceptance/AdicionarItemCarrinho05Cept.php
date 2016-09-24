<?php 
$I = new AcceptanceTester($scenario);
$I->am('user');
$I->wantTo('Adcionar Item Carrinho');
$I->lookForwardTo('Item no carrinho');
$I->amOnPage('/livro/view/17');
$I->click('Alugar');
$I->see('Item Adicionado com sucesso');

