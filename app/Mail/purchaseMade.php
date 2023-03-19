<?php

namespace App\Mail;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class purchaseMade extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Purchase Store',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $shopping = Cart::all()->where('user_id', '=', $this->user->id);
        $products = [];
        foreach ($shopping as $product) {
            $item = Product::find($product->product_id);
            $item->qt = $product->quantity;
            array_push($products, $item);
        }

        return new Content(
            view: 'mail.purchaseEmail',
            with: [
                'products' => $products,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
