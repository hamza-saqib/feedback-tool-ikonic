<?php

namespace Database\Seeders;

use App\Models\FeedbackCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Bug Report', 'Feature Request', 'Improvements', 'Other'];

        foreach ($categories as $category) {
            FeedbackCategory::create(
                ['name' => $category],
            );
        }
    }
}
