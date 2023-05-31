<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRemotePcRequest;
use App\Http\Requests\StoreRemotePcRequest;
use App\Http\Requests\UpdateRemotePcRequest;
use App\Models\RemotePc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemotePcController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('remote_pc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remotePcs = RemotePc::with(['created_by'])->get();

        return view('admin.remotePcs.index', compact('remotePcs'));
    }

    public function create()
    {
        abort_if(Gate::denies('remote_pc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.remotePcs.create');
    }

    public function store(StoreRemotePcRequest $request)
    {
        $remotePc = RemotePc::create($request->all());

        return redirect()->route('admin.remote-pcs.index');
    }

    public function edit(RemotePc $remotePc)
    {
        abort_if(Gate::denies('remote_pc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remotePc->load('created_by');

        return view('admin.remotePcs.edit', compact('remotePc'));
    }

    public function update(UpdateRemotePcRequest $request, RemotePc $remotePc)
    {
        $remotePc->update($request->all());

        return redirect()->route('admin.remote-pcs.index');
    }

    public function show(RemotePc $remotePc)
    {
        abort_if(Gate::denies('remote_pc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remotePc->load('created_by');

        return view('admin.remotePcs.show', compact('remotePc'));
    }

    public function destroy(RemotePc $remotePc)
    {
        abort_if(Gate::denies('remote_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remotePc->delete();

        return back();
    }

    public function massDestroy(MassDestroyRemotePcRequest $request)
    {
        RemotePc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
