<?php

use App\Http\Controllers\Ticket;
use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;
use Bayscope\Paystack\Transaction\Singlecharge;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/admin', Admin::class);

Route::get('/payment/callback', function () {
    $reference = request()->query('trxref');
    (object)$paymentStatus = (new Singlecharge(env('PAYSTACK_SECRET_KEY')))->verifyTransaction($reference);

    if ($paymentStatus->data->status === 'success') {
        $metaData = $paymentStatus->data->metadata;
        Ticket::handle($metaData);
        return view('payment.success');
    }

    return view('payment.failed');
})->name('payment.callback');
