<?php
namespace repository\product;

use Doctrine\Common\Collections\ArrayCollection;
use repository\AbstractRepository;
use entity\product\ProductInterface as ProductEntityInterface;
use entity\product\Product as ProductEntity;
use core\Core;
use entity\currency\Euro;
use entity\price\Price;
use entity\image\UrlImage;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractRepository implements ProductInterface
{

    const TABLE = 'product'; 
    
    /**
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
                $product->getPrice()
                    ->getNetto()
                    ->getCents(),
                $product->getPrice()
                    ->getTax(),
                $product->getImage()
                    ->getImage()
            ]);
        }
    }

    public function getColors(): array
    {
        $statement = $this->database->prepare('SELECT DISTINCT color FROM product;');
        $statement->execute();
        return $statement->fetchAll();
    }

    private function transformFetchToArrayCollection(array $fetch): ArrayCollection
    {
        $products = new ArrayCollection();
        foreach ($fetch as $product) {
            $products->add($this->createProduct($product['name'], $product['color'], $product['price'], $product['tax'], $product['image'],$product['id']));
        }
        return $products;
    }

    public function getAllProducts(): ArrayCollection
    {
        $statement = $this->database->prepare('SELECT * FROM ' . self::TABLE . ';');
        $statement->execute();
        return $this->transformFetchToArrayCollection($statement->fetchAll());
    }

    static public function createProduct(string $name, string $color, int $cents, int $tax, string $imagePath,?int $id=null): ProductEntity
    {
        $product = new ProductEntity();
        $product->setName($name);
        $product->setColor($color);
        $euro = new Euro();
        $euro->setCents($cents);
        $price = new Price();
        $price->setPrice($euro);
        $price->setTax($tax);
        $product->setPrice($price);
        $image = new UrlImage();
        $image->setImage($imagePath);
        $product->setImage($image);
        if($id){
            $product->setId($id);
        }
        return $product;
    }

    public function getAllByColor(string $color): ArrayCollection
    {
        $statement = $this->database->prepare('SELECT * FROM ' . self::TABLE . ' WHERE color = ?;');
        $statement->execute([$color]);
        return $this->transformFetchToArrayCollection($statement->fetchAll());
    }
    
    public function getById(int $id): ProductEntityInterface
    {
        $statement = $this->database->prepare('SELECT * FROM ' . self::TABLE . ' WHERE id = ?;');
        $statement->execute([$id]);
        $product = $statement->fetch();
        return $this->createProduct($product['name'], $product['color'], $product['price'], $product['tax'], $product['image'],$product['id']);
    }

}