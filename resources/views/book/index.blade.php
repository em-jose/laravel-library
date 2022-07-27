<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        @forelse ($books as $book)
            {{ $book->name }}<br>
        @empty
            <div class="alert alert-secondary" role="alert">
                @lang('Sorry, there are no books')
            </div>
        @endforelse
    </div>
</body>

</html>
