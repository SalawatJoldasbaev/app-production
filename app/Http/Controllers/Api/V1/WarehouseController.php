<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index(WarehouseRequest $request)
    {
        $products = $request->products;
        $data = [];
        $warehouses = Warehouse::all(['id', 'material_id', 'remainder', 'price']);
        foreach ($products as $item_product) {
            $product = Product::byCode($item_product['product_code']);
            $materials = $product->materials;
            $product_materals = collect([]);

            for ($i = 0; $i < count($materials); $i++) {

                $material = $materials[$i];
                $material_name = $material->material->name;
                $quantity = $material->quantity * $item_product['count'];
                $warehouse = $warehouses->where('remainder', '!=', 0)->where('material_id', $material->material_id)->first();
                $used_material = $product_materals->where('material_name', $material_name);
                $temp = [
                    'warehouse_id' => null,
                    'material_name' => $material_name,
                    'qty' => 0,
                    'price' => null
                ];
                if (!$warehouse) {
                    $temp['qty'] = $quantity;
                    if (isset($used_material)) {
                        $temp['qty'] -= $used_material->sum('qty');
                    }
                    $product_materals->push($temp);
                    continue;
                }
                $remainder = $warehouse->remainder;
                $temp['warehouse_id'] = $warehouse->id;
                $temp['price'] = $warehouse->price;

                if ($remainder - $quantity < 0) {
                    $temp['qty'] = $remainder;
                    $warehouse->remainder = 0;
                    $i--;
                } else {
                    $temp['qty'] = $quantity;
                    $warehouse->remainder -= $quantity;
                    if (isset($used_material)) {
                        $warehouse->remainder += $used_material->sum('qty');
                        $temp['qty'] -= $used_material->sum('qty');
                    }
                }
                $temp['qty'] = abs(round($temp['qty'], 1));
                $product_materals->push($temp);
            }
            $data[] = [
                'product_name' => $product->name,
                'product_qty' => (int)$item_product['count'],
                'product_materials' => $product_materals
            ];
        }
        return response($data);
    }
}
