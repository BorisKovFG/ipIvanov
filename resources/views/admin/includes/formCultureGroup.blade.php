<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $cultureGroup->name) }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


