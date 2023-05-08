<?php

namespace App\Providers;

use App\Listeners\AssignRoleForRegisteredUser;
use App\Models\GeneralStockRecord as GeneralStockRecordModel;
use App\Models\HealthCondition as HealthConditionModel;
use App\Models\ManagebreedingRecord as ManagebreedingRecordModel;
use App\Models\ManageEctoParasite as ManageEctoParasiteModel;
use App\Models\ManageVaccinationRecord as ManageVaccinationRecordModel;
use App\Models\OrchardRecord as OrchardRecordModel;
use App\Observers\GeneralStockRecordObserver;
use App\Observers\HealthConditionObserver;
use App\Observers\ManagebreedingRecordObserver;
use App\Observers\ManageEctoParasiteObserver;
use App\Observers\ManageVaccinationRecordObserver;
use App\Observers\OrchardRecordObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            AssignRoleForRegisteredUser::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        GeneralStockRecordModel::observe(GeneralStockRecordObserver::class);
        HealthConditionModel::observe(HealthConditionObserver::class);
        ManageVaccinationRecordModel::observe(ManageVaccinationRecordObserver::class);
        ManagebreedingRecordModel::observe(ManagebreedingRecordObserver::class);
        OrchardRecordModel::observe(OrchardRecordObserver::class);
        ManageEctoParasiteModel::observe(ManageEctoParasiteObserver::class);
    }
}
