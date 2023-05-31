<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealPcRequest;
use App\Http\Requests\UpdateRealPcRequest;
use App\Http\Resources\Admin\RealPcResource;
use App\Models\RealPc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RealPcApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('real_pc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RealPcResource(RealPc::with(['created_by'])->get());
    }

    public function store(StoreRealPcRequest $request)
    {
        $realPc = RealPc::create($request->all());

        return (new RealPcResource($realPc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RealPc $realPc)
    {
        abort_if(Gate::denies('real_pc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RealPcResource($realPc->load(['created_by']));
    }

    public function update(UpdateRealPcRequest $request, RealPc $realPc)
    {
        $realPc->update($request->all());

        return (new RealPcResource($realPc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RealPc $realPc)
    {
        abort_if(Gate::denies('real_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $realPc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
