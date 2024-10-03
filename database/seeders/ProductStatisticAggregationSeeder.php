<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStatisticAggregationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Step 1: Create a temporary table and aggregate data
        DB::statement(`
            CREATE TEMPORARY TABLE temp_product_statistics AS
            SELECT
                NULL AS id,
                queue_id,
                ROUND(AVG(count), 0) AS count,
                ROUND(AVG(average_price_with_outliners), 0) AS average_price_with_outliners,
                ROUND(AVG(average_price), 0) AS average_price,
                category_id,
                city_id,
                DATE_FORMAT(created_at, '%Y-%m-01') AS created_at
            FROM product_statistics
            WHERE created_at < '2024-01-01'
            GROUP BY
                queue_id,
                category_id,
                city_id,
                DATE_FORMAT(created_at, '%Y-%m-01');
        `);

        // Step 2: Delete old records from the product_statistics table
        DB::statement(`
            DELETE FROM product_statistics
            WHERE created_at < '2024-01-01';
        `);

        // Step 3: Insert aggregated data back into the product_statistics table
        DB::statement(`
            INSERT INTO product_statistics (queue_id, count, average_price_with_outliners, average_price, category_id, city_id, created_at)
            SELECT
                queue_id,
                count,
                average_price_with_outliners,
                average_price,
                category_id,
                city_id,
                created_at
            FROM temp_product_statistics;
        `);

        DB::statement(`DROP TEMPORARY TABLE IF EXISTS temp_product_statistics;`);
    }
}
