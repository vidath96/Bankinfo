<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Account Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        input {
            padding-top: 0.25em;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row ">
            <div class="col"></div>
            <div class="col-6 col-sm-5 p-2 border border-primary rounded position-absolute top-50 start-50 translate-middle">
                <h2>Register</h2>
                <form action="<?= base_url('User/userRegister') ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label">NIC</label><br>
                        <input type="text" name="nic" placeholder="111111111v" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="label form-label">First Name</label><br>
                        <input type="text" name="firstname" placeholder="John" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label form-label">Last Name</label><br>
                        <input type="text" name="lastname" placeholder="Doe" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label form-label">Email</label><br>
                        <input type="email" name="email" placeholder="jondoe@gmail.com" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label form-label">Address</label><br>
                        <input type="text" name="address" placeholder="No:00, Street1 , District" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label form-label">Contact Number</label><br>
                        <input type="number" name="contactno" placeholder="0711234567" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="label form-label">Password</label><br>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>

                            <div class="col">
                                <label class="label form-label">Password</label><br>
                                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
                            </div>

                        </div><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

                <p>Already have an account? <a href="<?php echo base_url('Welcome') ?>">Login Here</a></p>
            </div>
            <div class="col-3">
                <?php echo validation_errors('<p style="color:red">')
                ?>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>