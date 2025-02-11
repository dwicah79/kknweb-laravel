<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::with('roles')->paginate(10);
        // return $data;
        return view('dashboard.user-management.index', compact('data'));
    }

    public function create()
    {
        $roles = Role::all();

        // return $roles;
        return view('dashboard.user-management.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'roles' => 'required|exists:roles,id'
        ]);

        try {
            DB::beginTransaction();

            // Membuat user dengan hashing password
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]);

            // Assign role ke user
            $role = Role::find($validated['roles']);
            $user->assignRole($role->name);

            DB::commit();

            return redirect()->route('user.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = User::with('roles')->find($id);
        $roles = Role::all();
        // return $data;
        return view('dashboard.user-management.detile', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8',
            'roles' => 'required|exists:roles,id'
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            if (!empty($validated['old_password']) && !empty($validated['new_password'])) {
                if (!Hash::check($validated['old_password'], $user->password)) {
                    return redirect()->back()->with('error', 'Password lama salah!');
                }
                $user->password = Hash::make($validated['new_password']);
            }
            $user->save();
            $role = Role::find($validated['roles']);
            $user->syncRoles([$role->name]);
            DB::commit();
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        try {
            $data = User::find($id);
            $data->delete();

            return redirect()->route('user.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
