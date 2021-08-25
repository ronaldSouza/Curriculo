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
    $dir = "uploads". DIRECTORY_SEPARATOR;
    if(isset($_FILES['foto'])) {

        $ext = explode(".", strtolower($_FILES['foto']['name']))[1];
        $novo_nome = date("Y.m.d-H.i.s") . ".".$ext;
        $dir = 'uploads/';
        $img_dir = $dir.$novo_nome;

        move_uploaded_file($_FILES['foto']['tmp_name'], $img_dir);
   }
       
    
    $conc = "";
    
    $nova_data = date("d/m/Y", strtotime($data_conc));
    if ($opcao == "concluido") {
        $conc = "Curso Concluído em ". $nova_data;
    } else {
        $conc = "Conclusão Prevista do Curso: ". $nova_data;
    }

    $nova_emp_ent = date("d/m/Y", strtotime($emp_ent));
    $nova_emp_sai = date("d/m/Y", strtotime($emp_sai));

    
   
    
    


    // organizar o formato do telefone
    $phone_size = strlen($phone);
    $phone_aux = "";

    for ($i = 0; $i < $phone_size; $i++) {
        if ($i == 2) {
            $phone_aux = $phone_aux. " ";
            
        }
            $phone_aux = $phone_aux. $phone[$i];
    }

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


?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">

    <head>
        <link rel="stylesheet" href="style_cur.css">
    </head>


    <body>
        <div id="topo">
            <h1 class="center"><?php echo $nome ?></h1>
            <h3 ><?php echo $logr. ", ". $bairro. " | ". $cidade. ", ". $estado. " | ". $phone_aux. " | ". $email ?></h3>
        </div>

        <img src=<?php echo $img_dir?>>

        <div id="centro">
            <div>
                <h1>Objetivos</h1>
                <h3><?php echo $obj ?></h3> 
            </div>
            <div>
                <h1>Formação </h1>
                <h3><?php echo $curso. ", ". $inst?></h3>
                <h3><?php echo $conc ?></h3>
            </div>

            <div>
                <h1>Experiência</h1>
                <h3><?php echo $nova_emp_ent." - ". $nova_emp_sai ?></h3>
                <h3><?php echo $cargo. ", ". $empresa ?></h3>
                <h3><?php echo $funcao ?></h3>

            </div>    
            
            <div>
                <h1>Idiomas</h1>
                <ul>
                    <?php
                        for ($i = 0; $i < $idiomas; $i++) {
                            if (empty($idiomas[$i])) {
                                break;
                            }else {
                                echo "<li>$idiomas[$i]</li>";
                            }
                        }
                    ?>    
                </ul>
            </div>

            
            
        </div>


    </body>



</html>