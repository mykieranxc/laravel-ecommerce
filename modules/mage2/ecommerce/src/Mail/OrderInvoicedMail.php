<?php
namespace Mage2\Ecommerce\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Mage2\Ecommerce\Models\Database\Order;

class OrderInvoicedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    protected $path;

    public function __construct(Order $order, $path)
    {
        $this->path = $path;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mage2-ecommerce::admin.mail.order-invoiced')
                    ->attach($this->path, ['as' =>

                        'invoiced.pdf', 'mime' => 'application/pdf']);
        //->with('order', $this->order);
    }
}
