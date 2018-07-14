<?php
namespace controller\product;

use controller\AbstractController;
use repository\product\Product as ProductRepository;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractController implements ProductInterface
{
    public function list(): void
    {
        $productRepository = new ProductRepository($this->core->getDatabase());
        $this->render('product/list.html.twig',['products'=>$productRepository->getAllProducts()->toArray()]);
    }

    public function colorFilter(string $color): void
    {}

}

