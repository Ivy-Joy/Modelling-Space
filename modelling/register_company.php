<?php
require('getreg.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="mystyle.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>User Registration Form</title>

    <style>
        body {
            background-color: gray;
        }
    </style>
</head>

<body>
    <div class="container m-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                           <h2 >Company Registration</h2> 
                        
                       <div class="float-right">
                        <a href="index.php" class="btn btn-outline-secondary">Home</a>
                       </div> 
                        <p class="clear-fix">Not a company? Click <a href="register_model.php">here</a> to <a href="register_model.php">register</a> as a model.</p>
                    </div>
                    <div class="card-body">
                        <form class="" method="POST" action="getregistration.php" enctype="multipart/form-data">
                            <input type="hidden" name="user_type" value="company">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Company Name:</label>
                                        <input class="form-control" type="text" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Company Email:</label>
                                        <input class="form-control" type="email" name="email" placeholder="email@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">Company Phone Number:</label>
                                        <input class="form-control" type="tel" name="phoneNo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm">
                                    <label for="inputState" class="form-group">State</label>
                                    <input type="text" class="form-control" name="state" id="inputState">
                                </div>
                                <div class="col-sm-7">
                                    <label for="inputCounty" class="form-group">County</label>
                                    <input class="form-control" name="county" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." required>
                                    <datalist id="datalistOptions">

                                        <option value="">
                                        <option value="baringo">Baringo</option>
                                        <option value="bomet">
                                        <option value="bungoma">
                                        <option value="busia">
                                        <option value="elgeyo marakwet">
                                        <option value="embu">
                                        <option value="garissa">
                                        <option value="homa bay">
                                        <option value="isiolo">
                                        <option value="kajiado">
                                        <option value="kakamega">
                                        <option value="kericho">

                                        <option value="kiambu">
                                        <option value="kilifi">
                                        <option value="kirinyaga">
                                        <option value="kisii">
                                        <option value="kisumu">
                                        <option value="kitui">
                                        <option value="kwale">
                                        <option value="laikipia">
                                        <option value="lamu">
                                        <option value="machakos">
                                        <option value="makueni">
                                        <option value="mandera">
                                        <option value="meru">
                                        <option value="migori">
                                        <option value="marsabit">
                                        <option value="mombasa">
                                        <option value="muranga">
                                        <option value="nairobi">
                                        <option value="nakuru">
                                        <option value="nandi">
                                        <option value="narok">
                                        <option value="nyamira">
                                        <option value="nyandarua">
                                        <option value="nyeri">
                                        <option value="samburu">
                                        <option value="siaya">
                                        <option value="taita taveta">
                                        <option value="tana river">
                                        <option value="tharaka nithi">
                                        <option value="trans nzoia">
                                        <option value="turkana">
                                        <option value="uasin gishu">
                                        <option value="vihiga">
                                        <option value="wajir">
                                        <option value="pokot">
                                    </datalist>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-8">Enter your Username:<br>
                                    <input class="form-control" type="text" name="username" placeholder="username" required>
                                </label>
                            </div> -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="uploadImage">Company Logo </label>
                                        <input class="form-control" type="file" name="uploadImage" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Password:</label>
                                        <input class="form-control" type="password" name="password" placeholder="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Confirm your password:</label>
                                        <input class="form-control" type="password" name="password" placeholder="confirm your password" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="">Company Description</label>
                                        <textarea class="form-control" name="dy" id="" rows="8"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <button class="btn btn-outline-success" type="submit">REGISTER</button>
                            </div>
                            <div class="row">
                                <p class="text-center">Already registered?<a style="color:gray; " href="login.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>