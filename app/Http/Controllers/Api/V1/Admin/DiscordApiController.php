<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscordRequest;
use App\Http\Requests\UpdateDiscordRequest;
use App\Http\Resources\Admin\DiscordResource;
use App\Models\Discord;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiscordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discord_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscordResource(Discord::all());
    }

    public function store(StoreDiscordRequest $request)
    {
        $discord = Discord::create($request->all());

        return (new DiscordResource($discord))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Discord $discord)
    {
        abort_if(Gate::denies('discord_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscordResource($discord);
    }

    public function update(UpdateDiscordRequest $request, Discord $discord)
    {
        $discord->update($request->all());

        return (new DiscordResource($discord))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Discord $discord)
    {
        abort_if(Gate::denies('discord_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discord->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
