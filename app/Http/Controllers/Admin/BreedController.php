<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('breed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breed.index');
    }

    public function create()
    {
        abort_if(Gate::denies('breed_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breed.create');
    }

    public function edit(Breed $breed)
    {
        abort_if(Gate::denies('breed_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breed.edit', compact('breed'));
    }

    public function show(Breed $breed)
    {
        abort_if(Gate::denies('breed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breed.show', compact('breed'));
    }
}
