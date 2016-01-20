<!DOCTYPE html>
<html>
    <head>
        <title>Laravel::Producty</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: left;
                display: table-cell;
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 32px;
            }
            .lista {
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
                    .::Produtos::.
                </div>
                <div class="lista">
                    <ul>
                        @foreach($producties as $producty)
                            <li>{{ $producty->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
