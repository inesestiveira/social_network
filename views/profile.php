<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Glamourpuss</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div id="nav_bar">
        <div style="width: 800px; margin:auto; font-size: 30px;">
            Glamourpuss &nbsp &nbsp<input type="text" id="search_box" placeholder="Search">
            <a id="logout" href="?controller=access&action=logout">
                <span style="color:white; font-size: 11px; float: right; margin:15px;">Logout</span>
            </a>
            <img src="images/troll.png" style="width: 45px; float: right; border-radius: 50px;">
        </div>
    </div>
    <!--cover area-->
    <div id="cover">
        <div style="background-color: white; text-align: center; color: #405d9b">
            <img id="cover_img" src="images/cathome.png">
            <img id="user_img" src="images/troll.png">
            <br>
            <h1 id="user_name"><?=$_SESSION["username"]?></h1>
            <br>
            <div id="menu_buttons"><a href="?controller=timeline">Timeline</a></div>
            <div id="menu_buttons">About</div>
            <div id="menu_buttons">Friends</div>
            <div id="menu_buttons">Photos</div>
        </div>

        <!--below cover area-->
        <div id="profile_content_container">

            <div id="profile_friends_container">
                <div id="friends_bar">
                    Friends<br>
                    <div id="friends">
                        <img id="friends_img" src="images/nyan.png"><br>
                        First User
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="images/grumpy.jpg"><br>
                        Second User
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="images/oldcat.jpg"><br>
                        Third User
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="images/catfish.jpg"><br>
                        Fourth User
                    </div>
                </div>
            </div>

            <div id="profile_posts_container">
                <div id="create-post" style="padding: 10px;">
<?php
    if(isset($alert)) {
        echo '<p role="alert">' .$alert. '</p>';
    }
?>
                    <form method="post" action="?controller=posts">
                        <label>
                            <textarea placeholder="What grinds your gears?" style="resize: none; width: 550px; height: 150px" name="message" required minlength="5" maxlength="65535"></textarea>
                        </label>
                        <button id="post_button" type="submit" name="send">Post</button>
                        <br>
                </div>


                <div id="post_bar">
                    <!--posts-->
                    <div id="post"">
                        <div>   
                             
<?php
    foreach($posts as $post) {
        echo '
            <article>
                <div>
                    <img id="user_post_img" src="images/angrycat.jpeg"  alt="user">
                </div>
                <div>
                    <div id="user_post_name"><' .$_SESSION["username"]. '></div>
                    <div class="message">' .$post["message"]. '</div>
                    <a href="">Like</a> . <a href="">Comment</a> . '.date("j M Y H:i", strtotime($post["post_date"])).'
                </div>
            </article>
            <br>
        ';
    }
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>