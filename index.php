<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "you");
date_default_timezone_set('America/Chicago');

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $mobile = $_SESSION["mobile"];
    $address = $_SESSION["address"];
    echo "<script>alert('Welcome to Travel Memoir!!! $username')</script>";
} else {
    echo "<script>alert('Welcome to Travel Memoir!!!')</script>";
}

$firstLetter = substr($username, 0, 1);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="final.css" />
    <link rel="stylesheet" href="playScreen.css" />
    <link rel="stylesheet" href="fonts.css" />
    <link rel="stylesheet" href="forms.css" />
    <link rel="stylesheet" href="mobile.css" />
    <title>Travel Memoir </title>
</head>

<body>
    <div class="header">
        <div class="title">
            S<span class="highlight">arat </span>
            S<span class="highlight">asank </span>
            <p class="subtitle" style="letter-spacing:normal">travel memoir</p>
        </div>
        <ul class="menu">
            <li> <a href="#about">About</a> </li>
            <li> <a href="#gallery">Gallery</a> </li>
            <li> <a href="chat.php">AskMe</a> </li>
            <li> <a href="#stats">Stats</a> </li>
            <li> <a href="#contact">Connect</a> </li>
        </ul>
        <div class="profile" onclick="profileOpen(event)">
            <div class="flip-box-inner">
                <div class="flip-box-front" onclick="flipCard()">
                </div>
                <div class="flip-box-back" onclick="flipCard()">
                    <p><?php echo $firstLetter; ?></p>
                </div>
            </div>
        </div>
        <div class="bio">
            <table>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td><?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ""; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ""; ?></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><?php echo isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : ""; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : ""; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="login.php">Log Out</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="main">
        <div class="hero" id="Home">
            <ul class="sidebar">
                <!--Cards will be dynamically added from mid.js-->
            </ul>
            <button class="arrow" onclick="menuAppear(event)"></button>
            <div class="playSpace">
                <div class="screen_desc">BEST OF EXPEDITIONS</div>
                <div class="screen">
                    <div class="bul_slider">
                        <div class="ad1" id="ad">
                            <h1 id="txt">COLARADO <span> MOUNTAINS </span></h1>
                        </div>
                        <div class="ad2">
                        </div>
                        <video id="slider" autoplay muted loop>
                            <source src="media/images/mountains_-_91545 (720p).mp4" type="video/mp4">
                        </video>
                    </div>

                    <div class="nav">
                        <a href="#" onclick="videourl('media/video/Y22.mp4'); texting('Retrospection Year22')"></a>
                        <a href="#" onclick="videourl('media/images/Rockies.mp4'); texting('ROCKIES')"></a>
                        <a href="#" onclick="videourl('media/images/JM.mp4'); texting('JEFFERSON MEMORIAL')"></a>
                        <a href="#" onclick="videourl('media/images/Willis.mp4'); texting('WILLIS TOWER')"></a>
                        <a href="#" onclick="videourl('media/images/Sunset.mp4'); texting('SUNSET DALLAS')"></a>
                        <a href="#" onclick="videourl('media/images/NYC.mp4'); texting('EMPIRE STATE')"></a>
                        <a href="#" onclick="videourl('media/images/Orlando.mp4');texting('UNIVERSAL STUDIOS')"></a>

                    </div>

                </div>
                <div class="time screen_desc">
                    <p id="datetime">Loading...</p>
                </div>
            </div>
        </div>

        <form class="newcard" method="POST"
            action="http://localhost:8888/final/newData.php?title_name=<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "default_username"; ?>">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="place_name" name="place_name">
            </div>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="textarea" placeholder="description" name="description">
            </div>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="place_image" name="place_image">
            </div>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="image1" name="image1">
            </div>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="image2" name="image2">
            </div>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="image3" name="image3">
            </div>
            <button class="btn" type="submit" name="submit">Submit</button>
        </form>

        <div class="about sections" id="about">
            <div class="sec_content">
                <span class="sec_title">ABOUT</span><br>
                <p class="description" id="description">
                    Embarking on an expedition, whether into the depths of nature or the uncharted territories of
                    personal
                    growth, has an uncanny ability to reshape one's perspective. Each step taken, every obstacle
                    overcome,
                    reveals a tapestry of beauty woven into the fabric of existence. As I traversed rugged landscapes
                    and
                    weathered the storms of self-discovery, I found my senses heightened to the intricate wonders
                    surrounding me. The grandeur of towering mountains mirrored the vastness of human potential, while
                    the
                    serenity of a babbling brook whispered secrets of simplicity and peace. Through the lens of
                    exploration,
                    I learned to cherish the subtle nuances of life — the gentle caress of a breeze, the fleeting dance
                    of
                    sunlight on leaves — recognizing them as the threads that bind the tapestry together. Every sunrise
                    became a symphony of colors, every encounter a chance to connect with the soul of the world. In the
                    quiet moments of reflection, I realized that beauty isn't confined to majestic landscapes; it
                    resides in
                    the tender embrace of loved ones, the laughter of children, and the kindness of strangers. The
                    expedition not only opened my eyes to the splendor of the world but also cultivated within me a deep
                    sense of gratitude for the small yet profound moments that make life truly extraordinary.
                </p>
            </div>
            <div class="about_cards">
                <div class="ac ac1"></div>
                <div class="ac ac2"></div>
                <div class="ac ac3"></div>
            </div>
        </div>
        <div class="gallery sections" id="gallery">
            <span class="sec_title">WINDOW <br> SNEAK PEAK </span>

            <div class="parallax">
                <div class="parallax-1">
                    <div class="parallax_inner">

                    </div>
                </div>
            </div>
        </div>

        <div class="askme sections" id="askme">
            <span class="sec_title">ASK ME</span>
            <div class="searchbar">
                <input class="search" type="text" placeholder="Enter Your Query">
                <button class="submit" type="submit" onclick="submitQuery(event)"></button>
            </div>
            <p class="feedback"></p>
        </div>

        <div class="sections" id="stats">
            <span class="sec_title">STATISTICS </span>
            <div class="card3">
                <h2>Hikes and Steeps</h2>
                <p id="barInfo"></p>
                <canvas id="barChart"></canvas>
            </div>

        </div>


        <div class="contact sections" id="contact">
            <div class="sec_title">
                CONNECT
            </div>
            <div class="sec_content">
                <div class="icon" style="background: url('media/images/fb.png') center center / cover no-repeat;"><span
                        class="link">https://www.facebook.com</span></div>
                <div class="icon"
                    style="background: url('media/images/instagram.png') center center / cover no-repeat;"><span
                        class="link">https://www.instagram.com</span></div>
                <div class="icon" style="background: url('media/images/twitter.png') center center / cover no-repeat;">
                    <span class="link">https://twitter.com</span>
                </div>
                <div class="icon" style="background: url('media/images/phone.png') center center / cover no-repeat;">
                    <span class="link">+1(987)6543210</span>
                </div>

            </div>
        </div>
    </div>

    <div class="footer"> &copy 2024 Sarat Sasank's Travel Diary </div>

    <script>
        function flipCard() {
            const profile = document.querySelector('.profile');
            profile.classList.toggle('flipped');
        }
    </script>


    <script>
        let username = "<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "default_username"; ?>";
        //let username2 = username;
        console.log("Username passing to JS is: ", username);
    </script>
    <script src="mid.js"></script>
    <script>
        var previousMinute = null;

        // Function to fetch current time from server
        function getCurrentTime() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    var dateDisplay = document.getElementById("datetime");
                    dateDisplay.innerHTML = response;
                }
            };
            xhr.open("GET", "time.php", true);
            xhr.send();
        }

        // Function to check for minute change and update time accordingly
        function checkForMinuteChange() {
            var currentMinute = new Date().getMinutes();
            if (currentMinute !== previousMinute) {
                getCurrentTime();
                previousMinute = currentMinute;
            }
        }

        // Call checkForMinuteChange function initially and then every second
        checkForMinuteChange();
        setInterval(checkForMinuteChange, 1000);
    </script>

</body>

</html>