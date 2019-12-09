<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Short url</title>
    <style>
        .mansalva{
            font-family: 'Mansalva', cursive;
        }
    </style>
</head>
<body>
    <section>
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="offset-lg-3 offset-md-3 offset-sm-0 offset-0 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card p-4 border-0 shadow-lg">
                        <h1 class="text-center mansalva">shorturl.my.to</h1>
                        <hr class="pb-2">
                        <form method="post" action="/url">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 <?php echo (isset($_SESSION['msg']) ? 'is-invalid' : '') ?>" name="url" id="url" placeholder="Your url here...">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="token" value="<?php echo (isset($token)) ? $token : ''; ?>">
                            </div>

                            <button type="submit" class="btn btn-dark btn-block rounded-0">SUBMIT</button>
                        </form>
                        <?php if(isset($_SESSION['genUrl'])): ?>
                        <div class="alert alert-success mt-3 rounded-0" role="alert">
                            <div class="row">
                                <div class="col-10 pt-1">
                                    <strong><?= $_SESSION['genUrl'] ?></strong>
                                </div>
                                <div class="col-2 text-right">
                                    <button class="d-inline-block ml-auto btn btn-sm btn-outline-dark rounded-0">COPY</button>
                                </div>
                            </div>
                        </div>
                        <?php session_destroy();?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['msg'])): ?>
                            <div class="alert alert-danger mt-3 rounded-0" role="alert">
                                <div class="row">
                                    <div class="col-12 pt-1">
                                        <strong><?= $_SESSION['msg'] ?></strong>
                                    </div>
                                </div>
                            </div>
                            <?php session_destroy();?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>