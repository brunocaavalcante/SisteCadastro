
<?php 
   include ("db.php");

   $consulta = "SELECT * FROM users";
   $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<html>

    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="estilos/estilo.css"/>
    </head>

    <body class="index"> 

        <a href="index.php?p=cadastrar"/>Cadastrar</a>
        <p class="espaco"></p>
        
        <div class="principal">
            
            <table border="1" cellpadding="10">
                <h2>Usuários</h2>

                <tr class="titulo">
                    <td>id</td>
                    <td>nome</td>
                    <td>telefone</td>
                    <td>endereco</td>
                    <td>data</td>
                    <td>email</td>
                    <td>Nivel de Acesso</td>
                    <td>Ação</td>
                </tr>

                <?php while($dado = $con -> fetch_array()){?>           
                <tr>
                        <td><?php  echo $dado["id"]; ?></td>
                        <td><?php  echo $dado["nome"]; ?></td>
                        <td><?php  echo $dado["telefone"]; ?></td>
                        <td><?php  echo $dado["endereco"]; ?></td>
                        <td><?php  echo date("d/m/Y", strtotime($dado["data"])); ?></td>
                        <td><?php  echo $dado["email"]; ?></td>
                        <td><?php  echo $dado["nivel"]; ?></td>
                        <td><a href="index.php?id=editar<?php echo $dado["id"]; ?>">Editar</a>
                            <a href="index.php?id=excluir<?php echo $dado["id"]; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>