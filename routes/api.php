<?php

use App\Http\Controllers\Api\V1\Admin\AcaricideUsedApiController;
use App\Http\Controllers\Api\V1\Admin\BreedApiController;
use App\Http\Controllers\Api\V1\Admin\BreedingCommentApiController;
use App\Http\Controllers\Api\V1\Admin\ClinicalHistoryApiController;
use App\Http\Controllers\Api\V1\Admin\ColorApiController;
use App\Http\Controllers\Api\V1\Admin\CurrentDiagnosiApiController;
use App\Http\Controllers\Api\V1\Admin\DeliveryNatureApiController;
use App\Http\Controllers\Api\V1\Admin\ExpenditureTypeApiController;
use App\Http\Controllers\Api\V1\Admin\GenderApiController;
use App\Http\Controllers\Api\V1\Admin\GeneralStockRecordApiController;
use App\Http\Controllers\Api\V1\Admin\ManagebreedingRecordApiController;
use App\Http\Controllers\Api\V1\Admin\ManageEctoParasiteApiController;
use App\Http\Controllers\Api\V1\Admin\ManageExpenseApiController;
use App\Http\Controllers\Api\V1\Admin\ManageHealthRecordApiController;
use App\Http\Controllers\Api\V1\Admin\ManageStaffRecordApiController;
use App\Http\Controllers\Api\V1\Admin\SalePurposeApiController;
use App\Http\Controllers\Api\V1\Admin\ShelterApiController;
use App\Http\Controllers\Api\V1\Admin\SourceApiController;
use App\Http\Controllers\Api\V1\Admin\StaffPerfomanceApiController;
use App\Http\Controllers\Api\V1\Admin\StaffRecommendationApiController;
use App\Http\Controllers\Api\V1\Admin\TreatmentAdministeredApiController;
use App\Http\Controllers\Api\V1\Admin\VaccineAgainstApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Gender
    Route::apiResource('genders', GenderApiController::class);

    // Breed
    Route::apiResource('breeds', BreedApiController::class);

    // Color
    Route::apiResource('colors', ColorApiController::class);

    // Shelter
    Route::apiResource('shelters', ShelterApiController::class);

    // Source
    Route::apiResource('sources', SourceApiController::class);

    // General Stock Record
    Route::apiResource('general-stock-records', GeneralStockRecordApiController::class);

    // Clinical History
    Route::apiResource('clinical-histories', ClinicalHistoryApiController::class);

    // Current Diagnosis
    Route::apiResource('current-diagnosis', CurrentDiagnosiApiController::class);

    // Treatment Administered
    Route::apiResource('treatment-administereds', TreatmentAdministeredApiController::class);

    // Manage Health Record
    Route::apiResource('manage-health-records', ManageHealthRecordApiController::class);

    // Acaricide Used
    Route::apiResource('acaricide-useds', AcaricideUsedApiController::class);

    // Vaccine Against
    Route::apiResource('vaccine-againsts', VaccineAgainstApiController::class);

    // Manage Ecto Parasite
    Route::apiResource('manage-ecto-parasites', ManageEctoParasiteApiController::class);

    // Delivery Nature
    Route::apiResource('delivery-natures', DeliveryNatureApiController::class);

    // Breeding Comment
    Route::apiResource('breeding-comments', BreedingCommentApiController::class);

    // Managebreeding Record
    Route::apiResource('managebreeding-records', ManagebreedingRecordApiController::class);

    // Staff Perfomance
    Route::apiResource('staff-perfomances', StaffPerfomanceApiController::class);

    // Staff Recommendation
    Route::apiResource('staff-recommendations', StaffRecommendationApiController::class);

    // Manage Staff Record
    Route::apiResource('manage-staff-records', ManageStaffRecordApiController::class);

    // Sale Purpose
    Route::apiResource('sale-purposes', SalePurposeApiController::class);

    // Expenditure Type
    Route::apiResource('expenditure-types', ExpenditureTypeApiController::class);

    // Manage Expenses
    Route::apiResource('manage-expenses', ManageExpenseApiController::class);
});
