<?php

namespace App\Observers;

use App\Models\OrchardRecord;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class OrchardRecordObserver
{
    public function created(OrchardRecord $orchardRecord): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($orchardRecord), $orchardRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(OrchardRecord $orchardRecord): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($orchardRecord), $orchardRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(OrchardRecord $orchardRecord): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($orchardRecord), $orchardRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
