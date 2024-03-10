@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Attendance List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 shadow-sm">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Student</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $attendance->attendance_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $attendance->student->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $attendance->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('attendance.edit.form', ['date' => $attendance->attendance_date]) }}" class="text-blue-500">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
