<?php


global $a1;
global $a2;
global $a3;
global $b1;
global $b2;
global $b3;
global $c1;
global $c2;
global $c3;
global $opcao;
$opcao = 'o';



function reiniciaJogo()
{
    global $a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3, $opcao;
    $a1 = '';
    $a2 = '';
    $a3 = '';
    $b1 = '';
    $b2 = '';
    $b3 = '';
    $c1 = '';
    $c2 = '';
    $c3 = '';
    $opcao = 'o';


    iniciaJogo();
};

function trataTabuleiro($linha, $coluna, $opcao)
{
    global $a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3, $opcao;

    if ($linha == "1") {
        switch ($coluna) {
            case '1':
                $a1 =  $opcao;
                break;
            case '2':
                $a2 =  $opcao;
                break;
            case '3':
                $a3 =  $opcao;
                break;
        }
    }

    if ($linha == "2") {
        switch ($coluna) {
            case '1':
                $b1 =  $opcao;
                break;
            case '2':
                $b2 =  $opcao;
                break;
            case '3':
                $b3 =  $opcao;
                break;
        }
    }


    if ($linha == "3") {
        switch ($coluna) {
            case '1':
                $c1 =  $opcao;
                break;
            case '2':
                $c2 =  $opcao;
                break;
            case '3':
                $c3 =  $opcao;
                break;
        }
    }
}

function tabuleiro()
{
    global $a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3;
    echo "[ $a1 ] [ $a2 ] [ $a3 ]" . PHP_EOL .
        "[ $b1 ] [ $b2 ] [ $b3 ]" . PHP_EOL .
        "[ $c1 ] [ $c2 ] [ $c3 ]" . PHP_EOL;
}



function verificaVitorioso()
{
    global $a1, $a2, $a3, $b1, $b2, $b3, $c1, $c2, $c3;


    $o  = ($a1 === 'o' && $a2 === 'o' && $a3 === 'o')
        || ($b1 === 'o' && $b2 === 'o' && $b3 === 'o')
        || ($c1 === 'o' && $c2 === 'o' && $c3 === 'o')
        || ($a1 === 'o' && $b2 === 'o' && $c3 === 'o')
        || ($a3 === 'o' && $b2 === 'o' && $c1 === 'o')
        || ($a1 === 'o' && $b1 === 'o' && $c1 === 'o')
        || ($a2 === 'o' && $b2 === 'o' && $c2 === 'o')
        || ($a3 === 'o' && $b3 === 'o' && $c3 === 'o');

    $x = ($a1 === 'x' && $a2 === 'x' && $a3 === 'x')
        || ($b1 === 'x' && $b2 === 'x' && $b3 === 'x')
        || ($c1 === 'x' && $c2 === 'x' && $c3 === 'x')
        || ($a1 === 'x' && $b2 === 'x' && $c3 === 'x')
        || ($a3 === 'x' && $b2 === 'x' && $c1 === 'x')
        || ($a1 === 'x' && $b1 === 'x' && $c1 === 'x')
        || ($a2 === 'x' && $b2 === 'x' && $c2 === 'x')
        || ($a3 === 'x' && $b3 === 'x' && $c3 === 'x');

    if ($o) {
        echo "O venceu!" . PHP_EOL;
        reiniciaJogo();
    }

    if ($x) {
        echo "X venceu!" . PHP_EOL;
        reiniciaJogo();
    }
}


function iniciaJogo()
{
    global $opcao;



    tabuleiro();

    for ($i = 0; $i < 9; $i++) {
        verificaVitorioso();


        if ($opcao == 'o') {
            $opcao = 'x';
        } else if ($opcao == 'x') {
            $opcao = 'o';
        }
        echo "vez do $opcao" . PHP_EOL;

        $linha = rtrim(fgets(STDIN));
        $coluna =  rtrim(fgets(STDIN));

        trataTabuleiro($linha, $coluna, $opcao);

        tabuleiro();
    }
}


//Inicia o jogo
iniciaJogo();