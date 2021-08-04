<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Welcome to Glamourpuss</title>
    <link rel="stylesheet" href="../css/forms_css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="container">
      <div class="title">Registration <img src="../images/nyan.png" alt="cat"></div>
      <?= (isset($message)) ? '<p role="alert">'. $message .'</p>' : '' ?>
      <div class="content">
        <form method="post" action="?controller=access&action=register">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" name="full_name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="phone" placeholder="Enter your number" required>
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="male">
            <input type="radio" name="gender" id="dot-2" value="female">
            <input type="radio" name="gender" id="dot-3" value="undefined">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Undefined</span>
              </label>
            </div>
          </div>
            <div class="button">
              <input type="submit" name="send" value="Let's mingle!">
            </div>
            <a href="?controller=access&action=login">Already a member? Sign in</a>
        </form>
      </div>
    </div>
  </body>
</html>