<?php include 'public/template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("SELECT productos.id,categoria.nombre_categoria, productos.nombre, productos.precio FROM categoria INNER JOIN productos ON categoria.idcategoria=productos.idcategoria");
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($productos);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de Productos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($productos as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombre_categoria; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td>S/. <?php echo $dato->precio; ?></td>
                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php" name="fvalida">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" name="txtNombre" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" id="precio" name="txtPrecio" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Selecciona la categoria: </label>
                        <select class="form-control mb-3" name="categoria" id="categorias">
                            <option value="">Seleccione:</option>
                            <?php
                            // CATEGORIA
                            $query = $bd->prepare("SELECT * FROM categoria");
                            $query->execute();
                            $data = $query->fetchAll();
    
                            foreach ($data as $valores):
                            echo '<option value="'.$valores["idcategoria"].'">'.$valores["nombre_categoria"].'</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" id="submit" class="btn btn-primary" value="Registrar" onclick="validar()">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="public/js/script.js"></script>

<?php include 'public/template/footer.php' ?>