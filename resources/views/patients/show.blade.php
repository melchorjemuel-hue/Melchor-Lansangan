@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')

<style>
    .patient-card {
        max-width: 650px;
        margin: 20px auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .patient-card h1 {
        color: #176b4d;
        margin-top: 0;
        margin-bottom: 25px;
    }

    .patient-card dt {
        margin-top: 16px;
        font-weight: bold;
        color: #176b4d;
    }

    .patient-card dd {
        margin: 5px 0 0;
        overflow-wrap: anywhere;
    }

    .patient-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 5px;
        background: #176b4d;
        color: white;
        text-decoration: none;
    }

    .btn:hover {
        background: #10543b;
    }

    .btn-secondary {
        background: #64748b;
    }

    .btn-secondary:hover {
        background: #475569;
    }
</style>

<div class="patient-card">
    <h1>Patient Details</h1>

    <dl>
        <dt>Patient ID</dt>
        <dd>{{ $patient->id }}</dd>

        <dt>First Name</dt>
        <dd>{{ $patient->first_name }}</dd>

        <dt>Last Name</dt>
        <dd>{{ $patient->last_name }}</dd>

        <dt>Date of Birth</dt>
        <dd>{{ $patient->date_of_birth ?? 'Not provided' }}</dd>

        <dt>Gender</dt>
        <dd>{{ $patient->gender ?? 'Not provided' }}</dd>

        <dt>Phone</dt>
        <dd>{{ $patient->phone ?? 'Not provided' }}</dd>

        <dt>Address</dt>
        <dd>{{ $patient->address ?? 'Not provided' }}</dd>
    </dl>

    <div class="patient-actions">
        <a class="btn btn-secondary"
           href="{{ route('patients.index') }}">
            Back to Patients
        </a>

        <a class="btn"
           href="{{ route('patients.edit', $patient) }}">
            Edit Patient
        </a>
    </div>
</div>

@endsection