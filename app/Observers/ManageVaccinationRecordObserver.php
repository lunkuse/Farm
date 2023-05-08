<?php

namespace App\Observers;

use App\Models\ManageVaccinationRecord;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class ManageVaccinationRecordObserver
{
    public function created(ManageVaccinationRecord $manageVaccinationRecord): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($manageVaccinationRecord), $manageVaccinationRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(ManageVaccinationRecord $manageVaccinationRecord): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($manageVaccinationRecord), $manageVaccinationRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(ManageVaccinationRecord $manageVaccinationRecord): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($manageVaccinationRecord), $manageVaccinationRecord->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
