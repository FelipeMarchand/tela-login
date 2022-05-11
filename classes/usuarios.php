<?php

Class User{

    private $pdo; 
    public $msgErro = ""; 
    
    public function conectar($login, $localhost, $usuario, $senha){
        global $pdo;
  
    try {
        $pdo = new PDO("mysql:dbname=".$login.";host=".$localhost,$usuario, $senha);   
    }
     catch (PDOException $e) {
        
        $msgErro = $e->getMessage();
        print_r($e);       
    }
     
    }
 
    public function logar($usuario, $senha){
        global $pdo;
        
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql-> bindValue(":e", $usuario);
        $sql-> bindValue(":s", md5($senha));
        $sql->execute();
        if($sql-> rowCount() > 0){
           
            $dado = $sql ->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; 
        }
        else{
            return false; 
        } 
    }
}
?>