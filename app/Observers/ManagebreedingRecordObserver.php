<?php

namespace App\Observers;

use App\Models\ManagebreedingRecord;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class ManagebreedingRecordObserver
{
    public function created(ManagebreedingRecord $managebreedingRecord): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($managebreedingRecord), $managebreedingRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(ManagebreedingRecord $managebreedingRecord): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($managebreedingRecord), $managebreedingRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(ManagebreedingRecord $managebreedingRecord): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($managebreedingRecord), $managebreedingRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
