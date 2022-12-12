<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRemotePcRequest;
use App\Http\Requests\UpdateRemotePcRequest;
use App\Http\Resources\Admin\RemotePcResource;
use App\Models\RemotePc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemotePcApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('remote_pc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RemotePcResource(RemotePc::all());
    }

    public function store(StoreRemotePcRequest $request)
    {
        $remotePc = RemotePc::create($request->all());

        return (new RemotePcResource($remotePc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RemotePc $remotePc)
    {
        abort_if(Gate::denies('remote_pc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RemotePcResource($remotePc);
    }

    public function update(UpdateRemotePcRequest $request, RemotePc $remotePc)
    {
        $remotePc->update($request->all());

        return (new RemotePcResource($remotePc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RemotePc $remotePc)
    {
        abort_if(Gate::denies('remote_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $remotePc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
