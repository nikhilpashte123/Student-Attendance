
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Create Student</h1>

    <form action="{{ route('students.store') }}" method="post" class="max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input type="text" name="name" 
        class="shadow appearance-none border rounded 
        w-full py-2 px-3 text-gray-700 leading-tight 
        focus:outline-none focus:shadow-outline" required>
        <label for="roll_number" 
        class="block text-gray-700 text-sm font-bold mb-2">Roll Number:</label>
        <input type="text" name="roll_number" 
        class="shadow appearance-none border 
        rounded w-full py-2 px-3 text-gray-700 
        leading-tight focus:outline-none focus:shadow-outline" required>
        <button type="submit" 
        class="bg-blue-500 hover:bg-blue-700 text-white 
        font-bold py-2 px-4 rounded focus:outline-none 
        focus:shadow-outline">Create Student</button>
    </form>
@endsection
