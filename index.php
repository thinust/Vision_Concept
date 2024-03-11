<!DOCTYPE html>

<html>

<head>
    <title>Vision Concept | Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="logo.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" /> -->
</head>

<body style="background-image: url('res/signinBackground.jpg');" class="imageBg">
    <!-- <body  class="body"> -->



    <!-- header -->
    <!-- header -->

    <!-- content-1 -->



    <section class=" bg-image mt-5 mb-5" id="signInBox">
        <div class=" d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <div class="col-12">
                                    <div class="row">
                                        <!-- <div class="col-12 logo"></div> -->
                                        <div class="col-12">
                                            <p class="text-center title01">Hi, Welcome ! </p>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="text-uppercase text-center mb-5">Sign In to System </h2>


                                <div class="row g-2">
                                    <div class="col-12 mb-4">
                                        <input type="text" id="usname" class="form-control" placeholder="admin" />
                                        <label class="form-label">User Name</label>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <div class="input-group ">
                                            <input type="password" id="psw" class="form-control " placeholder="*********" aria-describedby="viewPassword2" />
                                            <button class="btn btn-outline-dark" id="viewPassword2" onclick="viewPassword2();"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>

                                        <label class="form-label">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button onclick="spinner2();" type="button" class="btn btn-dark btn-block btn-lg gradient-custom-4 text-light button1" id="signInBTN">Sign In</button>
                                    </div>

                                    <p hre class="text-center text-muted mt-5 mb-0 ">&copy; 2023 | <a class="fw-bold text-body" href="#" target="_blank">TEASEA Studio</a></p>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>