<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRealPcRequest;
use App\Http\Requests\StoreRealPcRequest;
use App\Http\Requests\UpdateRealPcRequest;
use App\Models\RealPc;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RealPcController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('real_pc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realPcs = RealPc::with(['user', 'created_by'])->get();

        return view('admin.realPcs.index', compact('realPcs'));
    }

    public function create()
    {
        abort_if(Gate::denies('real_pc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.realPcs.create', compact('users'));
    }

    public function store(StoreRealPcRequest $request)
    {
        $realPc = RealPc::create($request->all());

        return redirect()->route('admin.real-pcs.index');
    }

    public function edit(RealPc $realPc)
    {
        abort_if(Gate::denies('real_pc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $realPc->load('user', 'created_by');

        return view('admin.realPcs.edit', compact('realPc', 'users'));
    }

    public function update(UpdateRealPcRequest $request, RealPc $realPc)
    {
        $realPc->update($request->all());

        return redirect()->route('admin.real-pcs.index');
    }

    public function show(RealPc $realPc)
    {
        abort_if(Gate::denies('real_pc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realPc->load('user', 'created_by');

        return view('admin.realPcs.show', compact('realPc'));
    }

    public function destroy(RealPc $realPc)
    {
        abort_if(Gate::denies('real_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realPc->delete();

        return back();
    }

    public function massDestroy(MassDestroyRealPcRequest $request)
    {
        RealPc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
