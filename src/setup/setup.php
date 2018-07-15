<?php
use core\Core;
use Doctrine\Common\Collections\ArrayCollection;
use repository\product\Product as ProductRepository;
use repository\user\User as UserRepository;
use entity\user\User;

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
    $product = ProductRepository::createProduct(
        $colums[0],
        $colums[1],
        (int) (floatval($colums[2]) * 100), 
        (int)$colums[3], 
        $colums[4]);
    echo $number.'. product '.$product->getName()." added to collection...\n";
    $products->add($product);
}

$productRepository = new ProductRepository(new Core());
$productRepository->addProducts($products);

echo "Insert dummy user...\n";
$user= new User();
$user->setName('Maxla Mustermensch');
$user->setPasswordHashByPassword('passwort:)');
$user->setEmail('test@mail.test');
$userRepository = new UserRepository(new Core());
$userRepository->addUser($user);
?>