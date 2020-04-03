<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendPdf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $data,$pdf,$country;


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
        // return $this->view('view.name');
        return $this->subject('Registration Confirmation Mail')->view('mail',['name' => 'Admin'])->to($this->data->email)->attachData($this->pdf->output(), "invoice.pdf")->with(['data' => $this->data, 'country' => $this->country]);
        return $this->subject('Reigstration Confirmation Mail')->view('pdfsend',['name' => 'Admin'])->to($this->email)->attachData($this->pdf->output(), "invoice.pdf")->with('data',$this->name);
    }
}
