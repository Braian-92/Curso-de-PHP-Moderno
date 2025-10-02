<?php

//! single responsability principle
//! principio de responsabilidad UNICA

class Order
{
  private $items = [];
  private $total;

  public function getTotal()
  {
    return $this->total;
  }

  public function addItem($description, $price)
  {
    $this->items[] = [
      'description' => $description,
      'price' => $price,
    ];

    $this->total += $price;
  }

  public function createOrder()
  {
    echo "Se procesa el pedido.<br/>";
  }
}

class EmailNotifier {
  public function send(Order $order){
    echo "Mensaje del pedido, total. - " . $order->getTotal() . "<br/>";
  }
}

$order = new Order();
$order->addItem("Producto 01", 100);
$order->addItem("Producto 02", 200);
$order->addItem("Producto 03", 300);
$order->createOrder();

$emailNotifier = new EmailNotifier();
$emailNotifier->send($order);
