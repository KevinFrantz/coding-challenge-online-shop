<?php
use core\Core;
use Doctrine\Common\Collections\ArrayCollection;
use entity\product\Product;
use entity\currency\Euro;
use entity\price\Price;
use entity\image\UrlImage;
use repository\product\Product as ProductRepository;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Maintainance script - Not written nice ;)
 */
function loadAndExec(string $file): void
{
    $core = new Core();
    $pdo = $core->getDatabase();
    echo "Drop table $file...\n";
    $pdo->exec("DROP TABLE $file;");
    echo "Create table $file...\n";
    $pdo->exec(file_get_contents(__DIR__ . '/database/' . $file . '.sql'));
}

echo "Create databases...\n";
foreach ([
    'order_product',
    'order',
    'product',
    'user'
] as $file) {
    loadAndExec($file);
}

echo "Insert product dummy data...\n";
$products = new ArrayCollection();
$lines = explode("\n", trim(file_get_contents(__DIR__ . '/monking/product.csv')));
unset($lines[0]);
foreach ($lines as $number=>$line) {
    $colums = explode(',', $line);
    $product = new Product();
    $product->setName($colums[0]);  
    $product->setColor($colums[1]);
    $euro = new Euro();
    $euro->setCents((int) (floatval($colums[2]) * 100));
    $price = new Price();
    $price->setPrice($euro);
    $price->setTax((int)$colums[3]);
    $product->setPrice($price);
    $image = new UrlImage();
    $image->setImage($colums[4]);
    $product->setImage($image);
    echo $number.'. product '.$product->getName()." added to collection...\n";
    $products->add($product);
}

$productRepository = new ProductRepository((new Core())->getDatabase());
$productRepository->addProducts($products);
?>