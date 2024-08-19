@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        
        <div class="flex space-x-4">
            <a href="{{ route('peoples.index') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-lg shadow hover:from-orange-600 hover:to-orange-700 transition-transform transform hover:scale-105">Tree</a>
            <a href="{{ route('peoples.create') }}" class="bg-gradient-to-r from-cyan-500 to-cyan-600 text-white px-4 py-2 rounded-lg shadow hover:from-cyan-600 hover:to-cyan-700 transition-transform transform hover:scale-105">Add User</a>
            <a href="{{ route('peoples.search') }}" class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-4 py-2 rounded-lg shadow hover:from-gray-600 hover:to-gray-700 transition-transform transform hover:scale-105">Search Peoples</a>
            <a href="{{ route('countries.index') }}" class="bg-gradient-to-r from-blue-600 to-gray-600 text-white px-4 py-2 rounded-lg shadow hover:from-gray-600 hover:to-gray-700 transition-transform transform hover:scale-105">Manage Countries</a>

            @if(Auth::user()->is_admin)
                <a href="/admin" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-lg shadow hover:from-green-600 hover:to-green-700 transition-transform transform hover:scale-105">Admin Panel</a>
            @endif 
        </div>
       
        
        <table class="min-w-full bg-white shadow-md rounded my-6">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($users as $admin)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $admin->id }}</td>
                        <td class="py-3 px-6 text-left">{{ $admin->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $admin->email }}</td>
                        <td class="py-3 px-6 text-left bg-blue-300">
                            <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" class="inline font-bold text-xl ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
