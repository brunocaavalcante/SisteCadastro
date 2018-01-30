<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../estilos/estilo.css"/>
        <meta charset="utf-8"/>
    </head>
    <body>

        <h1>Cadastrar Usuário</h1>

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
        <input name="senha" value="" required type="password"/>
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

        <input type="submit" value="Salvar" name="confirma"/>
        <a href="index.php?p=inicial">Cancelar Cadastro</a>

        </from>
    </body>
</html>