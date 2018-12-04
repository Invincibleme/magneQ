<?php
require 'dbconnect.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task</title>
    <link rel="stylesheet" href="css.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
     integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">
<header>
<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><h3>Task</h3></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#about">About Us <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#services">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#blogs">Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact Us</a>
      </li>
    </ul> 
</nav>
</header>

<div class="card">
  <img class="card-img-top" src="imgs/hdr.jpg">
  <div class="card-img-overlay"><h5 class="card-title text-white">About Us</h5></div>
  <div class="card-body" id="about"></div>
    <h4 class="text">Who We Are!</h4>
</div>
    <p class="card-text text-justify text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!</p>
  </div>
</div>

<div class="card" id="services">

<img class="card-img-top" src="imgs/hdr.jpg">
  <div class="card-img-overlay"><h5 class="card-title text-white">Services</h5></div>
  <p class="card-text text-justify text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis, quaerat eum distinctio quasi aperiam illum est ducimus
         labore doloribus exercitationem totam obcaecati, nemo saepe optio necessitatibus temporibus porro quibusdam!</p>
  </div>

<div class="card" id="blogs">
<img class="card-img-top" src="imgs/hdr.jpg">
  <div class="card-img-overlay"><h5 class="card-title text-white">Blog</h5></div>
  <div class="container">
  <div class="row">
    <div class="col-sm-8">
    <?php 
    $getblog = 'SELECT title, name, date, content FROM blog';
    $q = $conn->query($getblog);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $r = $q->fetch();
    ?>

    <?php while ($r = $q->fetch()): ?>
            
                <h2><?php echo htmlspecialchars($r['title']) ;?></h2>
                <small><?php echo htmlspecialchars($r['name']);?><span>  </span><?php
                echo htmlspecialchars($r['date']);?></small>
                
                <p><?php echo htmlspecialchars($r['content']); ?></p>
            
        <?php endwhile; ?>
    </div>
    <div class="col-sm">
      <h3>Add New Blog</h3>
      <?php 
      // $insert = $conn->prepare("INSERT INTO blog (name, title, content, date ) 
      // VALUES (:name,:title,:content,:date)");
      // $insert->bindParam(':name',$name);
      // $insert->bindParam(':title',$title);
      // $insert->bindParam(':content',$content);
      // $insert->bindParam(':date',$date);

      // $name = $_POST['name'];
      // $title = $_POST['title'];
      // $content = $_POST['content'];
      // $date = getdate();

      // $insert->execute();

      if(isset($_POST["submit"])){
        $insert = "INSERT INTO blog (name, title, content, date)
        VALUES ('".$_POST["name"]."','".$_POST["title"]."','".$_POST["content"]."','".$_POST["date"]."')";
        if ($conn->query($insert)) {
          echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
          }

          $conn=null;
      }



      

      ?>
      
      <form action = "index.php" method="POST">
  <div class="form-group">
    
    <input type="text" class="form-control" name="name" placeholder="Name" required>
    
  </div>
  <div class="form-group">
    
    <input type="text" class="form-control" name="title" placeholder="Title" required>
  </div>
  <textarea class="form-control" name="content" cols="30" rows="10" placeholder = "Write here.." required></textarea>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

 </div>

  <div class="contactus" >
    <h3 class="text-center" id="contact">Contact Us</h3>

    <div class="container">
  <div class="row">
    <div class="col-sm">
    <form class="form-group">
  
  <input type="text" class="form-control col-sm-11" placeholder="Name"> <br>
  <input type="email" class="form-control col-sm-11"  placeholder="Email"> <br>
  <textarea name="message" id="" cols="65" rows="10" placeholder="Message"></textarea> <br>
<button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
    </div>
    
    <div class="col-sm">
    <div id="map" style="width:80%;height:300px;"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: 34.144, lng: 74.801};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
        });
      }
    </script>
    </div>
  </div>
</div>
</div>
    
</div>
<div class="card">
<img class="card-img-top" src="imgs/hdr.jpg">
  <div class="card-img-overlay"><h5 class="card-title text-white">Contact Us</h5></div></div>

    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAimSdtntTqL2lHcj7iEX5yqTZgjL2NGFA&callback=initMap"
    async defer></script>
</body>

<footer><p class="text-right text-light bg-dark">Copyright 2018. All Rights Reserved. Terms Of Use<br>Privacy Policy</p></footer>
</html>