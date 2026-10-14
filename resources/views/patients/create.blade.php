@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')

<div class="card">
    <h1 style="color: #176b4d;">Add New Patient</h1>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <label for="first_name">First Name *</label>
        <input
            type="text"
            id="first_name"
            name="first_name"
            value="{{ old('first_name') }}"
            required
        >
        @error('first_name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="last_name">Last Name *</label>
        <input
            type="text"
            id="last_name"
            name="last_name"
            value="{{ old('last_name') }}"
            required
        >
        @error('last_name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="date_of_birth">Date of Birth</label>
        <input
            type="date"
            id="date_of_birth"
            name="date_of_birth"
            value="{{ old('date_of_birth') }}"
        >
        @error('date_of_birth')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="phone">Phone Number</label>
        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone') }}"
        >
        @error('phone')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="address">Address</label>
        <textarea id="address" name="address" rows="4">{{ old('address') }}</textarea>
        @error('address')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn primary">Save Patient</button>

        <a href="{{ route('patients.index') }}" class="btn secondary">
            Cancel
        </a>
    </form>
</div>

@endsection