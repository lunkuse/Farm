<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageEctoParasite;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageEctoParasiteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_ecto_parasite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-ecto-parasite.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_ecto_parasite_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-ecto-parasite.create');
    }

    public function edit(ManageEctoParasite $manageEctoParasite)
    {
        abort_if(Gate::denies('manage_ecto_parasite_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-ecto-parasite.edit', compact('manageEctoParasite'));
    }

    public function show(ManageEctoParasite $manageEctoParasite)
    {
        abort_if(Gate::denies('manage_ecto_parasite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageEctoParasite->load('block', 'acaricideUsed');

        return view('admin.manage-ecto-parasite.show', compact('manageEctoParasite'));
    }
}
