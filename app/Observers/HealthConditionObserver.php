<?php

namespace App\Observers;

use App\Models\HealthCondition;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class HealthConditionObserver
{
    public function created(HealthCondition $healthCondition): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($healthCondition), $healthCondition->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(HealthCondition $healthCondition): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($healthCondition), $healthCondition->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(HealthCondition $healthCondition): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($healthCondition), $healthCondition->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
