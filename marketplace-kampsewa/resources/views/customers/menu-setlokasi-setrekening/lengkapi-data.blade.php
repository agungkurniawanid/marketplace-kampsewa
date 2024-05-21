@extends('layouts.customers.layouts-customer')

@section('customer-content')
<p id="address"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var apiKey = 'K7aMX-vHOPBTuPRGqrC_90VPENHwuPk7GjKu4hz3WAo';

        // Get user's IP address
        $.get('https://ipapi.co/json/', function(response) {
            var latitude = response.latitude;
            var longitude = response.longitude;

            // Reverse geocoding to get the address
            $.get("https://revgeocode.search.hereapi.com/v1/revgeocode", {
                at: latitude + "," + longitude,
                apiKey: apiKey
            }, function(data) {
                if (data.items && data.items.length > 0) {
                    var address = data.items[0].address.label;
                    $('#address').text(address);
                } else {
                    $('#address').text('Address not found.');
                }
            });
        }, "json");
    });
</script>
@endsection
