<?php

namespace App\Servise;

use YooKassa\Client;


class PaymentServise
{
    public function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));

        return $client;
    }

    /**
     * @param $amount
     * @param $description
     * @param $options
     * @return string
     * @throws \YooKassa\Common\Exceptions\ApiConnectionException
     * @throws \YooKassa\Common\Exceptions\ApiException
     * @throws \YooKassa\Common\Exceptions\AuthorizeException
     * @throws \YooKassa\Common\Exceptions\BadApiRequestException
     * @throws \YooKassa\Common\Exceptions\ExtensionNotFoundException
     * @throws \YooKassa\Common\Exceptions\ForbiddenException
     * @throws \YooKassa\Common\Exceptions\InternalServerError
     * @throws \YooKassa\Common\Exceptions\NotFoundException
     * @throws \YooKassa\Common\Exceptions\ResponseProcessingException
     * @throws \YooKassa\Common\Exceptions\TooManyRequestsException
     * @throws \YooKassa\Common\Exceptions\UnauthorizedException
     */
    public function createPayment($amount, $description, $options=[])
    {
        $client = $this->getClient();
        $payment = $client->createPayment([
            'amount' => [
                'value' => $amount,
                'currency' => 'RUB',
            ],
            'capture' => true,
            'description' => $description,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payment.index'),
                ],
            'metadata' => [
                'transaction_id' => $options['transaction_id'],
                'user_id' => $options['user_id'],
                'service_name' => $options['service_name'],
                // здесь можно передавать id product или курса для открытия
                ],
            ], uniqid('', true));

        return $payment->getConfirmation()->getConfirmationUrl();
    }

}
