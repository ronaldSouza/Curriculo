<?php 


    include("cur.php");


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