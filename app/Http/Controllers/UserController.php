<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->userService->paginate(10, $request->all());

        return view('pages.app.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('pages.app.users.create');
    }

    public function profile(User $user)
    {
        return view('pages.app.users.profile.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        return $this->userService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('pages.app.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.app.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return $this->userService->update($user->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function blockOrUnblock(User $user)
    {
        return $this->userService->blockOrUnblock($user);
    }

}
