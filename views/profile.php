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
            <h1 id="user_name">Mr. Troll</h1>
            <br>
            <div id="menu_buttons"><a href="timeline.php">Timeline</a></div>
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
                <div style="padding: 10px;">
                    <textarea id="create_post_profile" placeholder="What grinds your gears?"></textarea>
                    <input id="post_button" type="submit" value="Post">
                    <br>
                </div>


                <div id="post_bar">
                    <!--posts-->
                    <div id="post">
                        <div>
                            <img id="user_post_img" src="images/angrycat.jpeg"  alt="user">
                        </div>
                        <div>
                            <div id="user_post_name">User 1</div>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            <br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span id="post_date">August 23 2021</span>
                        </div>
                    </div>
                    
                    <!--post 2-->
                    <div id="post">
                        <div id="user_post_img">
                            <img id="user_post_img" src="images/angrycat.jpeg" alt="user">
                        </div>
                        <div>
                            <div id="user_post_name">User 1</div>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            <br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span id="post_date">August 23 2021</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>