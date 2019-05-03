<?php

namespace App\Http\Controllers;

use App\Domain\Actions\ProductActions;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ItemsController
 */
class ItemsController extends Controller
{
    /**
     * @var ProductActions
     */
    private $productActions;

    /**
     * ItemsController constructor.
     *
     * @param ProductActions $productActions
     */
    public function __construct(ProductActions $productActions)
    {
        $this->productActions = $productActions;
    }

    /**
     * @param $productId
     *
     * @return Response
     */
    public function show($productId) : Response
    {
        $product = $this->productActions->getById(intval($productId));

        if (is_null($product)) {
            abort(404);
        }

        return response()->json($product);
    }
}