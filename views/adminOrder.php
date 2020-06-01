<?php
  include('../controller/modSession.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gestion Ordenes</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../utils/styles/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="validation/validateOrder.js"></script>
    </head>
    <body>
        <?php
          $dataFilt = "";
          require_once('../controller/OrderController.php');
          require('menu/menu.php');
          $company = new PedidoController();
        ?>
        <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading">
              Gestión de Órdenes
            </div>
            <div class="panel-body">

            <div class="row alignLeft">
              <form action="adminOrder.php" method="post"> 
              <div class="col-md-2">
                <div class="form-group">
                    <input class="form-control" type="text" name="nameCom" placeholder="Cod Orden" value=""/>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <input class="form-control" type="text" name="descCom" placeholder="Cliente" value=""/>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    
                    <select class="form-control" name="category_company" requires>
                        <option value="0">Estado</option>
                        <option value="1">Pendiente de Pago</option>
                        <option value="2">Despachado</option>
                        <option value="3">Entregado</option>
                        
                    </select>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" name="buscarEmp" value="Buscar Orden" class="btn btn-primary"/>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <form action="adminOrder.php">
                      <input type="submit" name="buscarEmp" value="Limpiar Búsqueda" class="btn btn-primary"/>
                    </form>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <form action="formOrder.php">
                      <input type="submit" name="buscarEmp" value="Registrar Orden" class="btn btn-primary"/>
                    </fom>
                  </div>
              </div>
                
              </div>
              </form>
            </div>

            <?php
              if(isset($_POST['buscarEmp'])  == "Buscar Orden"){
                $dataFilt = $company->consultarEmpresaLike($_POST);
              }
            ?>

            <table class="table table-hover">
    <thead>
      <tr>
        <th>Pedido</th>
        <th>Cliente</th>
        <th>Fecha Pedido</th>
        <th>Cantidad</th>
        <th>Ciudad</th>
        <th>Estado</th>
        <th>Pagado</th>
        <th>A Despachar</th>
        <th>Entregado</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $emp = $company->consultarPedido();

      if($dataFilt == ""){
          foreach ($emp as $key) {
          echo "<tr>
          <td>".$key['id_pedido']."</td>
          <td>".$key['nombre_cliente']."</td>
          <td>".$key['fecha_entrega_estimada']."</td>
          <td>".$key['cantidad']."</td>
          <td>".$key['ciudad']."</td>
          <td>".$key['estado']."</td>
          <td class='alignCenter'>";
          if ($key['pago'] == 1)
            echo "<input type='checkbox' checked />";
          else
            echo "<input type='checkbox' />";
          echo "
          </td>
          <td class='alignCenter'>
          ";
          if ($key['despacho'] == 1)
            echo "<input type='checkbox' id='despacho' name='despacho' checked onclick='validateADespachar();'/>";
          else
            echo "<input type='checkbox' id='despacho' name='despacho' onclick='validateADespachar();'/>";
          
          echo "
            <input type='date' id='fecha_despacho' name='fecha_despacho'/>
          </td>
          <td>";
          if ($key['entrega'] == 1)
            echo "<input type='checkbox' checked />";
          else
            echo "<input type='checkbox' />";
          echo "</td>
          <td class='alignRight'>
              <form action='adminOrder.php' method='post'>
              
              <input type='hidden' name='deleteId' value='".$key['id_pedido']."'/>
              <input type='submit' name='delete' value='Guardar' class='glyphicon-trash' onSubmit='validateADespachar();'/>
              <input type='submit' name='delete' value='Eliminar' class='glyphicon-trash'/>
              
              <!--<button type='button' class='btn btn-default'>
                  <span class='glyphicon glyphicon-trash'></span>
              </button>-->

              <!--<button type='button' class='btn btn-default'>
                  <span class='glyphicon glyphicon-pencil'></span>
              </button>-->

              <input type='submit' name='modify' value='Modificar' class='glyphicon-pencil'/>
              </form>
          </td>
          </tr>
          ";
        }
      }  else {
        foreach ($dataFilt as $key) {
          echo "<tr>
          <td>".$key['NAME_COMPANY']."</td>
          <td>".$key['CATEGORY_COMPANY']."</td>
          <td>".$key['CEL_COMPANY']."</td>
          <td>".$key['MAIL_COMPANY']."</td>
          <td class='alignRight'>
              <form action='adminOrder.php' method='post'>
              
              <input type='hidden' name='deleteId' value='".$key['id_pedido']."'/>
              <input type='submit' name='delete' value='Eliminar' class='glyphicon-trash'/>
              
              <!--<button type='button' class='btn btn-default'>
                  <span class='glyphicon glyphicon-trash'></span>
              </button>-->

              <!--<button type='button' class='btn btn-default'>
                  <span class='glyphicon glyphicon-pencil'></span>
              </button>-->

              <input type='submit' name='modify' value='Modificar' class='glyphicon-pencil'/>
              </form>
          </td>
          </tr>
          ";
        }

        // if(isset($_POST['delete'])  == "Eliminar"){
        //   $company->inactivaEmpresa($_POST);
        // }

        // if(isset($_POST['modify'])  == "Modificar"){
        //   $editar= $_POST['deleteId'];
        //   echo "<script> window.location='formCompany.php?id=".$editar."' </script>";
        // }
      }

      if(isset($_POST['delete'])  == "Eliminar"){
        $company->inactivaEmpresa($_POST);
      }

      if(isset($_POST['modify'])  == "Modificar"){
        $editar= $_POST['deleteId'];
        echo "<script> window.location='formOrder.php?id=".$editar."' </script>";
      }

      ?>     
    </tbody>
  </table>

            </div>
        </div>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        </div>
    </body>
    
</html>