<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    use ApiResponser;

    /**
     * Show the users list
     * @return JsonResponse
     */
    public function index()
    {
        return $this->validResponse(User::all());
    }

    /**
     * Show a single user
     * @param string $user
     * @return JsonResponse
     */
    public function show($user)
    {
        return $this->validResponse(User::findOrFail($user));
    }

    /**
     * Create a new User
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);
        $newUser = User::create($validatedData);

        return $this->validResponse($newUser, Response::HTTP_CREATED);
    }

    /**
     * Update the data of a given User
     * @param Request $request
     * @param string $user
     * @return JsonResponse
     */
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);
        $validatedData = $this->validateRequest($request, $user);

        $user->update($validatedData);

        return $this->validResponse($user);
    }

    /**
     * Delete a given User
     * @param string $user
     * @return JsonResponse
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return $this->validResponse(null,Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateRequest(Request $request, $user=null): array
    {
        $uniqueEmailRule = empty($user) ? 'unique:users,email' : Rule::unique('users')->ignore($user);

        $validatedData = $this->validate($request, [
            'name' => ['max:255',Rule::requiredIf( empty($user) )],
            'email' => ['email', $uniqueEmailRule ,Rule::requiredIf( empty($user) )],
            'password' => ['min:8','confirmed',Rule::requiredIf( empty($user) )]
        ]);

        return $validatedData;
    }

}
