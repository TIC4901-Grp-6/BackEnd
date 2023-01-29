<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>All Cards</title>
</head>
<body>
    <header>
        <h1>Our Property Pictures</h1>
        <nav class="headerbar">
            <a href="">Home</a>
            <a href="">About</a>
            <div class="dropdown">
                <button><img src="./images/Agent1.png" alt="ProfilePic">Agent123</button>
                <div class="dropdown-content">
                    <a href="#">My Profile</a>
                    <a href="#">Sign Out</a>
                  </div>
            </div>
        </nav>
    </header>


    <main>
      
      <br><br><br><br><br><br>

        <div class="tab">
            <button class="tablinks" onclick="openView(event, 'Imageview')" id = "defaultOpen">Images</button>
            <button class="tablinks" onclick="openView(event, 'Videoview')">VR View</button>
            <button><a href= "./Upload Function/pic_upload_index.php">Edit Listing</a></button>
          </div>

          <div id="Imageview" class="tabcontent">
            <div class ="picview">
                <article id="profile1" class="card">
                    <figure>
                        <div id="overlay" onclick="off()">
                            <div id="text"><img src="./images/PP1.JPG" alt="enlargedview1"></div>
                        </div>
                        <button class="btn1" onclick="on()"><img src="./images/PP1.JPG" alt="Living Room" width="500"></button>
                    </figure>
                    <figcaption><span class="nowrap">Living Room</span></figcaption>
                    <p><q>Nice Pool</q></p>
                </article>
                <article id="profile2" class="card">
                    <figure>
                        <img src="./images/PP2.JPG" alt="Store Room" width="500">
                    </figure>
                    <figcaption>Store Room</figcaption>
                    <p><q>Nice Windows</q></p>
                </article>
                <article id="profile3" class="card">
                    <figure>
                        <img src="./images/PP3.JPG" alt="Bed Room" width="500">
                    </figure>
                    <figcaption>Bed Room</figcaption>
                    <p><q>Nice Bed</q></p>
                </article>
            </div>
    
            <!-- To open overlay of images-->
            <script>
                function on() {
                  document.getElementById("overlay").style.display = "block";
                }
                
                function off() {
                  document.getElementById("overlay").style.display = "none";
                }
            </script>
          </div>
          
          <div id="Videoview" class="tabcontent">
            <iframe width="900" height="506" src="https://www.youtube.com/embed/jcvI-MAWc2U" title="Veer Penthouse Unit 3502 - 360° VR Video Tour" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>

          <!-- To open Tab Views-->
          <script>

            document.getElementById("defaultOpen").click();

            function openView(evt, viewName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(viewName).style.display = "block";
              evt.currentTarget.className += " active";
            }
            </script>

    </main>
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>

</body>
</html>