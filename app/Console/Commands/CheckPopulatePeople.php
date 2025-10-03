<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Person;
use Illuminate\Support\Facades\Mail;
use App\Mail\PopularPeopleNotification;

class CheckPopulatePeople extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:popular';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify if any person has >50 likes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Don't forget to pray before you start coding!
    $popular = Person::withCount(['likes as likes_count' => fn($q) => $q->where('type', 'like')])
        ->having('likes_count', '>', 50)
        ->get();

    if ($popular->isNotEmpty()) {
        Mail::to('admin@example.com')->send(new PopularPeopleNotification($popular));

        $this->info('Email sent. Popular people: ' . $popular->pluck('name')->join(', '));
    } else {
        $this->info('No popular people found.');
    }
    }
}
