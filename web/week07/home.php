<?php
session_start();
?>

    <!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Home Page</title>
</head>
<body>

<div class="topnav">
    <a class="active" href="home.php">Home</a>
    <a href="store.php">Store</a>
    <a href="itemsSearch.php">Search inventory</a>
    <div class="login-container">
        <form action="logout.php">

            <button type="submit">Log Out</button>
        </form>
    </div>
</div>




<?php
if(!isset($_SESSION['username']))
{
    header('location: 07Prove.php?Login=False');
}
?>
<br>
<div class="header">
    <h1 class="headtitle"> Welcome <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>
</div>




<br>

<div class="w3-container">
    <h2>Select Admin tool</h2><br>
</div>
<form action="home.php" type="POST">
<div class="w3-row-padding">

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-black w3-xlarge w3-padding-32">Admin</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">See/Add Admins </h2>
                <span class="w3-opacity">That manage the store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <button formaction="SeeAddAdmin.php" class="w3-button w3-green w3-padding-large">See/Add Admins</button>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-green w3-xlarge w3-padding-32">Add Items</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">Search and Add</h2>
                <span class="w3-opacity">Items in/to the store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <button formaction="itemsSearch.php" class="w3-button w3-green w3-padding-large">Query/Add items</button>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-center w3-hover-shadow">
            <li class="w3-black w3-xlarge w3-padding-32">Users</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide">Add Users</h2>
                <span class="w3-opacity">To use the Store</span>
            </li>
            <li class="w3-light-grey w3-padding-24">
                <!-- Button trigger modal -->
                <button type="button" class="w3-button w3-green w3-padding-large" data-toggle="modal" data-target="#exampleModalCenter">
                    Add Users
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle">Create Users Action</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>This Action Will Log you out of your account</h4>
                                <h4><b>Do you want to continue?</b></h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button formaction="create_user_pass.php"  data-Toggle="modal" class="btn btn-primary">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>
</form>


<br>
<br>
<br>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>



<br>


<div class="footer">
    <p>CS 313 - Web Engineering II    &copy; 2016 - <?php echo date("Y");?> </p>

</div>


</body>
</html>