<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $users = User::with(['organizationalUnit'])->get();

        $users->transform(function ($user) {
            // Check if the user has roles; if not, set a default role
            if ($user->roles->isEmpty()) {
                $user->roleNames = collect(['Subjekt']); // Setting a default role as 'subject'
            } else {
                $user->roleNames = $user->getRoleNames(); // This will add a roleNames attribute to your user object.
            }
            return $user;
        });

        return response()->json($users);
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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'exists:roles,name'], // Ensure the role exists
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role); // Assign the role to the user

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

        // Authorization check remains the same

        $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['sometimes', 'string', 'exists:roles,name'], // Validate role if provided
        ]);

        $user->update($request->only('name', 'email', 'organizational_unit_id'));

        if ($request->has('role')) {
            $user->syncRoles($request->role); // Sync roles in case a new role is provided
        }

        return response()->json($user);
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
