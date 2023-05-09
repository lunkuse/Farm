<?php

use App\Http\Controllers\Admin\AcaricideUsedController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Admin\BreedingCommentController;
use App\Http\Controllers\Admin\CategoryOfAnimalsVaccinatedController;
use App\Http\Controllers\Admin\ClinicalHistoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\Admin\CurrentDiagnosiController;
use App\Http\Controllers\Admin\DeliveryNatureController;
use App\Http\Controllers\Admin\ExpenditureTypeController;
use App\Http\Controllers\Admin\FruitTypeController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\GeneralStockRecordController;
use App\Http\Controllers\Admin\HarvestcommentController;
use App\Http\Controllers\Admin\HarvestorController;
use App\Http\Controllers\Admin\HealthConditionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KidNumberController;
use App\Http\Controllers\Admin\ManagebreedingRecordController;
use App\Http\Controllers\Admin\ManageEctoParasiteController;
use App\Http\Controllers\Admin\ManageExpenseController;
use App\Http\Controllers\Admin\ManageHealthRecordController;
use App\Http\Controllers\Admin\ManageSaleRecordController;
use App\Http\Controllers\Admin\ManageStaffRecordController;
use App\Http\Controllers\Admin\ManageVaccinationRecordController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrchardRecordController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalePurposeController;
use App\Http\Controllers\Admin\ShelterController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\SpiritialAffiliationController;
use App\Http\Controllers\Admin\StaffPaymentRecordController;
use App\Http\Controllers\Admin\StaffPerfomanceController;
use App\Http\Controllers\Admin\StaffRecommendationController;
use App\Http\Controllers\Admin\StockTypeController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\TaskCalendarController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TaskStatusController;
use App\Http\Controllers\Admin\TaskTagController;
use App\Http\Controllers\Admin\TreatmentAdministeredController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VaccineAgainstController;
use App\Http\Controllers\Auth\ApprovalController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::get('email/approval', [ApprovalController::class, 'show'])->name('approval.notice');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'approved']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::post('users/media', [UserController::class, 'storeMedia'])->name('users.storeMedia');
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Gender
    Route::resource('genders', GenderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Breed
    Route::resource('breeds', BreedController::class, ['except' => ['store', 'update', 'destroy']]);

    // Color
    Route::resource('colors', ColorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Shelter
    Route::resource('shelters', ShelterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Source
    Route::resource('sources', SourceController::class, ['except' => ['store', 'update', 'destroy']]);

    // General Stock Record
    Route::resource('general-stock-records', GeneralStockRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Status
    Route::resource('task-statuses', TaskStatusController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Tag
    Route::resource('task-tags', TaskTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task
    Route::post('tasks/media', [TaskController::class, 'storeMedia'])->name('tasks.storeMedia');
    Route::resource('tasks', TaskController::class, ['except' => ['store', 'update', 'destroy']]);

    // Task Calendar
    Route::resource('task-calendars', TaskCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Contact Company
    Route::resource('contact-companies', ContactCompanyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Contacts
    Route::resource('contact-contacts', ContactContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Clinical History
    Route::resource('clinical-histories', ClinicalHistoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Current Diagnosis
    Route::resource('current-diagnosis', CurrentDiagnosiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Treatment Administered
    Route::resource('treatment-administereds', TreatmentAdministeredController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Health Record
    Route::resource('manage-health-records', ManageHealthRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Acaricide Used
    Route::resource('acaricide-useds', AcaricideUsedController::class, ['except' => ['store', 'update', 'destroy']]);

    // Vaccine Against
    Route::resource('vaccine-againsts', VaccineAgainstController::class, ['except' => ['store', 'update', 'destroy']]);

    // Category Of Animals Vaccinated
    Route::resource('category-of-animals-vaccinateds', CategoryOfAnimalsVaccinatedController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Vaccination Record
    Route::resource('manage-vaccination-records', ManageVaccinationRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Ecto Parasite
    Route::resource('manage-ecto-parasites', ManageEctoParasiteController::class, ['except' => ['store', 'update', 'destroy']]);

    // Delivery Nature
    Route::resource('delivery-natures', DeliveryNatureController::class, ['except' => ['store', 'update', 'destroy']]);

    // Kid Number
    Route::resource('kid-numbers', KidNumberController::class, ['except' => ['store', 'update', 'destroy']]);

    // Breeding Comment
    Route::resource('breeding-comments', BreedingCommentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Managebreeding Record
    Route::resource('managebreeding-records', ManagebreedingRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Staff Perfomance
    Route::resource('staff-perfomances', StaffPerfomanceController::class, ['except' => ['store', 'update', 'destroy']]);

    // Staff Recommendation
    Route::resource('staff-recommendations', StaffRecommendationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Staff Payment Record
    Route::resource('staff-payment-records', StaffPaymentRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Staff Record
    Route::resource('manage-staff-records', ManageStaffRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sale Purpose
    Route::resource('sale-purposes', SalePurposeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Sale Records
    Route::resource('manage-sale-records', ManageSaleRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Expenditure Type
    Route::resource('expenditure-types', ExpenditureTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Manage Expenses
    Route::resource('manage-expenses', ManageExpenseController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    Route::resource('system-calendars', SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Stock Type
    Route::resource('stock-types', StockTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Health Condition
    Route::resource('health-conditions', HealthConditionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Spiritial Affiliation
    Route::resource('spiritial-affiliations', SpiritialAffiliationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Skill
    Route::resource('skills', SkillController::class, ['except' => ['store', 'update', 'destroy']]);

    // Blocks
    Route::resource('blocks', BlockController::class, ['except' => ['store', 'update', 'destroy']]);

    // User Alert
    Route::get('user-alerts/seen', [UserAlertController::class, 'seen'])->name('user-alerts.seen');
    Route::resource('user-alerts', UserAlertController::class, ['except' => ['store', 'update', 'destroy']]);

    // Fruit Type
    Route::resource('fruit-types', FruitTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Harvestors
    Route::resource('harvestors', HarvestorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Orchard Record
    Route::resource('orchard-records', OrchardRecordController::class, ['except' => ['store', 'update', 'destroy']]);

    // Harvestcomments
    Route::resource('harvestcomments', HarvestcommentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
