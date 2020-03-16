<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter post! </title>
   
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
                <li><a href="#">New Post</a></li>
                <li><a href="#">List Users</a></li>
                <li><a href="#">New User</a></li>
            </ul>
        </nav>
        <div class="posts index large-9 medium-8 columns content">
            <h3>Posts</h3>
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><a href="#">Id</a></th>
                        <th scope="col"><a href="#">Title</a></th>
                        <th scope="col"><a href="#">User</a></th>
                        <th scope="col"><a href="#">Created</a></th>
                        <th scope="col"><a href="#">Modified</a></th>
                        <th scope="col" class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="#"></a></td>
                        <td></td>
                        <td></td>
                        <td class="actions">
                            <a href="#">View</a> <a href="#">Edit</a>
                            <form name="post_5e6f5f89c65a7904197590" style="display:none;" method="post" action="/ExamJobb/Cakephp/posts/delete/4"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" value="fa9aa718e0b8b55de51cfb215962cabc532e6c4ba76c7a86bbbf6c3f560b328395416c35fdc71b1caf1eeaa73d43edb4e78716322717e9b39c0dba5ca1655373" /></form><a href="#" onclick="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="#"></a></td>
                        <td></td>
                        <td></td>
                        <td class="actions">
                            <a href="#">View</a> <a href="/ExamJobb/Cakephp/posts/edit/5">Edit</a>
                            <form name="post_5e6f5f89c7842084655733" style="display:none;" method="post" action="/ExamJobb/Cakephp/posts/delete/5"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" value="fa9aa718e0b8b55de51cfb215962cabc532e6c4ba76c7a86bbbf6c3f560b328395416c35fdc71b1caf1eeaa73d43edb4e78716322717e9b39c0dba5ca1655373" /></form><a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # 5?&quot;)) { document.post_5e6f5f89c7842084655733.submit(); } event.returnValue = false; return false;">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <li class="prev disabled"><a href="" onclick="return false;">&lt; previous</a></li>
                    <li class="next disabled"><a href="" onclick="return false;">next &gt;</a></li>
                </ul>
                <p>Page 1 of 1, showing 2 record(s) out of 2 total</p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    
</body>

</html>