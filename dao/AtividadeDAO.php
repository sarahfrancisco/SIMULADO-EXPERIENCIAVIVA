<?php
include_once("../config/conexao.php");
include_once("../model/Atividade.php");


    class AtividadeDAO{
        function cadastrar($Atividade){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $Titulo = $Atividade->getTitulo();
            $Descricao = $Atividade->getDescricao();
            $Vagas = $Atividade->getVagas();

            $sql = "INSERT INTO atividade (titulo, descricao, vagas)
                    VALUES(?,?,?)";
            
            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "ssi",
                $Titulo, 
                $Descricao,
                $Vagas
            );

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "Atividade CADASTRADO";
        }

        function listar(){
             $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "SELECT * FROM atividade";

            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($stmt);
                $listar = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            return $listar;
        }

        function excluir($idAtividade){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "DELETE FROM atividade
                    WHERE idAtividade = ?";
               
             $stmt = mysqli_prepare($conexao, $sql);

             mysqli_stmt_bind_param(
                $stmt,
                "i",
                $idAtividade
             );
            
             mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "Atividade EXCLUIDO";

        }

        function buscar($idAtividade){
            $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $sql = "SELECT idAtividade, Titulo, Descricao, Vagas
                    FROM atividade
                    WHERE idAtividade = ?";

            $stmt = mysqli_prepare($conexao, $sql);
            
            mysqli_stmt_bind_param(
                $stmt,
                "i",
                $idAtividade
             );
            
             mysqli_stmt_execute($stmt);
             $dados = mysqli_stmt_get_result($stmt);
             $busca = mysqli_fetch_assoc($dados);
            mysqli_stmt_close($stmt);

            return $busca;
        }

        function editar($Atividade){
             $conexaoOBJ = new Conexao();
            $conexao = $conexaoOBJ->getConexao();

            $idAtividade = $Atividade->getIdAtividade();
            $Titulo = $Atividade->getTitulo();
            $Descricao = $Atividade->getDescricao();
            $Vagas = $Atividade->getVagas();
           
            $sql = "UPDATE Atividade 
                    SET 
                        Titulo = ?,
                        Descricao = ?,
                        Vagas = ?
                    WHERE idAtividade = ?
                        ";
            
            $stmt = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "ssii",
                $Titulo, 
                $Descricao,
                $Vagas,
                $idAtividade
            );

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "Atividade EDITADO";

        }


    }
?>