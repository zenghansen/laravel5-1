<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Mail;
use Exception;

class SendReminderEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$this->release(10); //´ÎÊý
        $user = $this->user;
        $url = route('confirmation', ['token' => $user->registration_token]);
        Mail::send('emails/registration', compact('user', 'url'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('test!');
        });
        \Log::info($this->job->getJobId());
        //throw new Exception;

    }
    public function failed()
    {
    }
}
