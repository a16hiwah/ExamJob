<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts!</title>
    <link rel="stylesheet" href="/ExamJobb/Codeigniter/css/base.css" />
    <link rel="stylesheet" href="/ExamJobb/Codeigniter/css/style.css" />
</head>

<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">Posts</a></h1>
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
                <li><a href="#">List Posts</a></li>
                <li><a href="#">List Users</a></li>
                <li><a href="#">New User</a></li>
            </ul>
        </nav>
        <div class="posts form large-9 medium-8 columns content">
            <form method="post" accept-charset="utf-8" action="#">
                <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" value="fa9aa718e0b8b55de51cfb215962cabc532e6c4ba76c7a86bbbf6c3f560b328395416c35fdc71b1caf1eeaa73d43edb4e78716322717e9b39c0dba5ca1655373" /></div>
                <fieldset>
                    <legend>Add Post</legend>
                    <div class="input text required"><label for="title">Title</label><input type="text" name="title" required="required" maxlength="255" id="title" /></div>
                    <div class="input textarea required"><label for="body">Body</label><textarea name="body" required="required" id="body" rows="5"></textarea></div>
                    <div class="input select"><label for="user-id">User</label><select name="user_id" id="user-id">
                            <option value="1">danii</option>
                            <option value="2">hiwa</option>
                            <option value="3">dalin</option>
                        </select></div>
                </fieldset>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer>
    </footer>
   
</body>

</html>