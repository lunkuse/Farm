<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralStockRecord;
use App\Models\ManagebreedingRecord;
use App\Models\ManageEctoParasite;
use App\Models\ManageHealthRecord;
use App\Models\ManageSaleRecord;
use App\Models\ManageVaccinationRecord;
use App\Models\OrchardRecord;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => GeneralStockRecord::class,
            'date_field' => 'date',
            'field'      => 'tag_no',
            'prefix'     => 'Stock',
            'suffix'     => 'was added',
            'route'      => 'admin.general-stock-records.edit',
        ],
        [
            'model'      => Task::class,
            'date_field' => 'due_date',
            'field'      => 'name',
            'prefix'     => 'task',
            'suffix'     => 'is due',
            'route'      => 'admin.tasks.edit',
        ],
        [
            'model'      => ManagebreedingRecord::class,
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => 'on',
            'suffix'     => ', new breed was added',
            'route'      => 'admin.managebreeding-records.edit',
        ],
        [
            'model'      => ManageVaccinationRecord::class,
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => 'On',
            'suffix'     => 'new vaccination record was added',
            'route'      => 'admin.manage-vaccination-records.edit',
        ],
        [
            'model'      => ManageEctoParasite::class,
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => 'On',
            'suffix'     => 'new Octo parasite reccod was added',
            'route'      => 'admin.manage-ecto-parasites.edit',
        ],
        [
            'model'      => ManageSaleRecord::class,
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => 'On',
            'suffix'     => ', new sale was made',
            'route'      => 'admin.manage-sale-records.edit',
        ],
        [
            'model'      => ManageHealthRecord::class,
            'date_field' => 'date',
            'field'      => 'id',
            'prefix'     => 'On',
            'suffix'     => 'new health record was added',
            'route'      => 'admin.manage-health-records.edit',
        ],
        [
            'model'      => OrchardRecord::class,
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => 'On',
            'suffix'     => 'new orchard record',
            'route'      => 'admin.orchard-records.edit',
        ],
    ];

    public function index()
    {
        abort_if(Gate::denies('system_calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => sprintf(
                        '%s %s %s',
                        trim($source['prefix']),
                        $model->{$source['field']},
                        trim($source['suffix']),
                    ),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model),
                ];
            }
        }

        return view('admin.system-calendar.index', compact('events'));
    }
}
