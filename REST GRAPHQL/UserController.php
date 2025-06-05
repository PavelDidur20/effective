<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all(['id', 'name', 'created_at', 'updated_at']);
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id, ['id', 'name', 'created_at', 'updated_at']);
        if (! $user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password'=> bcrypt($request->input('password')),
            'role'=> $request->input('role'),
        ]);


        return response()->json([
            'message' => 'Пользователь добавлен',
            'user' => $user,
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        if (! $user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->name = $request->input('name');
        $user->save();

        return response()->json([
            'message' => 'Данные пользователя обновлены',
            'user' => $user,
        ]);
    }

   
    public function destroy($id)
    {
        $user = User::find($id);
        if (! $user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Пользователь удален']);
    }
}
