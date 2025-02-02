<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait HandlesFileUpload
{
    /**
     * @param Request $request
     * @param $model
     * @param string $key
     * @param string $classification
     * @return void
     */
    public static function handlePossibleFileUpload(Request $request, $model, string $key, string $classification): void
    {
        if ($request->hasFile($key)) {
            $model->addMediaFromRequest($key)
                ->withCustomProperties(['classification'=> $classification])
                ->toMediaCollection('application-documents');
        }
    }

    /**
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function downloadDocument(Request $request): BinaryFileResponse
    {
        $media = Media::find($request->id);
        return response()->download($media->getPath(), $media->file_name);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public static function deleteAttachment(Request $request): JsonResponse
    {
        $media = Media::findOrFail($request->id);
        $media->delete();
        return response()->json(['message' => 'Attachment deleted successfully.']);
    }

}
