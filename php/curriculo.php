<?php

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $logr = $_POST['logr'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $obj = $_POST['obj'];
        
    $curso = $_POST['curso'];
    $inst = $_POST['inst'];
    $data_conc = $_POST['data_conc'];
    $opcao = $_POST['opcao'];
        
    $emp_ent = $_POST['data_ent'];
    $emp_sai = $_POST['data_sai'];
    $cargo = $_POST['cargo'];
    $empresa = $_POST['empresa'];
    $funcao = $_POST['funcao'];

    date_default_timezone_set('America/Sao_Paulo');
    
    $novo_nome = "";
    $img_dir = "";
    $dir = "../uploads". DIRECTORY_SEPARATOR;
    //renomear arquivo temporário
    if(isset($_FILES['foto']) and $_FILES['foto']['name'] <> "") {

        $ext = explode(".", strtolower($_FILES['foto']['name']))[1];
        $novo_nome = date("Y.m.d-H.i.s") . ".".$ext;
        $img_dir = $dir.$novo_nome;

        move_uploaded_file($_FILES['foto']['tmp_name'], $img_dir);
    }
        
    // organizar data na ordem correta
    $conc = "";
         
    $nova_conc = date("d/m/Y", strtotime($data_conc));
    $nova_emp_ent = date("d/m/Y", strtotime($emp_ent));
    $nova_emp_sai = date("d/m/Y", strtotime($emp_sai));
    if ($nova_emp_sai == "31/12/1969") {
        $nova_emp_sai = "Atual";
    }
    
    if ($opcao == "concluido") {
        $conc = "Curso Concluído em ". $nova_conc;
    } else {
        $conc = "Conclusão Prevista do Curso: ". $nova_conc;
    }
        
    // organizar o formato do telefone
    $phone_size = strlen($phone);
    $phone_aux = "";

    for ($i = 0; $i < $phone_size; $i++) {
        if ($i == 2) {
            $phone_aux = $phone_aux. " ";      
        }
            $phone_aux = $phone_aux. $phone[$i];
    }

    // organizar idiomas em um array para mostrar como lista desordenada
    $idiomas = array();
    if (isset($_POST['en'])) {
        array_push($idiomas, "Inglês");
    }
    if (isset($_POST['pt'])) {
        array_push($idiomas,"Português");
    }
    if (isset($_POST['de'])) {
        array_push($idiomas,"Alemão");
    }
    if (isset($_POST['es'])) {
        array_push($idiomas,"Espanhol");
    }
    if (isset($_POST['cn'])) {
        array_push($idiomas,"Chinês(Mandarim)");
    }
    if (isset($_POST['id'])) {
        array_push($idiomas,"Indonésio");
    }

    include_once '../html/curriculo_pag.html';

?>