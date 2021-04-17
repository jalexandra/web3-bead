<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View|ViewFactory
    {
        return view('user.index', ['users' => User::paginate(10)]);
    }

    public function create(): View|ViewFactory
    {
        return view('user.form');
    }

    public function store(UserRequest $request): Redirector|RedirectResponse
    {
        $user = User::create($request->validated());
        return redirect(route('user.show', [$user]));
    }

    public function show(User $user): ViewFactory|View
    {
        return view('user.show', ['user' => $user]);
    }

    public function edit(User $user): ViewFactory|View
    {
        return view('user.form', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user): Redirector|RedirectResponse
    {
        if($request->has('password')){
            $user->password = Hash::make($request->validated()['password']);
            $user->save();
            $user->refresh();
        }

        $user->update($request->validated());
        return redirect(route('user.show', ['user' => $user]));
    }

    /** @noinspection PhpUnusedParameterInspection : $request is for authentication */
    public function destroy(UserRequest $request, User $user): Redirector|RedirectResponse
    {
        try {
            $user->delete();
            return redirect(route('user.index'));
        } catch (Exception $e) {
            return back()->withErrors(['_' => $e]);
        }
    }

    public function profile(): ViewFactory|View
    {
        /** @noinspection PhpParamsInspection */
        return $this->show(Auth::user());
    }
}
