<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query
        $query = User::role('masyarakat');

        // Tambahkan filter
        if ($request->filter == 'today') {
            $query->whereDate('created_at', today());
        } elseif ($request->filter == 'week') {
            $query->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ]);
        } elseif ($request->filter == 'month') {
            $query->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        }

        // Ambil data dengan pagination
        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole('masyarakat');

        return redirect()->route('users.index')->with('success', 'User masyarakat berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index')->with('success', 'Data user diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User dihapus.');
    }
}
