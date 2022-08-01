<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class FetchProductPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:price {product_id? : ID продукта}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch product price from db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // исполнение команды php artisan fetch:price 2
        $id = $this->argument('product_id'); // указываемый в команде аргумент
        if (!$id) {
            $id = $this->ask('Введите ID'); // вывод в консоль вопроса
        }

        $product = Product::find($id);
        if(!$product) {
            $this->error('Продукта с id ' . $id .' не существует'); // вывод ошибки
            return 1;
        }

        print_r($product->price.PHP_EOL); // PHP_EOL перенос строки

        return 0;
    }
}
