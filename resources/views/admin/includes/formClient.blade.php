<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}" required>
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Agreement date:</label>
    <div class="input-group date" data-date-autoclose="true" data-provide="datepicker">
        <input type="text" class="form-control" name="agreement_date"
               value="{{ old('agreement_date', $client->agreement_date) }}" required>
        <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
    </div>
    @error('agreement_date')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Delivery cost:</label>
    <input type="text" class="form-control" name="delivery_cost" value="{{ old('delivery_cost', $client->delivery_cost) }}" required>
    @error('delivery_cost')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Region:</label>
    <input type="text" class="form-control" name="region" value="{{ old('region', $client->region) }}" required>
    @error('region')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

