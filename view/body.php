<?php
   session_start();
?>
<body>
    <?php echo @$_SESSION['aviso_cadastro'];
          unset($_SESSION['aviso_cadastro']); 

          echo @$_SESSION['aviso_del'];
          unset($_SESSION['aviso_del']); 
    ?>    
    <section class="container shadow mt-5">
    <h1 class="text-center pt-3 pb-2">SISTEMA DE NOTAS</h1>    
        <a class="btn btn-primary" href="http://localhost/escolamonaco/view/cadastro.php" role="button">Cadastrar Aluno</a>
    <section class="table-responsive-sm">
    <table class="table table-striped">
  <thead>
    <tr>
    <?php 
       $find = "SELECT * FROM aluno";
       $stmt = $conn->prepare($find);
       $stmt->execute();
       $get_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
      <th scope="col">Codigo Registro</th>
      <th scope="col">Aluno</th>
      <th scope="col">Idade</th>
      <th scope="col">Editar/Deletar/Ver Disciplinas</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       foreach($get_result as $show){       
    ?>
    <form action="view/validar.php" method="POST">
    <tr>
      <th scope="row"><?php  echo $show['id_aluno']; $id=$show['id_aluno']; $_SESSION['getID']=$id;?></th>
      <td><?php  echo $show['nome']; $_SESSION['nome'.$id]=$show['nome']; ?></td>
      <td><?php  echo $show['idade']; $_SESSION['idade'.$id]=$show['idade']; ?></td>
        <td><?php //echo $show['cod_disc_aluno']; ?>
            <button type="submit" value="<?php echo $show['id_aluno']; ?>" name="edit" class="btn btn-primary">Editar</button>
            <button type="submit" value="<?php echo $show['id_aluno']; ?>" name="del" class="btn btn-danger m-1">Deletar</button>
            <button type="submit" value="<?php echo $show['id_aluno']; ?>" name="disc" class="btn btn-success m-1">Ver Disciplinas</button>
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