<?php

namespace App\Jobs;

use App\Models\AdminNotifications;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class subscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    public $tries = 1; // количество попыток (обязательно public)

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $subscription = Subscription::create([ // создает новую запись в таблице Message
                'user_id' => Auth::check() ? Auth::user()->id : null,
                'email' => $this->email,
                'status' => 1,
            ]);

            AdminNotifications::create([
                'notification_id' => $subscription->id,
                'type' => 'Подписка',
                'view' => 0,
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Our error", 101); // вызываем ошибку
        }
    }

    public function failed(\Exception $e)
    {
        info(__CLASS__.": ошибка выполнения"); // помещаем данные в лог файл laravel
    }
}
