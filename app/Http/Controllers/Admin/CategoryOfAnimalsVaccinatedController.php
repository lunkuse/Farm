<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryOfAnimalsVaccinated;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryOfAnimalsVaccinatedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_of_animals_vaccinated_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category-of-animals-vaccinated.index');
    }

    public function create()
    {
        abort_if(Gate::denies('category_of_animals_vaccinated_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category-of-animals-vaccinated.create');
    }

    public function edit(CategoryOfAnimalsVaccinated $categoryOfAnimalsVaccinated)
    {
        abort_if(Gate::denies('category_of_animals_vaccinated_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category-of-animals-vaccinated.edit', compact('categoryOfAnimalsVaccinated'));
    }

    public function show(CategoryOfAnimalsVaccinated $categoryOfAnimalsVaccinated)
    {
        abort_if(Gate::denies('category_of_animals_vaccinated_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category-of-animals-vaccinated.show', compact('categoryOfAnimalsVaccinated'));
    }
}
