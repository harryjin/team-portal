<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkypeRequest;
use App\Http\Requests\UpdateSkypeRequest;
use App\Http\Resources\Admin\SkypeResource;
use App\Models\Skype;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkypeResource(Skype::with(['created_by'])->get());
    }

    public function store(StoreSkypeRequest $request)
    {
        $skype = Skype::create($request->all());

        return (new SkypeResource($skype))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Skype $skype)
    {
        abort_if(Gate::denies('skype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkypeResource($skype->load(['created_by']));
    }

    public function update(UpdateSkypeRequest $request, Skype $skype)
    {
        $skype->update($request->all());

        return (new SkypeResource($skype))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Skype $skype)
    {
        abort_if(Gate::denies('skype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skype->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
