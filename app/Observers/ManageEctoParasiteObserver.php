<?php

namespace App\Observers;

use App\Models\ManageEctoParasite;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class ManageEctoParasiteObserver
{
    public function created(ManageEctoParasite $manageEctoParasite): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($manageEctoParasite), $manageEctoParasite->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(ManageEctoParasite $manageEctoParasite): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($manageEctoParasite), $manageEctoParasite->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(ManageEctoParasite $manageEctoParasite): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($manageEctoParasite), $manageEctoParasite->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
