<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$posts = \App\Models\Post::all();
foreach ($posts as $post) {
    echo "ID: {$post->id} | Title: {$post->title}\n";
    echo "  featured_image: " . ($post->featured_image ?? 'NULL') . "\n";
    echo "  image_url: " . ($post->image_url ?? 'NULL') . "\n";
}
