<?php

namespace App\Mail;

use App\Models\report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DownloadRapport extends Mailable
{
    use Queueable, SerializesModels;
    public $report;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($report_id)
    {
        $this->report = report::find($report_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('themplates.basic.mail.downloadRapport');
    }
}
