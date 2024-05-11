<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SlackWebhookHandler;
use Illuminate\Http\Request;

class SimpleFormatter
{
    protected $request;

    public function __construct(Request $request = null)
    {
        $this->request = $request;
    }

    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            if ($handler instanceof SlackWebhookHandler) {
                $handler->setFormatter(new LineFormatter(
                    '[%datetime%] %channel%.%level_name%: %message% %context% %extra%'
                ));

                $handler->pushProcessor([$this, 'processLogRecord']);
            }
        }
    }

    public function processLogRecord(array $record): array
    {
        $record['extra'] += [
            'url' => env("APP_URL"),
        ];

        return $record;
    }
}
