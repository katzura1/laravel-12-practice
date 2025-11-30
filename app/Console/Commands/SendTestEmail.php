<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-email {to?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // get from params
        $to = $this->argument('to') ?? 'test@capengoding.com';
        try {
            \Mail::to($to)->send(new \App\Mail\TestEmail());

            $this->info('Test email sent to ' . $to);
        } catch (\Throwable $th) {
            $this->error('Failed to send test email: ' . $th->getMessage());
        }
    }
}
