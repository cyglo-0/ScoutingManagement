<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Scout System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f0; }
        .btn-olive { background-color: #556B2F; color: #fff; }
        .btn-olive:hover { background-color: #3B4B20; color: #fff; }
        a.olive-link { color: #556B2F; text-decoration: none; }
        a.olive-link:hover { text-decoration: underline; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center my-5">

<div class="card shadow-sm p-4 border-0" style="width: 100%; max-width: 480px; border-radius: 10px;">
    <div class="card-body">
        <h4 class="fw-bold text-center mb-1">Scout System</h4>
        <p class="text-muted small text-center mb-4">Create your account</p>

        @if ($errors->any())
            <div class="alert alert-danger small py-2 mb-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label small fw-semibold text-secondary">FULL NAME</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Age & Phone Number -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="age" class="form-label small fw-semibold text-secondary">AGE</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required>
                </div>
                <div class="col-md-8">
                    <label for="phone_number" class="form-label small fw-semibold text-secondary">PHONE NUMBER</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" placeholder="09123456789" required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold text-secondary">EMAIL ADDRESS</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- School Dropdown -->
            <div class="mb-3">
                <label for="school" class="form-label small fw-semibold text-secondary">SCHOOL</label>
                <select name="school" id="school" class="form-select" required>
                    <option value="">-- Select School --</option>
                    <option value="Kalayaan High School" {{ old('school') == 'Kalayaan High School' ? 'selected' : '' }}>Kalayaan High School</option>
                    <option value="Pasay City South High School" {{ old('school') == 'Pasay City South High School' ? 'selected' : '' }}>Pasay City South High School</option>
                    <option value="Pasay City National High School" {{ old('school') == 'Pasay City National High School' ? 'selected' : '' }}>Pasay City National High School</option>
                    <option value="Pasay City West High School" {{ old('school') == 'Pasay City West High School' ? 'selected' : '' }}>Pasay City West High School</option>
                    <option value="Pasay City National Science High School" {{ old('school') == 'Pasay City National Science High School' ? 'selected' : '' }}>Pasay City National Science High School</option>
                    <option value="President Corazon “Cory” C. Aquino National High School" {{ old('school') == 'President Corazon “Cory” C. Aquino National High School' ? 'selected' : '' }}>President Corazon “Cory” C. Aquino National High School</option>
                    <option value="Pasay City North High School – M. Dela Cruz Campus" {{ old('school') == 'Pasay City North High School – M. Dela Cruz Campus' ? 'selected' : '' }}>Pasay City North High School – M. Dela Cruz Campus</option>
                    <option value="Pasay City East High School" {{ old('school') == 'Pasay City East High School' ? 'selected' : '' }}>Pasay City East High School</option>
                </select>
            </div>

            <!-- Gender & Birthday -->
            <div class="row mb-3">
                <div class="col-md-5">
                    <label for="gender" class="form-label small fw-semibold text-secondary">GENDER</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-7">
                    <label for="birthday" class="form-label small fw-semibold text-secondary">BIRTHDAY</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}" required>
                </div>
            </div>

            <!-- Role Dropdown -->
            <div class="mb-3">
                <label for="role" class="form-label small fw-semibold text-secondary">ACCOUNT ROLE</label>
                <select name="role" id="role" class="form-select" required onchange="toggleRankDropdown()">
                    <option value="senior_scout" {{ old('role') == 'senior_scout' ? 'selected' : '' }}>Senior Scout</option>
                    <option value="scout_leader" {{ old('role') == 'scout_leader' ? 'selected' : '' }}>Scout Leader</option>
                </select>
            </div>

            <!-- Rank Dropdown (Senior Scout) -->
            <div class="mb-3" id="senior_scout_rank_group">
                <label for="senior_rank" class="form-label small fw-semibold text-secondary">RANK <span class="text-muted fw-normal">(Optional)</span></label>
                <select name="rank" id="senior_rank" class="form-select rank-input">
                    <option value="">-- Select Rank --</option>
                    <option value="Membership">Membership</option>
                    <option value="Explorer">Explorer</option>
                    <option value="Pathfinder">Pathfinder</option>
                    <option value="Outdoorsman">Outdoorsman</option>
                    <option value="Venturer (Airman)">Venturer (Airman)</option>
                    <option value="Venturer (Seaman)">Venturer (Seaman)</option>
                    <option value="Eagle">Eagle</option>
                </select>
            </div>

            <!-- Rank Dropdown (Scout Leader) -->
            <div class="mb-3 d-none" id="leader_rank_group">
                <label for="leader_rank" class="form-label small fw-semibold text-secondary">RANK <span class="text-muted fw-normal">(Optional)</span></label>
                <select name="rank" id="leader_rank" class="form-select rank-input" disabled>
                    <option value="">-- Select Rank --</option>
                    <option value="Scoutmaster">Scoutmaster</option>
                    <option value="Assistant Scoutmaster">Assistant Scoutmaster</option>
                    <option value="Wood Badge Holder">Wood Badge Holder</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold text-secondary">PASSWORD</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="form-label small fw-semibold text-secondary">CONFIRM PASSWORD</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-olive w-100 py-2">Create Account</button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            Already have an account? <a href="{{ route('login') }}" class="olive-link">Sign in</a>
        </p>
    </div>
</div>

<script>
    function toggleRankDropdown() {
        const role = document.getElementById('role').value;
        const seniorGroup = document.getElementById('senior_scout_rank_group');
        const leaderGroup = document.getElementById('leader_rank_group');
        const seniorRank = document.getElementById('senior_rank');
        const leaderRank = document.getElementById('leader_rank');

        if (role === 'scout_leader') {
            seniorGroup.classList.add('d-none');
            seniorRank.disabled = true;

            leaderGroup.classList.remove('d-none');
            leaderRank.disabled = false;
        } else {
            leaderGroup.classList.add('d-none');
            leaderRank.disabled = true;

            seniorGroup.classList.remove('d-none');
            seniorRank.disabled = false;
        }
    }

    // Initialize state on load
    document.addEventListener('DOMContentLoaded', toggleRankDropdown);
</script>

</body>
</html>