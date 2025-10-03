<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Popular People Notification</title>
</head>
<body>
    <h2>Popular People Alert</h2>
    <p>The following people have more than 50 likes:</p>

    <ul>
        @foreach($people as $person)
            <li>
                <strong>{{ $person->name }}</strong> ({{ $person->age }} y.o) — {{ $person->likes_count }} likes
            </li>
        @endforeach
    </ul>

    <p>Generated automatically by Laravel scheduler.</p>
</body>
</html>
