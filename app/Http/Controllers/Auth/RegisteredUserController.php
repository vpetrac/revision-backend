<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;


class RegisteredUserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all users with their organizationalUnit and roles eagerly loaded
        $users = User::with(['organizationalUnit', 'roles'])->get();

        // Wrap the users collection with the UserResource, which formats each user
        return UserResource::collection($users)->response();
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                Rules\Password::min(10)  // Minimum 10 characters
                    ->mixedCase()  // Must contain at least one uppercase and one lowercase letter
                    ->numbers()    // Must contain at least one number
                    ->symbols()    // Must contain at least one special character
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }

    public function storeOnly(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                Rules\Password::min(10)  // Minimum 10 characters
                    ->mixedCase()  // Must contain at least one uppercase and one lowercase letter
                    ->numbers()    // Must contain at least one number
                    ->symbols()    // Must contain at least one special character
            ],
            'organizational_unit_id' => ['nullable', 'exists:organizational_units,id'],
            'role' => ['nullable', 'exists:roles,name'], // Validate the role_id exists
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'organizational_unit_id' => $request->organizational_unit_id,
        ]);

        // Find the role by ID and assign it to the user
        $role = Role::findByName($request->role, 'web');

        $user->assignRole($role);

        event(new Registered($user));

        return response()->noContent();
    }

    /**
     * Update the specified user's information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => [
                'nullable', 'string',
                Rules\Password::min(10)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'organizational_unit_id' => ['sometimes', 'required', 'exists:organizational_units,id'],
            'role' => ['sometimes', 'required', 'exists:roles,name'],
        ]);

        $dataToUpdate = $request->only('name', 'email', 'organizational_unit_id');

        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }

        $user->update($dataToUpdate);

        if ($request->has('role')) {
            $role = Role::findByName($request->role, 'web');
            $user->syncRoles($role);
        }

        return response()->json($user);
    }

    /**
     * Update the authenticated user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'password' => [
                'required', 'string',
                Rules\Password::min(10)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        $user = Auth::user(); // Get the authenticated user

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->noContent();
    }


    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deletion if the user has 'superadmin' role and is the last one
        if ($user->hasRole('superadmin') && User::role('superadmin')->count() <= 1) {
            return response()->json(['message' => 'Cannot delete the last superadmin'], 403);
        }

        // Authorization check remains the same

        $user->delete();

        return response()->noContent();
    }

    /**
     * Display a listing of all roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        $roles = Role::all(); // Fetch all roles
        return response()->json($roles);
    }
}
