<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Trädgårdsdesign Projekt 1',
                'description' => 'Ett vackert trädgårdsprojekt med modern design',
                'order' => 1,
                'video_path' => 'assets/video/slide-4.mp4',
            ],
            [
                'title' => 'Gräsklippning Service',
                'description' => 'Professionell gräsklippning och underhåll',
                'order' => 2,
                'video_path' => 'assets/video/slide-2.mp4',
            ],
            [
                'title' => 'Trädgårdsskötsel',
                'description' => 'Komplett trädgårdsskötsel och plantering',
                'order' => 3,
                'video_path' => 'assets/video/slide-1.mp4',
            ],
            [
                'title' => 'Landskapsarkitektur',
                'description' => 'Kreativ landskapsarkitektur och design',
                'order' => 4,
                'video_path' => 'assets/video/slide-5.mp4',
            ],
            [
                'title' => 'Trädgårdsrenovering',
                'description' => 'Fullständig renovering av trädgårdar',
                'order' => 5,
                'video_path' => 'assets/video/slide-3.mp4',
            ],
        ];

        foreach ($videos as $videoData) {
            $videoPath = public_path($videoData['video_path']);

            if (file_exists($videoPath)) {
                $video = Video::create([
                    'title' => $videoData['title'],
                    'description' => $videoData['description'],
                    'order' => $videoData['order'],
                    'is_active' => true,
                ]);

                // Add video file
                $video->addMedia($videoPath)
                      ->preservingOriginal()
                      ->toMediaCollection('video');

                $this->command->info("✅ Video '{$videoData['title']}' created successfully!");
            } else {
                $this->command->warn("⚠️ Video file not found: {$videoPath}");
            }
        }
    }
}
