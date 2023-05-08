<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BreedingComment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedingCommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('breeding_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breeding-comment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('breeding_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breeding-comment.create');
    }

    public function edit(BreedingComment $breedingComment)
    {
        abort_if(Gate::denies('breeding_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breeding-comment.edit', compact('breedingComment'));
    }

    public function show(BreedingComment $breedingComment)
    {
        abort_if(Gate::denies('breeding_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.breeding-comment.show', compact('breedingComment'));
    }
}
