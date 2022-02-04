<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    @if(isset($user->email))
        <input type="hidden" name="user_id" value="{{ $user->id }}">
    @endif
</div>
<div class="form-group">
    <label>Password:</label>
    <input type="password" class="form-control" name="password" {{ isset($user->password) ? '' : 'required' }}>
    @error('password')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <br/>
    <label>Role:</label>
    <select id="single-selection" name="role_id" class="multiselect multiselect-custom">
        @foreach($roles as $role)
            <option value="{{ $role->id }}"
                {{ ($role->id  == old('role_id', isset($user->id) ? $user->role->id : '')) ? 'selected' : '' }}>
                {{ $role->name }}</option>
        @endforeach
    </select>
    @error('role_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

