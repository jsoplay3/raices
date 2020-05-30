<?php
  include('../controller/modSession.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro de Pedidos</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <?php
            require_once('../controller/OrderController.php');
            require('menu/menu.php');
            $company = new PedidoController();
            if(isset($_GET['id'])){
              $data = $company->consultarPedido($_GET['id']);
            }
        ?>
        <div class="container">

          
          <div class="panel panel-primary">
            <div class="panel-heading">
              Registro de Órdenes
            </div>
            <div class="panel-body">
              <form action="formOrder.php" method="post" role="form" enctype="multipart/form-data">
                
                <div class="row">              
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre_cliente">Cliente:</label>
                            <input class="form-control" type="text" name="nombre_cliente" placeholder="Nombres y Apellidos Completos del Cliente"
                            value="<?php echo isset($data['NAME_COMPANY'])?$data['NAME_COMPANY']:''; ?>" required/>
                        </div>
                    </div>
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="barrio">Barrio:</label>
                            <input class="form-control" type="text" name="barrio" placeholder="Dirección de Entrega"
                            value="<?php echo isset($data['barrio'])?$data['barrio']:''; ?>"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ciudad">Ciudad:</label>
                            <select class="form-control" name="ciudad">
                              <option>Eleccione una Opción</option>
                              <option value="1">La Ceja</option>
                              <option value="2">Rionegro</option>
                              <option value="3">Marnilla</option>
                              <option value="4">El Santuario</option>
                              <option value="5">El Retiro</option>
                              <option value="6">La Unión</option>
                              <option value="7">El Carmen de Viboral</option>
                              <option value="8">Medellín</option>
                              <option value="9">Bogota</option>
                            </select>
                        </div>
                    </div>


                </div>
            
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="direccion_entrega">Dirección Entrega:</label>
                            <input class="form-control" type="text" name="direccion_entrega" placeholder="Dirección de Entrega"
                            value="<?php echo isset($data['direccion_entrega'])?$data['direccion_entrega']:''; ?>" required/>
                        </div>
                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono_cliente">Teléfono Cliente:</label>
                        <input class="form-control" type="tel" name="telefono_cliente" placeholder="555 55 55"
                        value="<?php echo isset($data['telefono_cliente'])?$data['telefono_cliente']:''; ?>" required/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono_entrega">Teléfono Entrega:</label>
                        <input class="form-control" type="tel" name="telefono_entrega" placeholder="333 33 33" 
                        value="<?php echo isset($data['telefono_entrega'])?$data['telefono_entrega']:''; ?>"/>
                    </div>
                  </div>
                  
                </div>
            
                <div class="row">

                
            
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="mail_cliente">Mail Cliente:</label>
                        <input class="form-control" type="email" name="mail_cliente" placeholder="cliente@correo.com"
                        value="<?php echo isset($data['mail_cliente'])?$data['mail_cliente']:''; ?>"/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="entrega_estimada">Fecha Entrega Estimada:</label>
                        <input class="form-control" type="date" name="fecha_ entrega_estimada" placeholder="Nombre del propietario"
                        value="<?php echo isset($data['fecha_entrega_estimada'])?$data['fcha_entrega_estimada']:''; ?>" required/>
                    </div>
                  </div>
                  

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo_producto">Tipo de Producto:</label>
                        <select class="form-control" name="tipo_producto">
                          <option>Ramo de Gérbera</option>
                        </select>
                        <br/>
                    </div>
                  </div>
                   
                </div>
            
                <div class="row">
 
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="cantidad">Cantidad por Ramos:</label>
                        <input class="form-control" type="number" name="cantidad" placeholder="0"
                        value="<?php echo isset($data['cantidad'])?$data['cantidad']:''; ?>" required/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo_pago">Tipo de Pago:</label>
                        <select class="form-control" name="tipo_pago">
                          <option>Seleccione un tipo</option>
                          <option>Contra Entrega</option>
                          <option>Consignación</option>
                          <option>Transferencia</option>
                        </select>
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="numero_comprobante">Nro Comprobante:</label>
                        <input class="form-control" type="text" name="numero_comprobante" placeholder="9836567"
                        value="<?php echo isset($data['numero_comprobante'])?$data['numero_comprobante']:''; ?>"/>
                    </div>
                  </div>
            
                  
                </div>

                <div class="row">
                

                  

                  <div class="col-md-1">
                    <div class="form-group">
                        <label for="pago" class="form-check-label">Pago:</label><br>
                        <input class="form-check-input" type="checkbox" name="pago"
                        value="<?php echo isset($data['pago'])?$data['pago']:''; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_pago" class="form-check-label">Fecha Pago:</label><br>
                        <input class="form-control" type="date" name="fecha_pago"
                        value="<?php echo isset($data['fecha_pago'])?$data['fecha_pago']:''; ?>"/>
                    </div>
                  </div>

                  <div class="col-md-1">
                    <div class="form-group">
                        <label for="despacho" class="form-check-label">Despacho:</label><br>
                        <input class="form-check-input" type="checkbox" name="despacho"
                        value="<?php echo isset($data['despacho'])?$data['despacho']:''; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="fecha_despacho" class="form-check-label">Fecha Despacho:</label><br>
                        <input class="form-control" type="date" name="fecha_despacho"
                        value="<?php echo isset($data['fecha_despacho'])?$data['fecha_despacho']:''; ?>"/>
                    </div>
                  </div>

                  <div class="col-md-1">
                    <div class="form-group">
                        <label for="entrega" class="form-check-label">Entrega:</label><br>
                        <input class="form-check-input" type="checkbox" name="entrega"
                        value="<?php echo isset($data['entrega'])?$data['entrega']:''; ?>"/>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="entrega" class="form-check-label">Fecha Entrega:</label><br>
                        <input class="form-control" type="date" name="entrega"
                        value="<?php echo isset($data['fecha_entrega'])?$data['fecha_entrega']:''; ?>"/>
                    </div>
                  </div>


                </div>

                



                <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado Pedido:</label>
                        <select class="form-control" name="estado">
                          <option value="1">Pendiente por Cierre</option>
                          <option value="2">Confirmado por ContraEntrega</option>
                          <option value="4">Confirmado por Transferencia</option>
                          <option value="5">Confirmado por Consignación</option>
                          <option value="6">Confirmado por PSE</option>
                        </select>
                    </div>
                  </div>

                <div class="col-md-4">
                <div class="form-group">
                  
                    <label for="observaciones">Observaciones:</label>
                    <textarea class="form-control" rows="5" name="observaciones"required>
                    <?php echo isset($data['observaciones'])?$data['observaciones']:''; ?>
                    </textarea>
                
                </div>
                </div>
                
            
                
                <div class="col-md-4">
                <div class="form-group">
                    <label for="mensaje_tarjeta">Mensaje de la Tarjeta</label>
                    <textarea class="form-control" rows="5" name="mensaje_tarjeta">
                    <?php echo isset($data['mensaje_tarjeta'])?$data['mensaje_tarjeta']:''; ?>
                    </textarea>
                </div>
                </div>
                
                </div>
                <?php if(!isset($data)){?>
                <input type="submit" name="enviar" value="Registrar Orden" class="btn btn-success btn-block"/>
                <?php } ?>

                <?php if(isset($data)){?>
                <input type="submit" name="enviarMod" value="Modificar Orden" class="btn btn-success btn-block"/>
                <?php } ?>

            </form>

            <?php
            if(isset($_POST['enviar']) == "Registrar Orden"){
              $company->validarEmpresa($_POST);
            }

            if(isset($_POST['enviarMod']) == "Modificar Orden"){
              $company->actualizarEmpresa($_POST);
            }

            ?>
            </div>
          </div>
        </div>
    </body>
    
</html>