
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4" >Date-wise Attendance Report</h1>

    <form action="{{ route('attendance.datewise.report') }}" method="post" class="mb-4">
        @csrf
        <div class="flex items-center">
        <label for="date" class="mr-2" >Select Date:</label>
        <input type="date" name="date" class="border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline">Generate Report</button>
        </div>
    </form>

    @isset($attendances)
        <h2 class="text-2xl font-bold mb-4">Attendance for {{ $date }}</h2>
        <table class="min-w-full bg-white border border-gray-300 shadow-sm">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Roll Number</th>
                    <th class="py-2 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $attendance->student->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $attendance->student->roll_number }}</td>
                        <td class="py-2 px-4 border-b">{{ $attendance->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endsection
