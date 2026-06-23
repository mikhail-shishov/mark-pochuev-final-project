<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder {
    public function run(): void {
        Page::create([
            'title' => 'About',
            'slug' => 'about',
            'content' => 'This is the about us page content.',
        ]);
    }
}
