<?php
        require_once('../Model/Model.php');
        require_once('../Connection/Conexao.php');
        $json = file_get_contents('php://input');
        $reqbody = json_decode($json);
        $nulo = $reqbody->nulo;

        $conexao = new Conexao();
        $bd = $conexao->abrirConexao();
        $usuarioModel = new Model($bd);
        $usuarioModel->nomeModel = $nulo;
        $retorno = $usuarioModel->listarUsuarios();
        
        echo json_encode($retorno);
?>