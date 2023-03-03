<!doctype html>
<html lang="en">

<head>
    <title>:: Weather App ::</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <header class="text-center mt-4">
        <h3>:: Welcome to Weather App :: </h3>
    </header>
    <hr>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <form id="weather" action="#" class="mb-4">
                        <div class="mb-3">
                            <label for="location" class="form-label">Enter Location</label>
                            <input required name="location" type="text" class="form-control" id="location"
                                placeholder="Location">
                        </div>
                        <div class="mb-3 d-none">
                            <label for="" class="form-label">Lat</label>
                            <input type="text" class="form-control" name="lat" id="lat">
                        </div>
                        <div class="mb-3 d-none">
                            <label for="" class="form-label">Lng</label>
                            <input type="text" class="form-control" name="lng" id="lng">
                        </div>
                        <button type="button" class="btn btn-primary" id="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div id="content"></div>
        </div>
    </main>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>

    <script>
        $(document).ready(function() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['(cities)']
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();
                $("#lat").val(lat);
                $("#lng").val(lng);
            })
            $("#btn-submit").on('click', function () {
				$(this).html('Please Wait...');
				$(this).attr("disabled", true);
				$.ajax({
					type: "get",
					url: "{{route('forecast')}}",
					data: $('#weather').serialize(),
					success: function (response) {
						console.log(response);
						$("#btn-submit").attr("disabled", false);
						$("#btn-submit").html('Submit');
						$("#content").html(response);
					}
				});
			});
        });
    </script>
</body>

</html>
