<?php

namespace App;

use Awcodes\Curator\PathGenerators\Contracts\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(?string $baseDir = null): string
    {
        // Default base directory
        // $baseDir = $baseDir ?? 'uploads';

        // Get file extension (Filament Curator will handle file processing)
        $extension = request()->file('file')?->getClientOriginalExtension();

        $snapshot = json_decode(request()->components[0]['snapshot']);

        $temporaryFileName = array_values((array)$snapshot->data->data[0]->file[0])[0][0];

        $extension = pathinfo($temporaryFileName, PATHINFO_EXTENSION);

        // Define folders based on file extension
        $folders = [
            'jpg'  => 'images',
            'jpeg' => 'images',
            'png'  => 'images',
            'gif'  => 'images',
            'pdf'  => 'technical-files',
            'doc'  => 'technical-files',
            'docx' => 'technical-files',
        ];

        // Determine the folder name
        $folder = $folders[strtolower($extension)] ?? 'others';

        // Return the full path (e.g., "uploads/images/2025/02")

        return "{$baseDir}/{$folder}";
    }
}
