<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class MigrateProductData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:product-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Di chuyển dữ liệu từ type và type_id sang các cột mới';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->type === 'laptop') {
                $product->laptop_id = $product->type_id;
            } elseif ($product->type === 'component') {
                $product->component_id = $product->type_id;
            } elseif ($product->type === 'accessories') {
                $product->accessories_id = $product->type_id;
            }

            $product->save();
        }

        $this->info('Dữ liệu đã được di chuyển thành công!');
    }
}
