
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Students List</h1>

    <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Student</a>

    <table class="min-w-full mt-4 bg-white border border-gray-300 shadow-sm">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Roll Number</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $student->roll_number }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('students.edit', $student->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
