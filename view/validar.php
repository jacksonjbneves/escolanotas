<?php 
include '../model/connect.php';
session_start();

@$edit = $_POST['edit'];
@$del = $_POST['del'];
@$disc = $_POST['disc'];

if(isset($edit)){
   $_SESSION['edit'] = $edit;
   header("Location:../view/editar.php");
}

if(isset($del)){
   $_SESSION['deletar'] = $del;
   header("Location:../view/deletar.php");
}

if(isset($disc)){
   $_SESSION['disciplina'] = $disc;
   header("Location:../view/disciplinas.php");
}

/*CADASTRAR ALUNO*/

$nome = $_POST['nome'];
$idade = $_POST['idade'];

if(isset($nome) && isset($idade)){

$sql = 'INSERT INTO aluno (nome, idade) VALUES(:nome, :idade)';
       $stmt = $conn->prepare($sql);
       $stmt->bindParam('nome', $nome);
       $stmt->bindParam('idade', $idade);
       
       $result = $stmt->execute();
       
       $_SESSION['aviso_cadastro'] = '<div class="alert alert-success" role="alert"> 
                                          <i class="bi bi-check2-circle px-1"></i> 
                                              Aluno Cadastrado! 
                                          </div>'; 
       header("Location:../index.php");
}

/*EDITAR NOME E IDADE ALUNO*/
$nome_edit = $_POST['nome_edit'];
$idade_edit = $_POST['idade_edit'];
$id_edit = $_SESSION['getID'];

echo $nome_edit."<br>";
echo $idade_edit."<br>";
echo $id_edit."<br>";

if(isset($nome_edit) && isset($idade_edit)){

    $find = "UPDATE aluno SET nome = '$nome_edit', idade = $idade_edit WHERE id_aluno=$id_edit";
    $stmt=$conn->prepare($find);
    $stmt->execute();    

       $_SESSION['aviso_cadastro'] = '<div class="alert alert-success" role="alert"> 
                                          <i class="bi bi-check2-circle px-1"></i> 
                                              Dados Atualizados!
                                          </div>'; 
       unset($_SESSION['getID']);
       header("Location:../index.php");
}

/*EXCLUIR CADASTRO DE ALUNO*/
$id_del = $_SESSION['deletar'];
$del_cadastro = $_POST['del_aluno'];

if(isset($id_del) && isset($del_cadastro)){
    
    $find = "DELETE FROM aluno WHERE id_aluno=$id_del";
    $stmt=$conn->prepare($find);
    $stmt->execute();    

    $find = "DELETE FROM disciplinas WHERE cod_aluno=$id_del";
    $stmt=$conn->prepare($find);
    $stmt->execute();

    //DELETE FROM disciplinas WHERE cod_aluno=6;
    
    $_SESSION['aviso_del'] = '<div class="alert alert-warning" role="alert"> 
                                <i class="bi bi-exclamation-triangle px-1"></i>
                                   Cadastro de aluno excluido!
                              </div>';
   unset($_SESSION['deletar']);
   header("Location:../index.php");

}

/*ADICIONAR DISCIPLINA*/

$disc = $_POST['disciplina'];
$nota = $_POST['nota'];

if(isset($disc)){

   $id_aluno = $_SESSION['disciplina'];

   $sql = 'INSERT INTO disciplinas (cod_aluno, materia, nota) VALUES(:cod_aluno, :materia, :nota)';
       $stmt = $conn->prepare($sql);
       $stmt->bindParam('cod_aluno', $id_aluno);
       $stmt->bindParam('materia', $disc);
       $stmt->bindParam('nota', $nota);
       
       $result = $stmt->execute();
       
       $_SESSION['aviso_add_disc'] = '<div class="alert alert-success" role="alert"> 
                                          <i class="bi bi-check2-circle px-1"></i> 
                                              Disciplina adcionada! 
                                      </div>'; 
       header("Location:../view/disciplinas.php");

}

/*EDITAR DISCIPLINA*/
$edit_disc = $_POST['edit_disc'];
if(isset($edit_disc)){   
   $_SESSION['get_edit_IDdisc'] = $edit_disc;
   header("Location:../view/edit-disciplina.php");
}

/*SALVAR EDIÇÃO DE DISCIPLINA*/
$IDdisc_edit = $_SESSION['get_edit_IDdisc'];
$materia_edit = $_POST['materia_edit'];
$nota_edit = $_POST['nota_edit'];

if(isset($materia_edit) && isset($nota_edit)){

   $find = "UPDATE disciplinas SET materia = '$materia_edit', nota = $nota_edit WHERE id_disc = '$IDdisc_edit'";
   $stmt=$conn->prepare($find);
   $stmt->execute();  

      $_SESSION['aviso_edição_salva'] = '<div class="alert alert-success" role="alert"> 
                                         <i class="bi bi-check2-circle px-1"></i> 
                                             Atualizado Disciplina!
                                         </div>'; 
      unset($_SESSION['get_edit_IDdisc']);
      header("Location:../view/disciplinas.php");
}

/*EXCLUIR DE DISCIPLINA*/
//$id_del_disc = $_SESSION['deletar_disc'];
$del_cadastro_disc = $_POST['excluir_disc'];

if(isset($del_cadastro_disc)){
    
    $find = "DELETE FROM disciplinas WHERE id_disc=$del_cadastro_disc";
    $stmt=$conn->prepare($find);
    $stmt->execute();    
    
    $_SESSION['aviso_del_disc'] = '<div class="alert alert-warning" role="alert"> 
                                <i class="bi bi-exclamation-triangle px-1"></i>
                                   Disciplina escluida!
                              </div>';
   header("Location:../view/disciplinas.php");

}
?>

