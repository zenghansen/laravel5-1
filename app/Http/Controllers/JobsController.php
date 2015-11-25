<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Jobs\SendReminderEmail;

class JobsController extends Controller
{
   public function testSendJobs(){
       $user = User::findOrFail(1);

       $job = (new SendReminderEmail($user))->onQueue('default');

       $this->dispatch($job);

   }
}
