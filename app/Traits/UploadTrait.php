<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait UploadTrait
{
    /**
     * Upload a file, optionally deleting the old one.
     *
     * @param UploadedFile $file The file to upload.
     * @param string $path The destination path (relative to public_path).
     * @param string|null $oldFile The filename of the old file to delete.
     * @return string The new filename.
     */
    public function uploadFile(UploadedFile $file, string $path, $oldFile = null): string
    {
        // Delete old file if it exists
        if ($oldFile) {
            $oldFilePath = public_path($path . '/' . $oldFile);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        // Generate new filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Move file to destination
        $file->move(public_path($path), $filename);

        return $filename;
    }

    /**
     * Delete a file.
     *
     * @param string $path The path (relative to public_path).
     * @param string $filename The filename to delete.
     * @return bool True if deleted, false otherwise.
     */
    public function deleteFile(string $path, string $filename): bool
    {
        $filePath = public_path($path . '/' . $filename);
        if (File::exists($filePath)) {
            return File::delete($filePath);
        }
        return false;
    }
}
