<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRecommendationRequest;
use App\Http\Requests\UpdateStaffRecommendationRequest;
use App\Http\Resources\Admin\StaffRecommendationResource;
use App\Models\StaffRecommendation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffRecommendationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_recommendation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffRecommendationResource(StaffRecommendation::all());
    }

    public function store(StoreStaffRecommendationRequest $request)
    {
        $staffRecommendation = StaffRecommendation::create($request->validated());

        return (new StaffRecommendationResource($staffRecommendation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StaffRecommendation $staffRecommendation)
    {
        abort_if(Gate::denies('staff_recommendation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffRecommendationResource($staffRecommendation);
    }

    public function update(UpdateStaffRecommendationRequest $request, StaffRecommendation $staffRecommendation)
    {
        $staffRecommendation->update($request->validated());

        return (new StaffRecommendationResource($staffRecommendation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StaffRecommendation $staffRecommendation)
    {
        abort_if(Gate::denies('staff_recommendation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffRecommendation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
