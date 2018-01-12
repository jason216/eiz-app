<?php

namespace App\Jobs;

use App\Models\Account;

class SendAccountVarificationEmail extends Job
{
    protected $acccount;

    public function __construct(Account $acccount)
    {
        $this->acccount = $acccount;
    }

    public function handle()
    {
        $acccount = $this->acccount;
        app('mailer')->send('email.accountVarifiction', ['account' => $acccount],function ($message) use ($acccount) {
            $message->to($acccount->email);
        });
    }
}
