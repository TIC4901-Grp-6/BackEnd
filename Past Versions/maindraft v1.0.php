<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main v1.0.css">
    <title>Agent Page v1.0</title>
</head>
<body>
    <header>
        <h1>Our Property Pictures</h1>
        <nav class="headerbar">
            <a href="">Home</a>
            <a href="">About</a>
            <div class="dropdown">
                <button><img src="../images/Agent1.png" alt="ProfilePic">Agent123</button>
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
            <button onclick="openEdit()">Edit Listing</button>
        </div>

          <div id="Imageview" class="tabcontent">
            <div class ="picview">
              <?php

                $servername = "localhost";
                $username = "root";
                $password = "mysql";
                $database = "uploadimage";

                $db = mysqli_connect($servername, $username, $password, $database);

                $query = " select * from image ";
                $result = mysqli_query($db, $query);

                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card">
                  <figure>
                    <button class="btn1" onclick="on()">
                      <img src="../Upload Function/pic_upload/image/<?php echo $data['filename']; ?>">
                    </button>
                    <div id="overlay" onclick="off()">
                      <!-- needs a differet SQL query to fetch image again -->
                      <img src="../Upload Function/pic_upload/image/<?php echo $data['filename']; ?>">
                    </div>
                  </figure>
                </div>
                <?php
                  }
                  $result->close();
                ?>
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

            <script>

            </script>
            
          </div>
          
          <div id="Videoview" class="tabcontent">
            <iframe width="900" height="506" src="https://www.youtube.com/embed/jcvI-MAWc2U" title="Veer Penthouse Unit 3502 - 360° VR Video Tour" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>

          <!-- To open Tab Views-->
          <script>
            // Open Tab
            document.getElementById("defaultOpen").click();

            function openView(evt, viewName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
              }
              document.getElementById(viewName).style.display = "block";
              evt.currentTarget.className += " active";defaultOpenForm
            }
          </script>

            <!-- Pop Out Window -->
            <div id="editList" class="form-popup">
              <div class="edittab">
                <button class="tablinkForm" onclick="openFormView(event, 'ImageEdit')" id = "defaultOpenForm">Images</button>
                <button class="tablinkForm" onclick="openFormView(event, 'VideoEdit')">VR Video</button>
                <a href="maindraft v1.0.php" class="spu-close-popup">X</a>
                <!-- To change further on -->
              </div>

              <div id = "ImageEdit" class="tabcontentForm">
                <form class="form-container">
                  <iframe src="../Upload Function/pic_upload/pic_upload_index.php">
                  </iframe>
                </form>
              </div>

              <div id = "VideoEdit" class="tabcontentForm">
                <form class="form-container">
                  Testing123
                </form>
              </div>

            </div>

            <script>
              function openEdit() {
                document.getElementById("editList").style.display = "block";
              }

              function closeEdit() {
                document.getElementById("editList").style.display = "none";
              }

              document.getElementById("defaultOpenForm").click();

              function openFormView(evt, viewName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontentForm");
                for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinkForm");
                for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace("active", "");
                }
                document.getElementById(viewName).style.display = "block";
                evt.currentTarget.className += " active";
              }

            </script>
            <!-- Pop Out Window -->
    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>