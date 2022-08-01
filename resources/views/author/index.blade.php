<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-5xl font-bold">Authors</h1>
    <div>
        @forelse ($authors as $author)
            {{ $author->name }}<br>
        @empty
            <div class="alert alert-secondary" role="alert">
                @lang('Sorry, there are no authors')
            </div>
        @endforelse
    </div>
</body>

</html>
