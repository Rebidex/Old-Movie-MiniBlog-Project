<!DOCTYPE html>
<html>
<head>
    <title>Sugestii</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,iitial-scale=1">
    <link rel="stylesheet" href="sugestii.css">
</head>
<h1>
    <section class="wrapper">
        <div class="top">Sugestii</div>
        <div class="bottom" aria-hidden="true">Sugestii</div>
      </section>
</h1>
<body>
    <div>
        <h2 class="border-bottom border-red padding-16">Sugestii de filme despre care vrei să scriu un review:</h2>
        <form action="sugestii.php" method="POST">
          <input class="input " type="text" placeholder="Numele tau" required name="name" style="height:25%;font-size:16pt;"><br>
          <input class="input" type="text" placeholder="Email" required name="email" style="height:25%;font-size:16pt;"><br>
          <input class="input" type="text" placeholder="Numele Filmului" required name="film" style="height:25%;font-size:16pt;"><br>
          <input class="input " type="text" placeholder="Gen" required name="gen" style="height:25%;font-size:16pt;"><br>
          <input class="input" type="text" placeholder="Snacks" required name="snacks" style="height:25%;font-size:16pt;"><br> 
          <button class="button-51" type="Submit" role="button">Recomanda filmul </button>
        </form>
    </div> 
    <div>
     <?php
        if(isset($_POST["trimite"])) {

            $nume = $_POST["nume"];
            $email = $_POST["email"];
            $film = $_POST["film"];
            $gen = $_POST["gen"];
            $snacks = $_POST["snacks"];

            if($nume == "" || $email == "" ||  $film == "" || $gen == "" || $snacks == "") {
                $mesaj ="Completează tot >:-(";
            }
            else {
                include("conectare.php");
                $query = "select max(id) as maxi from nume";
                $rezultat = mysqli_query($conex, $query);
                
                $row = mysqli_fetch_array($rezultat);
                $maxi = $row['maxi'] + 1;
                
                $query = "insert into nume values
                    ('$maxi', '$nume', '$email', '$film', '$gen', '$snacks')";
                $rezultat = mysqli_query($conex, $query);
                $mesaj = "Trimis cu succes! Revin cu parerea :-)";
                }
                echo "<h2>$mesaj</h2>";
        }	
    ?>
</div>    
</body>

<div class="footer">
    <p> <a href="atestat.html"><button class="button-30" role="button"><span class="text">Meniu Principal</span></button></a></p>
</div>
</html>