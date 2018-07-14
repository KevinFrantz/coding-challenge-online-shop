<?php
namespace controller\product;

use controller\AbstractController;
use repository\product\Product as ProductRepository;
use core\Core;
use router\Link;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractController implements ProductInterface
{

    /**
     *
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(Core $core)
    {
        parent::__construct($core);
        $this->productRepository = new ProductRepository($this->core->getDatabase());
    }

    public function list(?string $color = null): void
    {
        if ($color) {
            $products = $this->productRepository->getAllByColor($color)->toArray();
        } else {
            $products = $this->productRepository->getAllProducts()->toArray();
        }
        $this->render('product/list.html.twig', [
            'products' => $products,
            'colors' => $this->getColors()
        ]);
    }

    private function getColors(): array
    {
        $colors = [];
        foreach ($this->productRepository->getColors() as $color) {
            $parameters = $_GET;
            $parameters['color'] = $color['color'];
            $colors[] = new Link($parameters, $color['color']);
        }
        return $colors;
    }
}

