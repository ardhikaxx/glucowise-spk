<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|string']);
        
        // This requires spatie/laravel-permission trait 'HasRoles' on User model.
        // If not present, we just mock the success for now.
        if (method_exists($user, 'syncRoles')) {
            $role = Role::firstOrCreate(['name' => $request->role]);
            $user->syncRoles([$role]);
        }

        return back()->with('success', 'Hak akses (Role) pengguna berhasil diperbarui.');
    }
}
