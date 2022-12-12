<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiscordRequest;
use App\Http\Requests\StoreDiscordRequest;
use App\Http\Requests\UpdateDiscordRequest;
use App\Models\Discord;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discord_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discords = Discord::with(['created_by'])->get();

        return view('admin.discords.index', compact('discords'));
    }

    public function create()
    {
        abort_if(Gate::denies('discord_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discords.create');
    }

    public function store(StoreDiscordRequest $request)
    {
        $discord = Discord::create($request->all());

        return redirect()->route('admin.discords.index');
    }

    public function edit(Discord $discord)
    {
        abort_if(Gate::denies('discord_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discord->load('created_by');

        return view('admin.discords.edit', compact('discord'));
    }

    public function update(UpdateDiscordRequest $request, Discord $discord)
    {
        $discord->update($request->all());

        return redirect()->route('admin.discords.index');
    }

    public function show(Discord $discord)
    {
        abort_if(Gate::denies('discord_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discord->load('created_by');

        return view('admin.discords.show', compact('discord'));
    }

    public function destroy(Discord $discord)
    {
        abort_if(Gate::denies('discord_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discord->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiscordRequest $request)
    {
        Discord::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
