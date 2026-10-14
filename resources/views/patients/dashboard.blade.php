@extends('layouts.app')

@section('content')
<style>
    .dashboard {
        max-width: 1100px;
        margin: 0 auto;
        padding: 25px;
        color: #26352d;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .dashboard-header h1 {
        font-size: 27px;
        font-weight: 700;
        margin: 0 0 5px;
    }

    .dashboard-header p {
        color: #718078;
        margin: 0;
    }

    .add-button {
        background: #198754;
        color: white;
        text-decoration: none;
        padding: 11px 17px;
        border-radius: 7px;
        font-weight: 600;
    }

    .add-button:hover {
        background: #146c43;
        color: white;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: white;
        border: 1px solid #e5ebe6;
        border-radius: 12px;
        padding: 22px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .03);
    }

    .stat-card p {
        color: #718078;
        margin: 0 0 12px;
        font-size: 14px;
    }

    .stat-card h2 {
        font-size: 30px;
        font-weight: 700;
        margin: 0;
        color: #198754;
    }

    .section-card {
        background: white;
        border: 1px solid #e5ebe6;
        border-radius: 12px;
        overflow: hidden;
    }

    .section-header {
        padding: 20px;
        border-bottom: 1px solid #e5ebe6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .section-header h2 {
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .section-header a {
        color: #198754;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .patient-table {
        width: 100%;
        border-collapse: collapse;
    }

    .patient-table th,
    .patient-table td {
        padding: 15px 20px;
        text-align: left;
        border-bottom: 1px solid #edf1ed;
        white-space: nowrap;
    }

    .patient-table th {
        background: #f7faf8;
        color: #637168;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .patient-table td {
        font-size: 14px;
    }

    .patient-table tr:last-child td {
        border-bottom: none;
    }

    .empty-state {
        text-align: center;
        padding: 35px 15px;
        color: #718078;
    }

    @media (max-width: 700px) {
        .dashboard {
            padding: 15px;
        }

        .stats {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .dashboard-header h1 {
            font-size: 23px;
        }
    }
</style>

<div class="dashboard">

    <div class="dashboard-header">
        <div>
            <h1>Clinic Dashboard</h1>
            <p>Welcome back! Here is your clinic overview.</p>
        </div>

        <a href="{{ route('patients.create') }}" class="add-button">
            + Add Patient
        </a>
    </div>

    <div class="stats">
        <div class="stat-card">
            <p>Total Patients</p>
            <h2>{{ $totalPatients }}</h2>
        </div>

        <div class="stat-card">
            <p>Male Patients</p>
            <h2>{{ $malePatients }}</h2>
        </div>

        <div class="stat-card">
            <p>Female Patients</p>
            <h2>{{ $femalePatients }}</h2>
        </div>
    </div>

    <div class="section-card">
        <div class="section-header">
            <h2>Recent Patients</h2>

            <a href="{{ route('patients.index') }}">
                View All Patients &rarr;
            </a>
        </div>

        <div class="table-responsive">
            <table class="patient-table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Gender</th>
                        <th>Registered</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($recentPatients as $patient)
                        <tr>
                            <td>
                               {{ $patient->first_name }} {{ $patient->last_name }}
                            </td>

                            <td>
                                {{ $patient->gender }}
                            </td>

                            <td>
                                {{ $patient->created_at
                                    ? $patient->created_at->format('M d, Y')
                                    : 'N/A' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="empty-state">
                                No patients registered yet.
                                <br><br>
                                <a href="{{ route('patients.create') }}">
                                    Add your first patient
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection