<!DOCTYPE html>
<html lang="en">

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>

    <article>
        <h1>
            {{ $post->title }}
        </h1>

        <div>
            {!! $post->body !!}
        </div>
    </article> 

    <a href='/posts'>Go Back.</a>

</body>
</html>