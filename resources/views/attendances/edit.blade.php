

@extends('layouts.app')

@section('content')
    <h1>Edit Attendance</h1>

    <form action="{{ route('attendance.update', ['attendance_date' => $date]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="attendance_date">Select Date:</label>
        <input type="date" name="attendance_date" value="{{ $date }}" required>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll Number</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->roll_number }}</td>
                        <td>
                            <select name="attendance[{{ $student->id }}]">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Update Attendance</button>
    </form>
@endsection
