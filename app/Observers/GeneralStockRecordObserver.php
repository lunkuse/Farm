<?php

namespace App\Observers;

use App\Models\GeneralStockRecord;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class GeneralStockRecordObserver
{
    public function created(GeneralStockRecord $generalStockRecord): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($generalStockRecord), $generalStockRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(GeneralStockRecord $generalStockRecord): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($generalStockRecord), $generalStockRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(GeneralStockRecord $generalStockRecord): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($generalStockRecord), $generalStockRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
