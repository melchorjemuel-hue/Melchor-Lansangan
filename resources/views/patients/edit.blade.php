@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')

<style>
    .edit-card {
        max-width: 650px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px #0000000d;
    }

    .edit-card h1 {
        color: #176b4d;
    }

    .edit-card label {
        display: block;
        margin-top: 14px;
        font-weight: bold;
    }

    .edit-card input,
    .edit-card select,
    .edit-card textarea {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border: 1px solid #ccd5cf;
        border-radius: 5px;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        border: 0;
        border-radius: 5px;
        background: #176b4d;
        color: white;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
    }

    .cancel-btn {
        background: #64748b;
    }

    .error {
        color: #b42318;
    }

    .error-summary {
        padding: 10px 15px;
        background: #fee2e2;
        border-radius: 5px;
    }
</style>

<div class="edit-card">
    <h1>Edit Patient</h1>
    <p>Update the patient's information below.</p>

    @if ($errors->any())
        <div class="error error-summary">
            <strong>Please correct the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="first_name">First Name *</label>
        <input
            type="text"
            id="first_name"
            name="first_name"
            value="{{ old('first_name', $patient->first_name) }}"
            required
            maxlength="100"
        >

        <label for="last_name">Last Name *</label>
        <input
            type="text"
            id="last_name"
            name="last_name"
            value="{{ old('last_name', $patient->last_name) }}"
            required
            maxlength="100"
        >

        <label for="date_of_birth">Date of Birth</label>
        <input
            type="date"
            id="date_of_birth"
            name="date_of_birth"
            value="{{ old('date_of_birth', $patient->date_of_birth ? \Illuminate\Support\Carbon::parse($patient->date_of_birth)->format('Y-m-d') : '') }}"
        >

        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="">Select gender</option>

            @foreach (['Male', 'Female', 'Other'] as $gender)
                <option
                    value="{{ $gender }}"
                    @selected(old('gender', $patient->gender) === $gender)
                >
                    {{ $gender }}
                </option>
            @endforeach
        </select>

        <label for="phone">Phone Number</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone', $patient->phone) }}"
            maxlength="20"
        >

        <label for="address">Address</label>
        <textarea
            id="address"
            name="address"
            rows="3"
            maxlength="1000"
        >{{ old('address', $patient->address) }}</textarea>

        <button type="submit" class="btn">Update Patient</button>

        <a class="btn cancel-btn" href="{{ route('patients.index') }}">
            Cancel
        </a>
    </form>
</div>

@endsection