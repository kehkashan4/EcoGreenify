@extends('admin.main')

@section('content')

<script src="{{ asset('js/jquery.min.js') }}"></script>

<div class="container">
    <h2>Location Management</h2>

    <div class="mb-3">
        <label for="province">Select Province:</label>
        <select id="province" class="form-control">
            <option value="">Choose Province</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="city">Select City:</label>
        <select id="city" class="form-control">
            <option value="">Choose City</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="town">Select Town:</label>
        <select id="town" class="form-control">
            <option value="">Choose Town</option>
        </select>
    </div>
</div>

<script>
$(document).ready(function() {

    // When Province changes, load its Cities
    $('#province').change(function() {
        var provinceId = $(this).val();
        $('#city').html('<option value="">Loading Cities...</option>');
        $('#town').html('<option value="">Choose Town</option>'); // Clear towns as well

        if (provinceId) {
            $.ajax({
                url: '/admin/locations/get-cities/' + provinceId,
                type: 'GET',
                success: function(cities) {
                    $('#city').html('<option value="">Choose City</option>');
                    $.each(cities, function(index, city) {
                        $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            });
        } else {
            $('#city').html('<option value="">Choose City</option>');
            $('#town').html('<option value="">Choose Town</option>');
        }
    });

    // When City changes, load its Towns
    $('#city').change(function() {
        var cityId = $(this).val();
        $('#town').html('<option value="">Loading Towns...</option>');

        if (cityId) {
            $.ajax({
                url: '/admin/locations/get-towns/' + cityId,
                type: 'GET',
                success: function(towns) {
                    $('#town').html('<option value="">Choose Town</option>');
                    $.each(towns, function(index, town) {
                        $('#town').append('<option value="' + town.id + '">' + town.name + '</option>');
                    });
                }
            });
        } else {
            $('#town').html('<option value="">Choose Town</option>');
        }
    });

});
</script>

@endsection
