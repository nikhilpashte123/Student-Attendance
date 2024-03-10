
@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Roll Number:</strong> {{ $student->roll_number }}</p>

    <a href="{{ route('students.edit', $student->id) }}">Edit</a>

    <form action="{{ route('students.destroy', $student->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this student?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
    <a href="{{ route('students.index') }}">Back to Students List</a>
@endsection

