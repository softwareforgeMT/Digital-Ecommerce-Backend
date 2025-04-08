<div class="col-xxl-4 col-md-4">
    <div>
        <label for="basiInput" class="form-label"> Name</label>
        <input type="text" class="form-control" id="basiInput" name="name" value="{{ isset($data->name) ? $data->name : '' }}" required>
    </div>
</div>

<div class="col-xxl-4 col-md-4">
    <div>
        <label for="basiInput2" class="form-label"> Price</label>
        <input type="number" name="price" step="0.001" class="form-control" id="basiInput2" value="{{ isset($data->price) ? $data->price : '' }}" required>
    </div>
</div>

<div class="col-xxl-4 col-md-4">
    <div>
        <label for="basiInput2" class="form-label"> Time Interval</label>
        <select class="form-select" name="interval" required>
            <option value=""> Select Interval</option>
            <option value="weekly" {{ isset($data->interval) && $data->interval == 'weekly' ? 'selected' : '' }}>Weekly</option>
            <option value="monthly" {{ isset($data->interval) && $data->interval == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="quarterly" {{ isset($data->interval) && $data->interval == 'quarterly' ? 'selected' : '' }}>3 Months</option>
            <option value="biannually" {{ isset($data->interval) && $data->interval == 'biannually' ? 'selected' : '' }}>6 Months</option>
            <option value="yearly" {{ isset($data->interval) && $data->interval == 'yearly' ? 'selected' : '' }}>Yearly</option>
            <option value="unlimited" {{ isset($data->interval) && $data->interval == 'unlimited' ? 'selected' : '' }}>Unlimited</option>
        </select>
    </div>
</div>

<div class="col-xxl-3 col-md-12">
    <div>
        <label for="exampleFormControlTextarea5" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea5" name="details" rows="3">{{ isset($data->details) ? $data->details : '' }}</textarea>
    </div>
</div>
