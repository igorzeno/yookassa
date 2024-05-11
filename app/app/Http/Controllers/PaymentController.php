<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Models\Transaction;
use App\Servise\PaymentServise;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use YooKassa\Model\Notification\NotificationEventType;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;

class PaymentController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        return view('payment.index',[
            'transactions' => $transactions,
        ]);
    }

    public function create(Request $request, PaymentServise $servise)
    {
        $amount = (float)$request->input('amount');
        $description = (string)$request->input('description');
        $transaction = Transaction::create([
            'amount' => $amount,
            'description' => $description
        ]);
        Log::info('Showing the user profile for user: '.$amount);

        if ($transaction) {
            $link = $servise->createPayment($amount, $description, [
                'transaction_id' => $transaction->id,
                'user_id' => "Вася",
                'service_name' => "Оплата за сервис",
            ]);
            return redirect()->away($link);
        }
    }

    public function callback(Request $request, PaymentServise $service)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();

        if(isset($payment->status) && $payment->status === 'succeeded'){
            if((bool)$payment->paid == true){
                $metadata = (object) $payment->metadata;
                if(isset($metadata->transaction_id)){
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();

                    if(cache()->has('amount')){
                        cache()->forever('balance', (float)cache()->get('balance') + (float)$payment->amount->value);
                    }
                    else{
                        cache()->forever('balance', (float)$payment->amount->value);
                    }

                }
            }
        }
    }
}
