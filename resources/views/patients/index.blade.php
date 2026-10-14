
@extends('layouts.app')

@section('title', 'Patient Records')

@section('content')

<style>
    .records-page {
        padding: 20px;
    }

    .records-page h1 {
        color: #176b4d;
        margin-bottom: 5px;
    }

    .records-page p {
        color: #666;
    }

    .toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin: 20px 0;
    }

    .search-form {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .search-form input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        min-width: 220px;
    }

    .btn {
        display: inline-block;
        padding: 9px 12px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
    }

    .green {
        background: #176b4d;
        color: white;
    }

    .light {
        background: #e0eee7;
        color: #176b4d;
    }

    .red {
        background: #b42318;
        color: white;
    }

    .table-container {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    th {
        background: #f3f7f4;
        color: #176b4d;
    }

    tbody tr:hover {
        background: #f9fbf9;
    }

    .actions {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }

    .actions form {
        margin: 0;
    }

    .message {
        padding: 10px;
        background: #e0eee7;
        color: #176b4d;
        border-radius: 5px;
    }

    .pagination {
        padding: 15px;
    }

    @media (max-width: 600px) {
        .records-page {
            padding: 10px;
        }

        .toolbar,
        .search-form {
            width: 100%;
        }

        .search-form input {
            flex: 1;
            min-width: 0;
            width: 100%;
        }
    }
</style>

<div class="records-page">

    <h1>Patient Records</h1>
    <p>View and manage patient information.</p>

    @if (session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <div class="toolbar">

        <a href="{{ route('patients.create') }}" class="btn green">
            + Add Patient
        </a>

        <form action="{{ route('patients.index') }}"
              method="GET"
              class="search-form">

            <input
                type="text"
                name="search"
                placeholder="Search name or phone..."
                value="{{ $search ?? '' }}"
            >

            <button type="submit" class="btn green">
                Search
            </button>

            <a href="{{ route('patients.index') }}" class="btn light">
                Clear
            </a>
        </form>

    </div>

    <div class="table-container">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>

                        <td>
                            {{ $patient->first_name }}
                            {{ $patient->last_name }}
                        </td>

                        <td>
                            {{ $patient->date_of_birth ?? '—' }}
                        </td>

                        <td>{{ $patient->gender ?? '—' }}</td>

                        <td>{{ $patient->phone ?? '—' }}</td>

                        <td>
                            <div class="actions">

                                <a href="{{ route('patients.show', $patient) }}"
                                   class="btn light">
                                    View
                                </a>

                                <a href="{{ route('patients.edit', $patient) }}"
                                   class="btn green">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('patients.destroy', $patient) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this patient?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn red">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            No patient records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $patients->links() }}
        </div>

    </div>

</div>

@endsection
