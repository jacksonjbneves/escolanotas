<?php 
session_start();
include '../model/connect.php';

include 'header.php';
?>

<body>

<section class="container mt-2">
    <a class="btn btn-primary" href="http://localhost/escolamonaco/" role="button">Voltar</a>
</section>

<section class="container shadow mt-5 pb-3">
    <h1 class="text-center pt-3 pb-2">Cadastrar Aluno</h1>   

    <form action="validar.php" method="POST">
       <div class="row"> 
           <div class="col-12 col-sm-6">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="" aria-describedby="nome_">
              </div>
           </div>  
           
           <div class="col-12 col-sm-6">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Idade</label>
                <input type="number" class="form-control" name="idade" aria-describedby="idade_">
              </div>
           </div>
       </div>

       <button type="submit" class="btn btn-primary" value="cadastrar">Cadastrar</button>
    </form>
 
</section><!--END CONTAINER-->

<?php
//unset($_SESSION['disciplina']);
include 'footer.php';
?>
