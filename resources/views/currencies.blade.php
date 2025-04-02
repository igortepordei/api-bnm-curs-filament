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

    <form action="{{ route('currencies') }}" method="GET" class="mb-4 w-75">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Caută după cod valutar (ex: USD, EUR)"
                   value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Caută</button>
            </div>
        </div>
    </form>

    <div class="card p-4 shadow-lg w-75">
        @forelse($currencies as $currency)
            <p class="d-flex justify-content-between border-bottom py-2">
                <span class="fw-bold">{{ $currency->char_code }}</span>
                <span>{{ $currency->nominal }}</span>
                <span class="text-success">{{ $currency->value }}</span>
                <span class="text-muted">{{ $currency->date }}</span>
            </p>
        @empty
            <p class="text-center text-muted">Nicio valută găsită.</p>
        @endforelse
    </div>

    <!-- Afișare linkuri de paginare -->
    <div class="mt-4">
        {{ $currencies->appends(request()->query())->links() }}
    </div>
</div>

</body>
</html>
