<html>
  <head>
    <meta charset="utf-8">

    <title>Laravel Weather App</title>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col">
          <form class="form-inline" method="post">

            @csrf

            <input type="text" name="city" class="form-control" placeholder="City" >
            <button type="submit" class="btn btn-primary">Check Weather</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-12">

          <h1>{{ $message }}</h1>

        </div>
      </div>
      @if ($forecast)
      <div class="row">
        <div class="col-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Day</th>
                <th scope="col">Average Temperature</th>
                <th scope="col">Min. Temperature</th>
                <th scope="col">Max. Temperature</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($forecast as $forecast)

                <tr>
                  <th scope="row">{{ $forecast['date'] }} </th>
                  <td>{{ $forecast['avgtemp_c'] }}</td>
                  <td>{{ $forecast['mintemp_c'] }}</td>
                  <td>{{ $forecast['maxtemp_c'] }}</td>
                </tr>

                @endforeach
            </tbody>
          </table>
        </div>
      </div>

      @endif
    </div>

  </body>
</html>
