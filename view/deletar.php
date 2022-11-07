<?php 
session_start();
include '../model/connect.php';

include 'header.php';
?>

<body>

<section class="container mt-2">
    <a class="btn btn-primary" href="http://localhost/escolamonaco/" role="button">Voltar</a>
</section>

<?php $id = $_SESSION['deletar']; ?>

<section class="container shadow mt-5 pb-3">
    <h1 class="text-center pt-3 pb-2">Deletar dados do Aluno</h1> 

    <h2>Aluno: <?php echo $_SESSION['nome'.$id]; ?> </h2>
    <h2>Idade: <?php echo $_SESSION['idade'.$id]; ?> </h2>
    <h3>Tem certeze que deseja deletar os dados do aluno?</h3>
      <div class="container">
        <form action="validar.php" method="POST">
              <button type="submit" value="<?php $_SESSION['deletar']; ?>" name="del_aluno" class="btn btn-danger m-1">Sim</button>
              <a class="btn btn-primary" href="http://localhost/escolamonaco/" role="button">Não</a>
        </form>
      </div>
</section><!--END CONTAINER-->

<?php
unset($_SESSION['nome'.$id]);
unset($_SESSION['idade'.$id]);
//unset($_SESSION['disciplina']);
include 'footer.php';
?>
