
<?php
  include("connection.php");
 ?>
<html lang="es" class=" js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache js rgba multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients csstransitions fontface generatedcontent applicationcache">
<style>
.container_accesorios{
  padding-left: 230px;
  width: 75%;

  align: right;
}
.col-md-3{
  display: inline-block;
}

.producto_acc{
width: 230px;
border: 1px solid #DCDADA;
margin: -1px 19px 3px -1px;
padding: 10px;
text-align: center;
background-color: #EFEFEF;

}

.producto:hover{
  border: 1px solid black;
}


</style>


<head>
   <?php include('./inc/header.php'); ?>
<div id="Main">
<div id="WebPage">

<div class="align">


		<aside class="sidebarPage">

		    <h4>
		    	Catálogo de Productos »
		    </h4>
        <ul id="accordion" class="accordion">
  							<li>
  					<div class="open">Productos</div>
  		  			<ul id="4-29" style="display: block;">
  		    					    				<a href="Productos.php"><li class="active">Tableros<!--<span class="no-bold">(0)</span>--></li></a>
  		    					    				<a href="Accesorios.php"><li>Accesorios<!--<span class="no-bold">(0)</span>--></li></a>
  		    					    		</ul>
  				</li>

  			</ul>

		</aside>

<div class="container_accesorios"  >
<h2>Accesorios</h2>
<br>
<?php
 $query = "Select * From productos where categoriaID='cat_104'";
 $result = mysqli_query($ConexionBD,$query);
 if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_array($result)) {

 ?>
 <div class="col-md-3">
   <form class="" action="accesorios.php?action=add&productoCodigo=<?php echo $row["productoCodigo"] ?>" method="post">
     <div class="producto_acc">
       <a href="#"><?php $row ?></a>
       <h3 class="text-info" style="font-weight: bold;"><?php echo $row["productoNombre"]; ?></h3>
       <br>
       <img id="imgpro" src="<?php echo $row["productoImagen"]; ?>" class="img-responsive" height="180px" width="180px">

       <h5 style="color: black;" class="text-danger">Precio: <?php echo $row["productoPrecio"] ?></h5>
       <h5 style="color: black;">Stock: <?php echo $row["productoStock"]; ?></h5>




       <input type="hidden" name="hidden_name" value="<?php echo $row["productoNombre"]; ?>">
       <input type="hidden" name="hidden_price" value="<?php echo $row["productoPrecio"]; ?>">
       <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Agregar al Carro">
     </div>
   </form>
 </div>
<?php
 }
}

 ?>




</div>


</div>

</div>
</div>
   <?php include('./inc/footer.php'); ?>
   <?php include('./inc/script.php'); ?></body></html>
