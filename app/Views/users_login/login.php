<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <style>
      .body {
        background-color: #8bc6ec;
        background-image: linear-gradient(135deg, #0e67a1 0%, #9599e2 100%);
      }
      .btn {
        background-color: #8bc6ec;
        background-image: linear-gradient(135deg, #9599e2 0%, #26a0f1 100%);
      }
    </style>
    <!-- CDN Link Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <title>Login</title>
  </head>
  <body class="body">
    <div class="container">
      <div
        class="d-flex justify-content-center align-items-center"
        style="height: 100vh; width: 100%"
      >
        <div class="row flex-column">
          <div class="col mb-2">
            <div class="justify-content-center align-items-center">
              <div
                class="d-flex justify-content-between align-items-center"
                style="width: 100%"
              >
                <a href="<?php echo base_url('login')?>" class="btn btn-primary" style="width: 50%"
                  >Login</a
                >
                <a
                  href="<?php echo base_url('register')?>"
                  class="btn btn-primary"
                  style="width: 50%"
                  >Register</a
                >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card container-fluid pb-4 pt-4" style="width: 18rem">
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
              <!-- Isi kontainer di sini -->

              <form id="form_login" method="post" action="<?= base_url(); ?>/login">
                <div class="mb-3">
                  <input
                    type="nip-nim"
                    name="nim"
                    class="form-control"
                    id="nim"
                    placeholder="NIP or NIM"
                  />
                </div>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="password"
                  placeholder="Password"
                />
                <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" type="submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jsBootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>