<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $fertilizer->name) }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Norms:</label>
</div>
<div class="row form-group">
    <div class="col-md-3">
        <input type="text" class="form-control" required name="norm_nitrogen"
               value="{{ old('norm_nitrogen', $fertilizer->norm_nitrogen) }}"
               placeholder="nitrogen:">
        @error('norm_nitrogen')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" required name="norm_phosphorus"
               value="{{ old('norm_phosphorus', $fertilizer->norm_phosphorus) }}"
               placeholder="phosphorus:">
        @error('norm_phosphorus')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control" required name="norm_potassium"
               value="{{ old('norm_potassium', $fertilizer->norm_potassium) }}"
               placeholder="potassium:">
        @error('norm_potassium')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <br/>
    <label>Culture group:</label>
    <select id="single-selection" name="culture_group_id" class="multiselect multiselect-custom">
        @foreach($cultureGroups as $cultureGroup)
            <option value="{{ $cultureGroup->id }}"
                {{ ($cultureGroup->id  == old('culture_group_id', isset($fertilizer->id) ? $fertilizer->cultureGroup->id : '')) ? 'selected' : '' }}>
                {{ $cultureGroup->name }}</option>
        @endforeach
    </select>
    @error('culture_group_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Region:</label>
    <input type="text" class="form-control" name="region" value="{{ old('region', $fertilizer->region) }}" required>
    @error('region')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Price:</label>
    <input type="text" class="form-control" value="{{ old('price', $fertilizer->price) }}" name="price" required>
    @error('price')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="control-label">Description:</label>
    <textarea class="form-control" name="description" placeholder="Description" rows="4">{{ old('description', $fertilizer->description) }}</textarea>
    @error('description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label class="control-label">Purpose:</label>
    <textarea class="form-control" name="purpose" placeholder="Purpose" rows="4">{{ old('purpose', $fertilizer->purpose) }}</textarea>
    @error('purpose')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

