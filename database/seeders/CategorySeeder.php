<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["computers & tablets",
                        "beeld & geluid",
                        "telefonie",
                        "huishouden & wonen",
                        "keuken",
                        "sport & verzorging",
                        "foto & video",
                        "navigaties,reizen,fashion",
                        "knutselen",
                        "andere"];

        foreach($categories as $cat) {
            Category::create([
            'category_name' => $cat,
            ]);
        }
    }
}