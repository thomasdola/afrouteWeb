@if ($errors->has($field))
    <span class="text-danger">*The {{ ucfirst($field) }} is required</span>
@endif