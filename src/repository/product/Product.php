<?php
namespace repository\product;

use Doctrine\Common\Collections\ArrayCollection;
use repository\AbstractRepository;
use entity\product\ProductInterface as ProductEntityInterface;
use core\Core;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractRepository implements ProductInterface
{

    const TABLE = 'product';

    /**
     * Out of time reasons the values are not escaped!
     *
     * {@inheritdoc}
     * @see \repository\product\ProductInterface::addProducts()
     */
    public function addProducts(ArrayCollection $products): void
    {
        /**
         *
         * @var ProductEntityInterface $product
         */
        foreach ($products->toArray() as $product) {
            $statement = $this->database->prepare("INSERT INTO `" . Core::DATABASE_NAME . "`.`" . self::TABLE . "` (`name`, `color`, `price`,`tax`, `image`) VALUES (?, ?, ?,?,?);");
            $statement->execute([
                $product->getName(),
                $product->getColor(),
                $product->getPrice()->getNetto()->getCents(),
                $product->getPrice()->getTax(),
                $product->getImage()->getImage(),
            ]);
        }
    }

    public function getAllProducts(): ArrayCollection
    {}

    public function deleteAllProducts(): void
    {}

    public function getProductById(int $id): ProductEntityInterface
    {}
}