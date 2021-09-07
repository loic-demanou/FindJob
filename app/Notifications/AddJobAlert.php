<?php

namespace App\Notifications;

use App\Http\Requests\ClientRequest;
use App\Models\Alert;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Job;
use App\Repositories\ClientRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AddJobAlert extends Notification
{
    use Queueable;

    public $job;

    /**
     * Create a new notification instance. 
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        // $alerts= Alert::all();
        // foreach ($alerts as $alert) {
        //     $alerteur= $alert->user_id;
        //     if ($alert->category_id == $request->category) {
        //         $users->notify(new AddJob($users));
        //         dd("ça correspond");
        //     }
        // }


        return [
            'job_id' => $this->job->id,
            'job_title' => $this->job->title, 
            'user_id' => Auth::user()->id,
            // 'alerteur' => ''
        ];
    }
}
