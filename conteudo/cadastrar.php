<?php

    include("../db.php");
    $error=[];

    if(isset($_POST['confirmar'])){

        //1 - Registro dos dados
        if(!isset($_SESSION))
            session_start();

        foreach($_POST as $chave=>$valor)
            $_SESSION[$chave] = $mysqli->mysql_real_escape_string( $valor);

        //2 - Validação dos dados
        if(strlen($_SESSION['nome'])==0){
            $error[] = "Preencha o Campo Nome";
        }
        if(substr_count($_SESSION['email'], '@') !=1 || substr_count($_SESSION['email'], '.')<1){
            $error[] = "Preencha o Email corretamente";
        }
        if(strlen($_SESSION['senha'])<5){
            $error[] = "Senha não Atentende os Requisitos!!";
        }
        if(strlen($_SESSION['senha'],$_SESSION['rsenha'])!=0){
            $error[] = "As senhas não são iguais..";
        }


        //3 - Inserção no banco

        if(count($error)==0){

            $sql_code = "INSERT INTO users (
                nome,
                telefone,
                endereco,
                pass,
                data,
                email,
                nivel)
                
                VALUES (
                '$_SESSION[nome]',
                '$_SESSION[telefone]',
                '$_SESSION[end]',
                '$_SESSION[senha]',
                '$_SESSION[email]',
                '$_SESSION[nivel]'
                )";

                $confirmar = $mysqli->query($sql_code) or die ($mysqli->error);

                if($confirmar){
                    
                    unset(
                        $_SESSION[nome],
                        $_SESSION[telefone],
                        $_SESSION[end],
                        $_SESSION[senha],
                        $_SESSION[email],
                        $_SESSION[nivel]
                    );

                    echo "<script>location.href='index.php?p=inicial';</script>";
                }else{

                    $error[] = $confirmar;
                }
        }
    }
?>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../estilos/estilo.css"/>
        <meta charset="utf-8"/>
    </head>
    <body>

        <h1>Cadastrar Usuário</h1>
        <?php
            if(count($error)>0){
                echo "<div class='erro'>";
                foreach($error as $valor) echo "valor<br>";
                echo "</div>";
            }
        ?>

        <form action="index.php?p=cadastrar" method = "POST">

        <label for="nome">Nome:</label>
        <input name="nome" value="" required type="text"/>
        <p class="espaco"></p>

        <label for="telefone">Telefone:</label>
        <input name="telefone" value="" required type="text"/>
        <p class="espaco"></p>

        <label for="end">Endereço:</label>
        <input name="end" value="" required type="text"/>
        <p class="espaco"></p>

        <label for="email">Email:</label>
        <input name="email" value="" required type="email"/>
        <p class="espaco"></p>

        <label for="senha">Senha:</label>
        <input name="senha" value="" required type="password" placeholder="Digite uma senha min 5 caracteres"/>
        <br>A senha deve ter no minimo 5 caracteres:
        <p class="espaco"></p>

        <label for="rsenha">Repita a Senha:</label>
        <input name="rsenha" value="" required type="password"/>
        <p class="espaco"></p>

        <label for="data">Data Nascimento:</label>
        <input name="data" value="" required type="date"/>
        <p class="espaco"></p>

        <label for="nivel">Nivel de Acesso</label>
        <select name="nivel">
            <option value="1">User</option>
            <option value="2">Admin</option>
        </select>
        <p class="espaco"></p>

        <input type="submit" value="Salvar" name="confirmar"/>
        <a href="index.php?p=inicial">Cancelar Cadastro</a>

        </from>
    </body>
</html>