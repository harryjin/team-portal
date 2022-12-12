<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkypeRequest;
use App\Http\Requests\StoreSkypeRequest;
use App\Http\Requests\UpdateSkypeRequest;
use App\Models\Skype;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skypes = Skype::with(['created_by'])->get();

        return view('admin.skypes.index', compact('skypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('skype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skypes.create');
    }

    public function store(StoreSkypeRequest $request)
    {
        $skype = Skype::create($request->all());

        return redirect()->route('admin.skypes.index');
    }

    public function edit(Skype $skype)
    {
        abort_if(Gate::denies('skype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skype->load('created_by');

        return view('admin.skypes.edit', compact('skype'));
    }

    public function update(UpdateSkypeRequest $request, Skype $skype)
    {
        $skype->update($request->all());

        return redirect()->route('admin.skypes.index');
    }

    public function show(Skype $skype)
    {
        abort_if(Gate::denies('skype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skype->load('created_by');

        return view('admin.skypes.show', compact('skype'));
    }

    public function destroy(Skype $skype)
    {
        abort_if(Gate::denies('skype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skype->delete();

        return back();
    }

    public function massDestroy(MassDestroySkypeRequest $request)
    {
        Skype::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
