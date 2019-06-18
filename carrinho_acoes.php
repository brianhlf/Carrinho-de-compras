<?php
session_start(); //Avisando o PHP que essa página trabalha com sessões.

 /**
  * Verifico se a variável de ações existe, para então verificar qual ação o usuário ordenou.
  */
  if(isset($_GET['acao_carrinho'])){
        
      switch($_GET['acao_carrinho']){

         case 'limpar'; //na URL do navegador: carrinho_acoes.php?acao_carrinho-limpar
             $_SESSION['carrinho'] = array(); //Ao definir o carrinho como array novamente,limpamos ele.
        break;

        case 'add' ; // adiciona um produto ao carrinho.

        $produto = $_GET['carr_produto'];
        $preco = $_GET ['carr_preco'];
        $qnt = $_GET ['carr_qnt'];
        $total = $preco * $qnt;

        $dados_produtos_a_ser_add = array("produto" => $produto, "preco" => $preco, "quantidade" => $qnt,
                          "total" => $total);

        $_SESSION['carrinho'][] = $dados_produtos_a_ser_add;
        break;
        
        case 'remover';
          $item_carrinho = $_GET['item'];

          if(isset($_SESSION['carrinho'][$item_carrinho])) { //verificando se o item realmente existe.
             unset($_SESSION['carrinho'][$item_carrinho]); // se existe, destrói o item.
            }
        break;
      } // fim do switch
  } // fim do if do isset