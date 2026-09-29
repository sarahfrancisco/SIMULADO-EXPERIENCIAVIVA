<?php
    include_once("../dao/AtividadeDAO.php");
    include_once("../model/Atividade.php");

    if($_POST){
        $ac = new AtividadeController();
        $ac->cadastrar();
    }

    if($_GET){
        if($_GET['acao']=="excluir"){
            $ac = new  AtividadeController();
            $ac->excluir();
        }
        if($_GET['acao']=="buscar"){
            $ac = new  AtividadeController();
            $ac->buscar();
        }
        if($_GET['acao']=="editar"){
            $ac = new  AtividadeController();
            $ac->editar();
        }
    }

    

    class AtividadeController{
        function cadastrar(){
           if ($_POST){

                $AtividadeDAO = new AtividadeDAO();
                $atividade = new Atividade();
echo "ENTREI NO CONTROLLER";
                $atividade->setTitulo($_POST["titulo"]);
                $atividade->setDescricao($_POST['descricao']);
                $atividade->setVagas($_POST['vagas']);

                
                $AtividadeDAO->cadastrar($atividade);
            }
        }

        function listar(){
            $AtividadeDAO = new AtividadeDAO();
           $listar = $AtividadeDAO->listar();

           return $listar;
        }

        function excluir(){
            $AtividadeDAO = new AtividadeDAO();

            $AtividadeDAO->excluir($_GET['idAtividade']);
        }

        function buscar(){
            $AtividadeDAO = new AtividadeDAO();
            $busca = $AtividadeDAO->buscar($_GET['idAtividade']);

            return $busca;

        }

        function editar(){
            $AtividadeDAO = new AtividadeDAO();
                $Atividade = new Atividade();
 
                $Atividade->setIdAtividade($_GET['idAtividade']);
                $Atividade->setTitulo($_GET['titulo']);
                $Atividade->setDescricao($_GET['descricao']);
                $Atividade->setVagas($_GET['vagas']);

            
                $AtividadeDAO->editar($Atividade);
        }
    }

  // $ac = new  AtividadeController();
   //$acc = $ac->listar();
   // while($lista = mysqli_fetch_assoc($acc)){
     //   echo $lista['Titulo']. $lista['Descricao'].$lista['Vagas'].$lista['tipoAtividade'].$lista['senha'];
   // }

       // $ac = new  AtividadeController();
        //$ac->excluir();

        $ac = new  AtividadeController();
       $teste = $ac->buscar();
        echo $teste['idAtividade'].$teste['Titulo'].$teste['Descricao'];

?>

<html>
    <form method="post">
        <input type="text" name="titulo">
        <input type="text" name="descricao">
        <input type="text" name="vagas">

        <button type="submit">Cadastrar</button>
        

    </form>


</html>