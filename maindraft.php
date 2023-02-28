<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Agent Page</title>
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
            <button onclick="openEdit()">Edit Listing</button>
            <!-- <button><a href="./Upload Function/pic_upload_index.php">Edit Listing</a></button> -->
          </div>

          <!-- Picture View -->
          <div id="Imageview" class="tabcontent">
            <div class ="container">
              <div class="mySlides">
                  <img src="./images/PP1.JPG" >
              </div>
            
              <div class="mySlides">
                  <img src="./images/PP2.JPG" >
              </div>
            
              <div class="mySlides">
                  <img src="./images/PP3.JPG" >
              </div>
            
              <div class="mySlides">
                  <img src="./images/PP1.JPG" >
              </div>
            
              <div class="mySlides">
                  <img src="./images/PP2.JPG" >
              </div>
            
              <div class="mySlides">
                  <img src="./images/PP3.JPG" >
              </div>
            
              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
              <!-- Thumbnail images -->
              <div class="row">
                <div class="column">
                  <img class="demo cursor" src="./images/PP1.JPG" onclick="currentSlide(1)">
                </div>
                <div class="column">
                  <img class="demo cursor" src="./images/PP2.JPG" onclick="currentSlide(2)">
                </div>
                <div class="column">
                  <img class="demo cursor" src="./images/PP3.JPG" onclick="currentSlide(3)">
                </div>
                <div class="column">
                  <img class="demo cursor" src="./images/PP1.JPG" onclick="currentSlide(4)">
                </div>
                <div class="column">
                  <img class="demo cursor" src="./images/PP2.JPG" onclick="currentSlide(5)">
                </div>
                <div class="column">
                  <img class="demo cursor" src="./images/PP3.JPG" onclick="currentSlide(6)">
                </div>
              </div>


              
            </div>

            <!-- To scroll Images -->
          <script>
            let slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("demo");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            }
          </script>
        </div>

          <!-- VR Video Tab -->
          <div id="Videoview" class="tabcontent">
            <iframe width="900" height="506" src="https://www.youtube.com/embed/jcvI-MAWc2U" title="Veer Penthouse Unit 3502 - 360° VR Video Tour" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
          </div>
          <!-- VR Video Tab End -->

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
                tablinks[i].className = tablinks[i].className.replace("active", "");
              }
              document.getElementById(viewName).style.display = "block";
              evt.currentTarget.className += " active";
            }
          </script>
          <!-- To open Tab Views End-->

          <!-- Pop Out Window -->
          <div id="editList" class="form-popup">
            <form class="form-container">
              <iframe src="./Upload Function/pic_upload_index.php">
              </iframe>
            </form>
          </div>

          <script>
            function openEdit() {
              document.getElementById("editList").style.display = "block";
            }

            function closeEdit() {
              document.getElementById("editList").style.display = "none";
            }
          </script>
           <!-- Pop Out Window End-->
    </main>
    
    
    <footer>
        <p>&copy; TIC4902</p>
    </footer>
</body>
</html>