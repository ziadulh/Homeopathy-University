<?php

namespace App\Mail;

use App\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data,$country;

    public function __construct($data,$country)
    {
        $this->data = $data;
        $this->country = $country;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = Setting::first();
        return $this->subject('Notification mail')->view('mailToAdmin',['name' => 'Ziadul'])->to($mail->site_admin_email)->with(['data'=> $this->data, 'mail' => $mail, 'country' => $this->country]);
    }
}
