<?php 
session_start();
include '../model/connect.php';

include 'header.php';
?>

<body>
<?php 
  echo @$_SESSION['aviso_del_disc'];
  echo @$_SESSION['aviso_edição_salva'];
  echo @$_SESSION['aviso_add_disc'];   
?>

<section class="container mt-2">
    <a class="btn btn-primary" href="http://localhost/escolamonaco/" role="button">Voltar</a>
</section>

<?php
$getid = $_SESSION['disciplina'];
//echo $getid;
?>
<section class="container shadow mt-5">
    <h1 class="text-center pt-3 pb-2">SISTEMA DE NOTAS</h1>

    <h2>Aluno: <?php echo $_SESSION['nome'.$getid]; ?></h2>
    <h2>Idade: <?php echo $_SESSION['idade'.$getid]; ?></h2>
        <a class="btn btn-success" href="http://localhost/escolamonaco/view/add-disciplina.php" role="button">Adicionar disciplina</a>
    <section class="table-responsive-sm">
    <table class="table table-striped">
  <thead>
    <tr>
    <?php 
       
       $find = 'SELECT * FROM disciplinas WHERE cod_aluno='.$getid;
       $stmt = $conn->prepare($find);
       $stmt->execute();
       $get_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
      <th scope="col">Codigo Disciplina</th>
      <th scope="col">Matéria</th>
      <th scope="col">Nota</th>
      <th scope="col">Editar/Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       foreach($get_result as $show){       
    ?>
    <form action="validar.php" method="POST">
    <tr>
      <th scope="row"><?php  echo $show['id_disc']; $get_IDdisc = $show['id_disc']; ?></th>
      <td><?php  echo $show['materia']; $_SESSION['edit_nome'.$get_IDdisc] = $show['materia']; ?></td>
      <td><?php  echo $show['nota']; $_SESSION['edit_nota'.$get_IDdisc] = $show['nota']; ?></td>
        <td><?php //echo $show['cod_disc_aluno']; ?>
            <button type="submit" value="<?php echo $show['id_disc']; ?>" name="edit_disc" class="btn btn-primary">Editar</button>
            <button type="submit" value="<?php echo $show['id_disc']; ?>" name="excluir_disc" class="btn btn-danger">Excluir</button>
        </td>
    </tr>
    </form>
    <?php 
       }
    ?>
  </tbody>
</table>
    </section><!--END TABLE-->
    </section><!--END CONTAINER-->

<?php
unset($_SESSION['aviso_del_disc']);
unset($_SESSION['aviso_edição_salva']);
unset($_SESSION['aviso_add_disc']);

include 'footer.php';
?>
