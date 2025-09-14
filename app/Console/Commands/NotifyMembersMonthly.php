<?php

namespace App\Console\Commands;

use App\Mail\Email;
use App\Models\Member;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyMembersMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:notify-monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a monthly notification to all members';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $members = Member::all();
        foreach($members as $member){
            Mail::to($member->email)->send(new Email($member->first_name,$member->id));
        }
          $this->info('Monthly notifications sent successfully!');
    }
}
