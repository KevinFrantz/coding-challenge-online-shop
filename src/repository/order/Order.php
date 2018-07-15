<?php
namespace repository\order;

use repository\AbstractRepository;
use entity\order\OrderInterface as OrderEntityInterface;
use core\CoreInterface;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Order extends AbstractRepository implements OrderInterface
{   
    public function saveOrder(OrderEntityInterface $order): bool
    {
        $this->database->beginTransaction();
        $this->saveOrderEntity($order);
        $this->saveConnection($order);
        return $this->database->rollBack();
    }
    
    private function saveOrderEntity(OrderEntityInterface $order):void{
        $statement = $this->database->prepare("INSERT INTO `order` (`customer`) VALUES (?);");
        $statement->execute([$order->getCustomer()->getId()]);
        $order->setId($this->database->lastInsertId());
    }
    
    private function saveConnection(OrderEntityInterface $order):void{
        foreach ($order->getProducts()->toArray() as $product){
            $statement = $this->database->prepare("INSERT INTO `order_product` (`product_id`,`order_id`) VALUES (?,?);");
            $statement->execute([$product->getId(),$order->getId()]);
        }
    }
}