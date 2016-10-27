<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 'Developer\'s Best Friend')
    </title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <script rel="text/javascript" src="js/jquery.min.js"></script>
    <script rel="text/javascript" src="js/bootstrap.min.js"></script>
    <script rel="text/javascript" src="js/clipboard.min.js"></script>
    <script rel="text/javascript" src="js/main.js"></script>
    @yield('headContent')
</head>

<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Developer's Best Friend</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li id="main-nav-item"><a href="/">Home</a></li>
                    <li id="text-generator-nav-item"><a href="/text-generator">Text Generator</a></li>
                    <li id="user-generator-nav-item"><a href="/user-generator">User Generator</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>
<section class="container main-content-area" role="main">
@yield('bodyContent')
</section>
<footer>
</footer>
</body>

</html>
