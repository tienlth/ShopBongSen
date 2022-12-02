<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Evaluation;
use App\Models\Producttype;
use App\Models\Relation;
use App\Models\Style;
use App\View\Components\OrderStatus;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            IngredientSeeder::class,
            SupplierSeeder::class,
            WorkplaceSeeder::class,
            FeedbackProblemSeeder::class,
            RelationSeeder::class,
            OrderStatusSeeder::class,
            EventTypeSeeder::class,
            InstockSeeder::class,
            ImportCouponSeeder::class,
            ImportDetailSeeder::class,
            ProductSeeder::class,
            IngredientOfProductSeeder::class,
            OrderSeeder::class,
            FeedbackSeeder::class,
            ProductTypeSeeder::class,
            StyleSeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}
