<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $slug)
    {
        $data = $request->validated();
        $product = Product::where('slug', $slug)->firstOrFail();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        $product->fresh();

        return redirect(route('product.show', $product->slug));
    }
}
