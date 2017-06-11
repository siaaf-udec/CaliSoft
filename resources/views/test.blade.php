<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <title>Test</title>

</head>
<body>

    <div class="container" style="margin-top: 3%">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="app">
                <file-preview></file-preview>
            </div>  
        </div>
    </div>
    
    <script src="/js/app.js"></script>
</body>
</html>