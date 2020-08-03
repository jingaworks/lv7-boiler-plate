<?php

namespace App\Http\Controllers\Api\V1\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Seller\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['category', 'subcategory', 'region', 'place', 'created_by'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('images', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['category', 'subcategory', 'region', 'place', 'created_by']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('images', false)) {
            if (!$product->images || $request->input('images') !== $product->images->file_name) {
                if ($product->images) {
                    $product->images->delete();
                }

                $product->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
            }
        } elseif ($product->images) {
            $product->images->delete();
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}