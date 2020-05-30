<?php
session_start();
if (!isset ($_SESSION['uxt_codUsuario']))
{
header('Location: landing/index.php');
}
else {

}

?>

<?php
require_once("controller/PedidoController.php");

$pedido = new PedidoController();
$pedido->consultarPedido();
// insertarPedido($_POST);

?>