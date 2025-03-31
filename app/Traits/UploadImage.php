<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    /**
     * @param Request $request
     * @param string $fieldName
     * @param string $directory
     * @return bool|string|RedirectResponse|null
     */
    public function upload(Request $request, string $fieldName = 'image', string $directory = 'images' ): bool|string|RedirectResponse|null
    {
        if($request->hasFile($fieldName)) {
            if (!$request->file($fieldName)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();

            }
            return $request->file($fieldName)->store($directory, 'public');
        }
        return null;
    }

    /**
     * @param Request $request
     * @param $product
     * @param string $fieldName
     * @param string $directory
     * @return string|RedirectResponse
     */
    public function uploadAndDeleteOld(Request $request, $product, string $fieldName = 'image', string $directory = 'images'): string|RedirectResponse
    {
        if ($request->hasFile('image')) {
            if (!$request->file($fieldName)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }
            // Delete old image
            if ($product->image && $product->image != 'no-image.jpg') {
                Storage::delete('public/' . $product->image);
            }

            // Store new image
            return $request->file($fieldName)->store($directory, 'public');
        }
        return 'no-image.jpg';
    }
}

