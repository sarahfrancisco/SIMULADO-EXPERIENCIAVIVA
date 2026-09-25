<?php
include_once("../config/conexao.php");
include_once("../model/Usuario.php");


    class UsuarioDAO{
        function cadastrar($usuario){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $telefone = $usuario->getTelefone();
            $tipoUsuario = $usuario->getTipoUsuario();
            $senha = $usuario->getSenha();

            $sql = "INSERT INTO usuario (nome, email, telefone, tipoUsuario, senha)
                    VALUES(?,?,?,?,?)";
            
            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "sssss",
                $nome, 
                $email,
                $telefone,
                $tipoUsuario,
                $senha
            );

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "USUARIO CADASTRADO";
        }

        function listar(){
             $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "SELECT * FROM usuario";

            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($stmt);
                $listar = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            return $listar;
        }

        function excluir($idUsuario){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "DELETE FROM usuario
                    WHERE idUsuario = ?";
               
             $stmt = mysqli_prepare($conexao, $sql);

             mysqli_stmt_bind_param(
                $stmt,
                "i",
                $idUsuario
             );
            
             mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "USUARIO EXCLUIDO";

        }

        function buscar($idUsuario){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "SELECT idUsuario, nome, email, telefone, tipoUsuario, senha
                    FROM usuario
                    WHERE idUsuario = ?";

            $stmt = mysqli_prepare($conexao, $sql);
            
            mysqli_stmt_bind_param(
                $stmt,
                "i",
                $idUsuario
             );
            
             mysqli_stmt_execute($stmt);
             $dados = mysqli_stmt_get_result($stmt);
             $busca = mysqli_fetch_assoc($dados);
            mysqli_stmt_close($stmt);

            return $busca;
        }

        function editar($usuario){
             $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $idUsuario = $usuario->getIdUsuario();
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $telefone = $usuario->getTelefone();
            $tipoUsuario = $usuario->getTipoUsuario();
            $senha = $usuario->getSenha();

            $sql = "UPDATE usuario 
                    SET 
                        nome = ?,
                        email = ?,
                        telefone = ?,
                        tipoUsuario = ?,
                        senha = ?
                    WHERE idUsuario = ?
                        ";
            
            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "sssssi",
                $nome, 
                $email,
                $telefone,
                $tipoUsuario,
                $senha,
                $idUsuario
            );

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "USUARIO EDITADO";

        }


    }
?>