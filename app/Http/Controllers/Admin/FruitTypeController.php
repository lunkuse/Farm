<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FruitType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FruitTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fruit_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fruit-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('fruit_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fruit-type.create');
    }

    public function edit(FruitType $fruitType)
    {
        abort_if(Gate::denies('fruit_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fruit-type.edit', compact('fruitType'));
    }

    public function show(FruitType $fruitType)
    {
        abort_if(Gate::denies('fruit_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fruit-type.show', compact('fruitType'));
    }
}
