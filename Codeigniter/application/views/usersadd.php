<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Users </title>
    
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
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container clearfix">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <ul class="side-nav">
                <li class="heading">Actions</li>
                <li><a href="#">List Users</a></li>
                <li><a href="#">List Posts</a></li>
                <li><a href="#">New Post</a></li>
            </ul>
        </nav>
        <div class="users form large-9 medium-8 columns content">
            <form method="post" accept-charset="utf-8" action="#">
                <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" value="fa9aa718e0b8b55de51cfb215962cabc532e6c4ba76c7a86bbbf6c3f560b328395416c35fdc71b1caf1eeaa73d43edb4e78716322717e9b39c0dba5ca1655373" /></div>
                <fieldset>
                    <legend>Add User</legend>
                    <div class="input text required"><label for="name">Name</label><input type="text" name="name" required="required" maxlength="255" id="name" /></div>
                    <div class="input email required"><label for="email">Email</label><input type="email" name="email" required="required" maxlength="255" id="email" /></div>
                    <div class="input password required"><label for="password">Password</label><input type="password" name="password" required="required" id="password" /></div>
                </fieldset>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer>
    </footer>
    
</body>

</html>