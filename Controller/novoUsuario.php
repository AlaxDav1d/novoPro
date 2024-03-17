<?php
    require_once('../Model/Model.php');
    require_once('../Connection/Conexao.php');
    
    $json = file_get_contents('php://input');
    $reqbody = json_decode($json);

     $nomeUsuario = $reqbody->nome;
     $senhaUsuario = $reqbody->senha;
     $nivelUsuario = $reqbody->nivel;

     $conexao = new Conexao();
     $bd = $conexao->abrirConexao();
     $usuarioModel = new Model($bd);

     $usuarioModel->nomeModel = $nomeUsuario;
     $usuarioModel->senhaModel = $senhaUsuario;
     $usuarioModel->userModel = $nivelUsuario;

     $retorno = $usuarioModel->criarLogin();
     echo json_encode($retorno);
     


?>