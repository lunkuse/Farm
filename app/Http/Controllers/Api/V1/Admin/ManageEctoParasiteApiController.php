<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageEctoParasiteRequest;
use App\Http\Requests\UpdateManageEctoParasiteRequest;
use App\Http\Resources\Admin\ManageEctoParasiteResource;
use App\Models\ManageEctoParasite;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageEctoParasiteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_ecto_parasite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageEctoParasiteResource(ManageEctoParasite::with(['block', 'acaricideUsed'])->get());
    }

    public function store(StoreManageEctoParasiteRequest $request)
    {
        $manageEctoParasite = ManageEctoParasite::create($request->validated());
        $manageEctoParasite->block()->sync($request->input('block', []));
        $manageEctoParasite->acaricideUsed()->sync($request->input('acaricideUsed', []));

        return (new ManageEctoParasiteResource($manageEctoParasite))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageEctoParasite $manageEctoParasite)
    {
        abort_if(Gate::denies('manage_ecto_parasite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageEctoParasiteResource($manageEctoParasite->load(['block', 'acaricideUsed']));
    }

    public function update(UpdateManageEctoParasiteRequest $request, ManageEctoParasite $manageEctoParasite)
    {
        $manageEctoParasite->update($request->validated());
        $manageEctoParasite->block()->sync($request->input('block', []));
        $manageEctoParasite->acaricideUsed()->sync($request->input('acaricideUsed', []));

        return (new ManageEctoParasiteResource($manageEctoParasite))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageEctoParasite $manageEctoParasite)
    {
        abort_if(Gate::denies('manage_ecto_parasite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageEctoParasite->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
