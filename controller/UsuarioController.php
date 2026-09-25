<?php
    include_once("../dao/UsuarioDAO.php");
    include_once("../model/Usuario.php");

    if($_POST){
        $uc = new UsuarioController();
        $uc->cadastrar();
    }

    if($_GET){
        if($_GET['acao']=="excluir"){
            $uc = new  UsuarioController();
            $uc->excluir();
        }
        if($_GET['acao']=="buscar"){
            $uc = new  UsuarioController();
            $uc->buscar();
        }
        if($_GET['acao']=="editar"){
            $uc = new  UsuarioController();
            $uc->editar();
        }
    }

    

    class UsuarioController{
        function cadastrar(){
           if ($_POST){

                $usuarioDAO = new UsuarioDAO();
                $usuario = new Usuario();

                $usuario->setNome($_POST['nome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setTelefone($_POST['telefone']);
                $usuario->setTipoUsuario($_POST['tipoUsuario']);
                $usuario->setSenha($_POST['senha']);

                echo "ENTREI NO CONTROLLER";
                $usuarioDAO->cadastrar($usuario);
            }
        }

        function listar(){
            $usuarioDAO = new UsuarioDAO();
           $listar = $usuarioDAO->listar();

           return $listar;
        }

        function excluir(){
            $usuarioDAO = new UsuarioDAO();

            $usuarioDAO->excluir($_GET['idUsuario']);
        }

        function buscar(){
            $usuarioDAO = new UsuarioDAO();
            $busca = $usuarioDAO->buscar($_GET['idUsuario']);

            return $busca;

        }

        function editar(){
            $usuarioDAO = new UsuarioDAO();
                $usuario = new Usuario();
 
                $usuario->setIdUsuario($_GET['idUsuario']);
                $usuario->setNome($_GET['nome']);
                $usuario->setEmail($_GET['email']);
                $usuario->setTelefone($_GET['telefone']);
                $usuario->setTipoUsuario($_GET['tipoUsuario']);
                $usuario->setSenha($_GET['senha']);
echo "ENTREI NO CONTROLLER";
            
                $usuarioDAO->editar($usuario);
        }
    }

   /* $uc = new  UsuarioController();
   $ucc = $uc->listar();
    while($lista = mysqli_fetch_assoc($ucc)){
        echo $lista['nome']. $lista['email'].$lista['telefone'].$lista['tipoUsuario'].$lista['senha'];
    }

        $uc = new  UsuarioController();
        $uc->excluir();*/

        $uc = new  UsuarioController();
       $teste = $uc->buscar();
        echo $teste['idUsuario'].$teste['nome'].$teste['email'];

?>

<html>
    <form method="post">
        <input type="text" name="nome">
        <input type="text" name="email">
        <input type="text" name="telefone">
        <input type="text" name="tipoUsuario">
        <input type="text" name="senha">

        <button type="submit">Cadastrar</button>
        

    </form>


</html>