<?php namespace App\Objects;

use App\Validators\ParamsValidator;
use Core\Abstracts\ActionsAbstract;

class ProductsActions extends ActionsAbstract
{
    public $productsList = [
        1 => [
            "description" => 'Producto 1',
            'price' => 10
        ],
        2 => [
            "description" => 'Producto 2',
            'price' => 20
        ],
        3 => [
            "description" => 'Producto 3',
            'price' => 30
        ],
        4 => [
            "description" => 'Producto 4',
            'price' => 40
        ]
    ];

    public function __construct($validator)
    {
        parent::__construct($validator);
    }

    public function ListaProductos()
    {
        return $this->run($this->productsList);        
    }

    public function CrearProducto()
    {
        $response = [
            'message' => 'Producto creado',
            'producto' => $this->params
        ];

        return $this->run($response);
    }

    public function EditarProducto()
    {
        $oldProduct = $this->productsList[$this->params['id']];
        $this->productsList[$this->params['id']]['description'] = $this->params['descripcion'];

        $response = [
            'mesage' => 'producto editado',
            'producto_nuevo' => $this->productsList[$this->params['id']],
            'producto_anterior' => $oldProduct
        ];

        return $this->run($response);
    }

    public function EliminarProducto()
    {
        $response = [
            'message' => 'Producto eliminado',
            'producto' => $this->productsList[$this->params['id']]
        ];

        return $this->run($response);
    }

    public function MostrarProducto()
    {
        return $this->run($this->productsList[$this->params['id']]);
    }
}