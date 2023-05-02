<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->view('email.body', ['url' => $url, 'title' => __('email.verify_title'), 'subtitle' => __('email.verify_subtitle'), 'button' => __('email.verify_button')])
                ->subject(__("email.verify_subject"));
        });
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = route('password.reset',$token).'?email='.$notifiable->getEmailForPasswordReset();
            return (new MailMessage())
                ->subject(__('email.recover_subject'))
                ->view('email.body', ['url' => $url, 'title' => __("email.recover_title"), 'subtitle' => __('email.recover_subtitle'), 'button' => __('email.recover_button')]);
        });
    }
}
