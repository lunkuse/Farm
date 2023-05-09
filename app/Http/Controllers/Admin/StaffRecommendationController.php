<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffRecommendation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffRecommendationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_recommendation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-recommendation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staff_recommendation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-recommendation.create');
    }

    public function edit(StaffRecommendation $staffRecommendation)
    {
        abort_if(Gate::denies('staff_recommendation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-recommendation.edit', compact('staffRecommendation'));
    }

    public function show(StaffRecommendation $staffRecommendation)
    {
        abort_if(Gate::denies('staff_recommendation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-recommendation.show', compact('staffRecommendation'));
    }
}
