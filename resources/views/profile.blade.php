@extends('template.profile-template')

@section('right-content')
    <div class="mb-4">
        <h4><b>{{ $user->fullname }} Profile</b></h4>
        <p class="text-muted">This information will be displayed publicly, so be careful what you share.</p>
    </div>
    <div>
        <div class="d-flex flex-row">
            <div class="form-group w-75">
                <label for="inputUsername"> <b> Username</b></label>
                <input type="text" name="username" class="form-control-plaintext" value="{{ $user->username }}" placeholder="Fullname" disabled>
            </div>
            @member
            <div class="form-group">
                <label for="inputLevel"><b>Level</b></label>
                <input type="text" name="username" class="form-control-plaintext" value="{{ $user->level }}" placeholder="Fullname" disabled>
            </div>
            @endmember
            <div class="form-group" style="width: 80px;height:80px">
                <label for="inputPhoto"><b>Photo</b></label>
                <img class="rounded-circle" style="width: 80px;height:80px;overflow: hidden;"src="{{ asset("img/user_profile/".$user->profile_picture) }}">
            </div>
        </div>
        <form action="/profile" method="POST">
        <div class="form-group">
            <label for="inputFullname"><b>Full Name</b></label>
            <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control" placeholder="fullname">
        </div>
        <div class="form-group">
            <label for="inputPhoto"><b>Change Photo</b></label>
            <input type="file" name="profile_picture" class="form-control" placeholder="Fullname">
        </div>
        <div class="form-group">
            <label for="inputPassword"><b>Current Password</b></label>
            <input type="password" name="password" class="form-control" placeholder="Fullname">
            <p class="text-muted">Fill out this field if you are authorized</p>
        </div>
        <div class="form-group">
            <label for="inputPassword"><b>New Password</b></label>
            <input type="password" name="new_password" class="form-control"  placeholder="New Password">
            <p class="text-muted">Only if you want to change your password.</p>
        </div>
        <div class="form-group">
            <label for="inputPassword"><b>Confirm New Password</b></label>
            <input type="password" name="confirm_new_password" class="form-control"  placeholder="New Password">
            <p class="text-muted">Only if you want to change your password.</p>
        </div>
        <button type="submit" class="btn btn-dark">Update Profile</button>
    </form>
    </div>    
@endsection