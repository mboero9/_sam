<html>
    <head>
        <title>Toy Form</title>
    </head>
    <body>
        <h1>Toy Form</h1>

            <form role="form" method="post" action="">
                <div class="form-group">
                    <label for="toy_name">Toy Name</label>
                    <input type="text" name="toy_name">
                </div>

                <div class="form-group">
                    <label for="toy_price">Toy Price</label>
                    <input type="text" name="toy_price">
                </div>

                <button type="submit" name="submit">Submit</button>
            </form>
    </body>
</html>

<?php

    $con=mysqli_connect("localhost","root","root","toys_db");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    if(isset($_POST ['submit'])) {

        $toy_name = $_POST['toy_name'];
        $toy_price = $_POST['toy_price'];

        if($toy_name=="") {
            echo "There was an error, please enter a name.";
            exit();
            } 

        if($toy_price=="") {
            echo "There was an error, please enter a price.";
            exit();
            } 

        $query = "INSERT INTO toys_db (toy_name,toy_price) VALUES ('$toy_name','$toy_price')";

        $run = mysqli_query($con,$query);

        $toy_id = mysqli_insert_id($con);

        /*if ($toy_id == true) {
            echo $toy_id;
            }*/

        if ($toy_id == true) {
            echo "<script>window.open('toy_details.php', '_self')</script>";
            }
    }
    mysqli_close($con);
?>