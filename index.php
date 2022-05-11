
<!DOCTYPE html>
 <html lang="pt-br">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../tela-login/css/style.css">
     <title>Login</title>
 </head>
 <body>
    <div>
        <h1>Login</h1>
        <form action="" method="POST">
            <p>
                <input class="input100" type="text" name="usuario" placeholder="Usuário">
               
            </p>
            <p>
                <input class="input100" type="password" name="senha" placeholder="Senha">
                
            </p>
            <p class="botao">
                <button type="submit">Entrar</button>
            </p>
        </form>
    </div>
    <?php
    require_once 'classes/usuarios.php';
       $u = new User;
 
    if (isset($_POST['usuario'])){

        $usuario = addslashes($_POST['usuario']);
        $senha = addslashes($_POST['senha']);

        if (!empty($usuario) && !empty($senha)){
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == ""){ 
                if (!$u->logar($usuario, $senha)){  
                    ?>
                    <div class="msg-erro">
                        Credenciais incorretas!
                    </div>
                    <?php
    }
    } else {
        ?>
        
        <div class="msg-erro">
            <?php echo "Erro: " . $u->msgErro;?>
        </div>
        <?php
    }
    }else
    {
        ?>
        <div class="msg-erro">
        Preencha os campos obrigatórios!
        </div>
        <?php
    }
}   
    ?>
    
 </body>
 </html>