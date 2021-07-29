<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Glamourpuss</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <div id="nav_bar">
        <div style="width: 800px; margin:auto; font-size: 30px;">
            Glamourpuss &nbsp &nbsp<input type="text" id="search_box" placeholder="Search">
            <a id="logout" href="?controller=access&action=logout">
                <span style="color:white; font-size: 11px; float: right; margin:15px;">Logout</span>
            </a>
            <img src="../images/troll.png" style="width: 45px; float: right; border-radius: 50px;">
        </div>
    </div>

        <!--below cover area-->
        <div id="profile_content_container">

            <div id="profile_image_container">
                <div id="user_bar">
                   <img src="../images/troll.png" id="user_img_timeline">
                   <br>
                   <div id="user_name"><a href="?controller=profile"><?=$_SESSION["username"]?></a></div>
                </div>
            </div>

            <div id="profile_posts_container">
                <div style="padding: 10px;">
                    <textarea id="create_post_profile" placeholder="What grinds your gears?"></textarea>
                    <input id="post_button" type="submit" value="Post">
                    <br>
                </div>


                <div id="post_bar">
                    <!--posts-->
<?php
    foreach($posts as $post) {
        echo '
        <div id="post">
            <div>
                <article>
                    <div>
                        <img id="user_post_img" src="images/angrycat.jpeg"  alt="user">
                    </div>
                    <div>
                        <div id="user_post_name"><p>' .$post["username"]. '</p></div>
                        <div class="message">' .$post["message"]. '</div>
                        <a href="">Like</a> . <a href="">Comment</a> . '.date("j M Y H:i", strtotime($post["post_date"])).'
                    </div>
                </article>
            </div>
        </div>
        <br>
        ';
    }
?>
                </div>
            </div>
        </div>
    </div>
</body>


</html>