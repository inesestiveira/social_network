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
            <img src="/images/admin.jpg" style="width: 45px; float: right; border-radius: 50px;">
        </div>
    </div>
    <!--cover area-->
    <div id="cover">
        <div style="background-color: white; text-align: center; color: #405d9b">
            <img id="cover_img" src="images/cathome.png">
            <img id="user_img" src="/images/admin.jpg">
            <br>
            <h1 id="user_name"><?=$_SESSION["username"]?></h1>
        </div>
        

        <!--below cover area-->
        <div id="profile_content_container">

            <div id="profile_friends_container">
                <div id="friends_bar">
                <p>Friends</p><br>
                
<?php
//print_r($users);

    foreach($users as $user) {
        
        echo '
        <div id="friends">
            <img id="friends_img" src="images/nyan.png"><br>
            <a href="?controller=profile&'.$user["user_id"].'">'.$user["username"].'</a>
        </div>
        <br>
        ';
    }
?>
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