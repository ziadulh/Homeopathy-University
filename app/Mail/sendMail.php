<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data,$pdf,$country;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$pdf,$country)
    {
        $this->data = $data;
        $this->pdf = $pdf;
        $this->country = $country;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Confirmation Mail')->view('mail',['name' => 'Admin'])->to($this->data->email)->attachData($this->pdf->output(), "invoice.pdf")->with(['data' => $this->data, 'country' => $this->country]);
        // return $this->subject('Test Mail')->view('mail',['name' => 'Ziadul'])->to('admin@adramail.com')->with('data',"Ziad");
    }
}
