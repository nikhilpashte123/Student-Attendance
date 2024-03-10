
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Mark Attendance</h1>

    <a href="{{route('attendance.datewise.report')}}" class="text-yellow-500 hover:underline mb-4 block">Check datewise report</a>

    <a href="{{route('attendance.index')}}" class="text-yellow-500 hover:underline mb-4 block">Check Attendence List</a>

    <form method="POST" action="{{ route('markAttendance') }}" class="max-w-md bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <label for="attendance_date" class="block text-gray-700 text-sm font-bold mb-2">Attendance Date:</label>
        <input type="date" name="attendance_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>

        <table class="w-full mb-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Student</th>
                    <th class="py-2 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                        <td class="py-2 px-4 border-b">
                            <select name="attendance[{{ $student->id }}]" class="block w-full bg-white border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit Attendance</button>
    </form>
@endsection
