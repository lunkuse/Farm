<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skill.index');
    }

    public function create()
    {
        abort_if(Gate::denies('skill_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skill.create');
    }

    public function edit(Skill $skill)
    {
        abort_if(Gate::denies('skill_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skill.edit', compact('skill'));
    }

    public function show(Skill $skill)
    {
        abort_if(Gate::denies('skill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skill.show', compact('skill'));
    }
}
