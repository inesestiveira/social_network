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
            <img src="../images/troll.png" style="width: 45px; float: right; border-radius: 50px;">
        </div>
    </div>

        <!--below cover area-->
        <div id="profile_content_container">

            <div id="profile_image_container">
                <div id="user_bar">
                   <img src="../images/troll.png" id="user_img_timeline">
                   <br>
                   <div id="user_name"><a href="profile.php">Mr.Troll</a></div>
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
                            <img id="user_post_img" src="../images/angrycat.jpeg"  alt="user">
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
                            <img id="user_post_img" src="../images/angrycat.jpeg" alt="user">
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