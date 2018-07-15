<?php
namespace controller\product;

use repository\product\Product as ProductRepository;
use core\Core;
use router\link\Link;
use controller\AbstractDefaultController;
use Doctrine\Common\Collections\ArrayCollection;
use router\link\LinkCollection;

/**
 *
 * @author kevinfrantz
 *        
 */
final class Product extends AbstractDefaultController implements ProductInterface
{

    /**
     *
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(Core $core)
    {
        parent::__construct($core);
        $this->productRepository = new ProductRepository($this->core);
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
            'add_to_basket' => new Link([
                'controller' => 'order',
                'action' => 'basket'
            ]),
            'colors' => $this->getColors(),
            'menu_items' => [
                $this->getColors()
            ]
        ]);
    }

    private function getColors(): ArrayCollection
    {
        $colors = new LinkCollection('color filter');
        foreach ($this->productRepository->getColors() as $color) {
            $parameters = $_GET;
            $parameters['color'] = $color['color'];
            $colors->add(new Link($parameters, $color['color']));
        }
        return $colors;
    }
}

