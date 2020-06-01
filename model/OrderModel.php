<?php
require_once('Connect.php');

class PedidoModel {

    private $con;
    private $id, $nombreCliente, $ciudad, $barrio, $direccion_entrega, $telefono_cliente, $telefono_entrega, $mail_cliente,
    $fecha_entrega_estimada, $tipo_producto, $cantidad, $observaciones, $mensaje_tarjeta, $estado, $tipo_pago,
    $numero_comprobante, $pago, $fecha_pago, $despacho, $fecha_despacho,
    $entrega, $fecha_entrega, $usuario_crea, $usuario_modifica, $fecha_crea, $fecha_modifica; 
     
    public function __construct(){
      $this->con = new Conectar();
    }
  
    public function set($atributo, $contenido){
      $this->$atributo = $contenido;
    }
  
    public function insertarPedido(){
      $sql = "INSERT INTO pedidos(nombre_cliente, ciudad, barrio, direccion_entrega, telefono_cliente, 
      telefono_entrega, mail_cliente, fecha_entrega_estimada, tipo_producto, cantidad, observaciones, 
      mensaje_tarjeta, estado, tipo_pago, numero_comprobante, pago, fecha_pago, despacho, fecha_despacho, 
      entrega, fecha_entrega, usuario_crea, fecha_crea) 
      VALUES ('$this->nombreCliente', '$this->ciudad', '$this->barrio','$this->direccion_entrega', '$this->telefono_cliente', '$this->telefono_entrega', 
      '$this->mail_cliente', '$this->fecha_entrega_estimada', '$this->tipo_producto', '$this->cantidad', '$this->observaciones',
      '$this->mensaje_tarjeta', '$this->estado', '$this->tipo_pago', '$this->numero_comprobante', '$this->pago', '$this->fecha_pago', 
      '$this->despacho', '$this->fecha_despacho', '$this->entrega', '$this->fecha_entrega', '$this->usuario_crea', NOW())";
      $this->con->consultaSimple($sql, 0);
      print($sql);
    }
  
    public function consultarPedido(){
      $sql = "SELECT id_pedido, nombre_cliente, ciudad, barrio direccion_entrega, telefono_cliente, telefono_entrega, mail_cliente, fecha_entrega_estimada,
      tipo_producto, cantidad, observaciones, mensaje_tarjeta, estado, tipo_pago, numero_comprobante, pago, fecha_pago, despacho, fecha_despacho,
      entrega, fecha_entrega, usuario_crea, usuario_modifica, fecha_crea, fecha_modifica 
      FROM pedidos";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }

    public function consultarPedidoPorId(){
      $sql = "SELECT id_pedido, nombre_cliente, ciudad, barrio direccion_entrega, telefono_cliente, telefono_entrega, mail_cliente, fecha_entrega_estimada,
      tipo_producto, cantidad, observaciones, mensaje_tarjeta, estado, tipo_pago, numero_comprobante, pago, fecha_pago, despacho, fecha_despacho,
      entrega, fecha_entrega, usuario_crea, usuario_modifica, fecha_crea, fecha_modifica 
      FROM pedidos
      WHERE id_pedido = $this->id";
      $datos = $this->con->consultaRetorno($sql);
      return $datos;
    }

  }


?>