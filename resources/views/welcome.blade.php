<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script
          src="https://code.jquery.com/jquery-2.2.4.min.js"
          integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
          crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                    @if(app()->getLocale() == 'id')
                    <a href="{{ url('/en') }}">English</a>
                    @else
                    <a href="{{ url('/') }}">Indonesia</a>
                    @endif
                </div>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                    <a href="">Current locale is: <?= App::getLocale() ?></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @if(isset($articles))
                @foreach($articles as $article)
                <div class="col-lg-4">
                    <h1>{{ title_case($article->title)}}</h1>
                    <!-- lihat di app/Support/helpers.php -->
                    {!! createExcerptAndLink($article->content, 250, $article->slug, trans('article.read_more')) !!}
                </div>
                @endforeach
            @else
                <div class="col-lg-12">
                     <h1>Not Found</h1>
                </div>
            @endif
                
                                
            </div>
        </div>  
    </body>
</html>
