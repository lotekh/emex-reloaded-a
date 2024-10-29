<?php

namespace Database\Seeders;

use App\Models\BlogArticle;
use App\Models\Media;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/blogArticlesImport.json');
        $articles = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach($articles as $article) {
            $tags = explode(',', $article['tags']);

            $article = BlogArticle::firstOrCreate([
                'title' => $article['post_title'],
                'slug' => $article['post_name'],
                'body' => $article['post_content'],
                'created_at' => $article['post_date'],
            ]);

            self::uploadFile($article['image_url'], $article);

            foreach($tags as $tag) {
                $newTag = Tag::firstOrCreate(['name' => $tag]);

                $article->tags()->attach($newTag->id);
            }
        }
    }

    public static function uploadFile($fileUrl, $article)
    {
        $parts = explode('/', $fileUrl);
        $filename = end($parts);

        if ($fileUrl) {
            try {
                $header = get_headers($fileUrl);

                if (strpos($header[0], '404') === false) {
                    $imageContent = file_get_contents($fileUrl);
                    if ($imageContent) {
                        $maxId = Media::max('id');
                        $newId = $maxId + 1;
                        $image = '/media/' . $article->slug . '/' . $filename;
                        Storage::disk('public')->put($image, $imageContent);
                        $path = public_path('storage' . $image);

                        $data = getimagesize($path);
                        if ($data) {
                            $width = $data[0];
                            $height = $data[1];
                        } else {
                            $width = null;
                            $height = null;
                        }

                        $extension = explode('.', $filename)[1];
                        $filenameWithoutExtension = explode('.', $filename)[0];

                        switch($extension) {
                            case 'webp':
                                $type = 'image/webp';
                                break;
                            case 'jpg':
                                $type = 'image/jpg';
                                break;
                            case 'pdf':
                                $type = 'application/pdf';
                                break;
                            case 'png':
                                $type = 'image/png';
                                break; 
                            default: 
                                $type = '???';
                        }

                        Media::create([
                            'disk' => 'public',
                            'directory' => 'media/' . $newId,
                            'visibility' => 'public',
                            'name' => $filenameWithoutExtension,
                            'path' => 'media/' . $article->slug . '/' . $filename,
                            'height' => $height,
                            'width' => $width,
                            'type' => $type,
                            'ext' => $extension,
                        ]);

                        $article->featured_image_id = $newId;
                        $article->save();
                    }
                }
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
