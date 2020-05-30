<?php
require_once('../model/OrderModel.php');

class PedidoController{

  private $pedModel;

  public function __construct(){
    $this->pedModel = new PedidoModel();
  }

  //Insertar la informacion de una empresa
  public function insertarPedido($data){
    $this->pedModel->set("nombreCliente", $data['nombreCliente']);
    $this->pedModel->set("direccion_entrega", $data['direccion_entrega']);
    $this->pedModel->set("telefono_cliente", $data['telefono_cliente']);
    $this->pedModel->set("telefono_entrega", $data['telefono_entrega']);
    $this->pedModel->set("mail_cliente", $data['mail_cliente']);
    $this->pedModel->set("fecha_entrega_estimada", $data['fecha_entrega_estimada']);
    $this->pedModel->set("tipo_producto", $data['tipo_producto']);
    $this->pedModel->set("cantidad", $data['cantidad']);
    $this->pedModel->set("observaciones", $data['observaciones']);
    $this->pedModel->set("mensaje_tarjeta", $data['mensaje_tarjeta']);
    $this->pedModel->set("tipo_pago", $data['tipo_pago']);
    $this->pedModel->set("numero_comprobante", $data['numero_comprobante']);
    $this->pedModel->set("pago", $data['pago']);
    $this->pedModel->set("fecha_pago", $data['fecha_pago']);
    $this->pedModel->set("despacho", $data['despacho']);
    $this->pedModel->set("fecha_despacho", $data['fecha_despacho']);
    $this->pedModel->set("entrega", $data['entrega']);
    $this->pedModel->set("fecha_entrega", $data['fecha_entrega']);
    $this->pedModel->set("usuario_crea", $data['usuario_crea']);
    $this->pedModel->set("usuario_modifica", $data['usuario_modifica']);
    $this->pedModel->insertarPedido();
    echo "<script>alert('Pedido creado correctamente');
    location.href='';</script></script>";
  }


  public function consultarPedido(){
    $datos = $this->pedModel->consultarPedido();
    while($row = $datos->fetch_array()){
      $rows[] = $row;
    }
    return $rows;
  }

}


?>