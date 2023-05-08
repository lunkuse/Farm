<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBreedingCommentRequest;
use App\Http\Requests\UpdateBreedingCommentRequest;
use App\Http\Resources\Admin\BreedingCommentResource;
use App\Models\BreedingComment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedingCommentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('breeding_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BreedingCommentResource(BreedingComment::all());
    }

    public function store(StoreBreedingCommentRequest $request)
    {
        $breedingComment = BreedingComment::create($request->validated());

        return (new BreedingCommentResource($breedingComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BreedingComment $breedingComment)
    {
        abort_if(Gate::denies('breeding_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BreedingCommentResource($breedingComment);
    }

    public function update(UpdateBreedingCommentRequest $request, BreedingComment $breedingComment)
    {
        $breedingComment->update($request->validated());

        return (new BreedingCommentResource($breedingComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BreedingComment $breedingComment)
    {
        abort_if(Gate::denies('breeding_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $breedingComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
