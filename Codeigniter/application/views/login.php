<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my login! </title>
    
    <link rel="stylesheet" href="/ExamJobb/Codeigniter/css/base.css" />
    <link rel="stylesheet" href="/ExamJobb/Codeigniter/css/style.css" />
</head>

<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">Users</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <!-- skapar logga ut knapp-->
                <li><a href="#">Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="container clearfix">
        <br> <!-- skapa login forum -->
        <div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
            <div class="panel">
                <h2 class="text-center">Login</h2>
                <form method="post" accept-charset="utf-8" action="´#">
                    <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" value="fa9aa718e0b8b55de51cfb215962cabc532e6c4ba76c7a86bbbf6c3f560b328395416c35fdc71b1caf1eeaa73d43edb4e78716322717e9b39c0dba5ca1655373" /></div>
                    <div class="input email"><label for="email">Email</label><input type="email" name="email" id="email" /></div>
                    <div class="input password"><label for="password">Password</label><input type="password" name="password" id="password" /></div>
                    <div class="submit"><input type="submit" class="button" value="Login" /></div>
                </form>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>

</html>