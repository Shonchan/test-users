<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserIndexRequest $request): JsonResponse
    {
        $name = $request->validated('name');
        return (new JsonResponse(User::ofName($name)->get()));
    }

    /**
     * creating a new resource.
     */
    public function create(UserCreateRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $user = new User($validated);
        $user->save();

        return (new JsonResponse($user));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        return (new JsonResponse($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id): JsonResponse
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $validated = $request->validated();

        $user->update($validated);

        return (new JsonResponse($user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $user->delete();

        return (new JsonResponse([
            'success' => true,
            'message' => "User with id {$id} deleted",
        ]));
    }
}
