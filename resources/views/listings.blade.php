<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jobs Listings</title>
</head>

<body>
    <h1>Jobs Listings</h1>
    @foreach ($listings as $listing)
        <a href="/listings/{{ $listing->id }}">
            <h3>{{ $listing->title }}</h3>
        </a>
    @endforeach
</body>

</html>
