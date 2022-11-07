<?php 
session_start();
include '../model/connect.php';

include 'header.php';
?>

<body>

<section class="container mt-2">
    <a class="btn btn-primary" href="http://localhost/escolamonaco/view/disciplinas.php" role="button">Voltar</a>
</section>

<section class="container shadow mt-5 pb-3">
    <h1 class="text-center pt-3 pb-2">Editar Dados</h1>   
     
    <?php 
       $id=$_SESSION['get_edit_IDdisc'];
       //echo $id;
       $find = "SELECT * FROM disciplinas WHERE id_disc=$id";
       $stmt = $conn->prepare($find);
       $stmt->execute();
       $get_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
       foreach($get_result as $show){    
    ?>

    <form action="validar.php" method="POST">
       
       <div class="row"> 
           <div class="col-12 col-sm-6">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" class="form-control" name="materia_edit" value="<?php echo $_SESSION['edit_nome'.$id]; ?>" aria-describedby="nome_">
              </div>
           </div>  
           
           <div class="col-12 col-sm-6">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Idade</label>
                <input type="number" class="form-control" name="nota_edit" value="<?php echo $_SESSION['edit_nota'.$id]; ?>" aria-describedby="idade_">
              </div>
           </div>

       </div>
    <?php } ?>
       <button type="submit" class="btn btn-primary" value="salvar" name="save_disc_edit">Salvar Edição</button>
    </form>
 
</section><!--END CONTAINER-->

<?php
//unset($_SESSION['disciplina']);
include 'footer.php';
?>
