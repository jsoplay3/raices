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
            require_once('../controller/EmpresaControlador.php');
            require('menu/menu.php');
            $company = new EmpresaControlador();
            if(isset($_GET['id'])){
              $data = $company->consultarEmpresaPorIdOnly($_GET['id']);
            }
        ?>
        <div class="container">

          
          <div class="panel panel-primary">
            <div class="panel-heading">
              Registro de Órdenes
            </div>
            <div class="panel-body">
              <form action="formCompany.php" method="post" role="form" enctype="multipart/form-data">
                
                <div class="row">
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nit">Nro de Orden:</label>
                        <input class="form-control" type="text" name="nit" placeholder="000000000-1" 
                        value="<?php echo isset($data['NIT'])?$data['NIT']:''; ?>" required/>
                        </div>
                    </div>
                
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name_company">Cliente:</label>
                            <input class="form-control" type="text" name="name_company" placeholder="Nombres Completos del Cliente"
                            value="<?php echo isset($data['NAME_COMPANY'])?$data['NAME_COMPANY']:''; ?>" required/>
                        </div>
                    </div>
            
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address_company">Barrio:</label>
                            <input class="form-control" type="text" name="address_company" placeholder="Dirección de Entrega"
                            value=""/>
                        </div>
                    </div>
                </div>
            
                <div class="row">

                  <div class="col-md-4">
                        <div class="form-group">
                            <label for="address_company">Ciudad:</label>
                            <select class="form-control">
                              <option>La Ceja</option>
                              <option>Rionegro</option>
                              <option>Marnilla</option>
                              <option>El Santuario</option>
                              <option>El Retiro</option>
                              <option>La Unión</option>
                              <option>El Carmen de Viboral</option>
                              <option>Medellín</option>
                              <option>Bogota</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address_company">Dirección Entrega:</label>
                            <input class="form-control" type="text" name="address_company" placeholder="Dirección de Entrega"
                            value=""/>
                        </div>
                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_company">Teléfono Cliente:</label>
                        <input class="form-control" type="tel" name="phone_company" placeholder="555 55 55"
                        value="<?php echo isset($data['PHONE_COMPANY'])?$data['PHONE_COMPANY']:''; ?>"/>
                    </div>
                  </div>
            
                  
                </div>
            
                <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cel_company">Teléfono Entrega:</label>
                        <input class="form-control" type="tel" name="cel_company" placeholder="333 33 33" required
                        value="<?php echo isset($data['CEL_COMPANY'])?$data['CEL_COMPANY']:''; ?>"/>
                    </div>
                  </div>
            
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="mail_company">Mail Cliente:</label>
                        <input class="form-control" type="email" name="mail_company" placeholder="cliente@correo.com"
                        value="<?php echo isset($data['MAIL_COMPANY'])?$data['MAIL_COMPANY']:''; ?>" required/>
                    </div>
                  </div>
            
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_company">Fecha Entrega Estimada:</label>
                        <input class="form-control" type="date" name="contact_company" placeholder="Nombre del propietario"/>
                    </div>
                  </div>
            
                  
                    
                </div>
            
                <div class="row">
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="logo_url">Tipo de Producto:</label>
                        <select class="form-control">
                          <option>Ramo de Gérbera</option>
                        </select>
                        <br/>
                    </div>
                  </div>
                  

            
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="web_url">Cantidad por Ramos:</label>
                        <input class="form-control" type="number" name="web_url" placeholder="0"
                        value=""/>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="fb_url">Tipo de Pago:</label>
                        <select class="form-control">
                          <option></option>
                          <option>Contra Entrega</option>
                          <option>Consignación</option>
                          <option>Transferencia</option>
                        </select>
                    </div>
                  </div>
            
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="tw_url">Fecha de Pago:</label>
                        <input class="form-control" type="date" name="tw_url" placeholder="Fecha de Pago"
                        value=""/>
                    </div>
                  </div>

                  

                </div>
            

                
            
                <div class="form-group">
                  <div class="form-group">
                    <label for="description_company">Observaciones:</label>
                    <textarea class="form-control" rows="5" name="description_company"required><?php echo isset($data['DESCRIPTION_COMPANY'])?$data['DESCRIPTION_COMPANY']:''; ?></textarea>
                </div>
                </div>
            
                <div class="form-group">
                    <label for="product_description">Mensaje de la Tarjeta</label>
                    <textarea class="form-control" rows="5" name="product_description"><?php echo isset($data['PRODUCT_DESCRIPTION'])?$data['PRODUCT_DESCRIPTION']:''; ?></textarea>
                </div>
            
                <?php if(!isset($data)){?>
                <input type="submit" name="enviar" value="Registrar Orden" class="btn btn-success btn-block"/>
                <?php } ?>

                <?php if(isset($data)){?>
                <input type="submit" name="enviarMod" value="Modificar Empresa" class="btn btn-success btn-block"/>
                <?php } ?>

            </form>

            <?php
            if(isset($_POST['enviar']) == "Registrar Empresa"){
              $company->validarEmpresa($_POST);
            }

            if(isset($_POST['enviarMod']) == "Modificar Empresa"){
              $company->actualizarEmpresa($_POST);
            }

            ?>
            </div>
          </div>
        </div>
    </body>
    
</html>