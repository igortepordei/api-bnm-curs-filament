<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currencies Data</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container d-flex flex-column align-items-center justify-content-center min-vh-100">
    <h1 class="mb-4 text-primary">Currencies</h1>

    <div class="card p-4 shadow-lg w-75">
        @foreach($currencies as $currency)
            <p class="d-flex justify-content-between border-bottom py-2">
                <span class="fw-bold">{{ $currency->char_code }}</span>
                <span>{{ $currency->nominal }}</span>
                <span class="text-success">{{ $currency->value }}</span>
                <span class="text-muted">{{ $currency->date }}</span>
            </p>
        @endforeach
    </div>

    <!-- Afișare linkuri de paginare -->
    <div class="mt-4">
        {{ $currencies->links() }}
    </div>
</div>

</body>
</html>
