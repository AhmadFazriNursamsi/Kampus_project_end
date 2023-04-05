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
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      cro
      ssorigin="anonymous"
    /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
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
              <!-- Isi kontainer di sini -->         
                  <!-- Error -->
                  <!-- <strong>Failed!</strong> <span id="alertt"></span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> -->
              <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <script>
                  </script>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
              <form id="form_regis" method="post" action="<?= base_url(); ?>/register">
              <?= csrf_field(); ?>
                <div class="mb-3">
                  <input
                    type="text"
                    name="username"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Username"
                  />
            
                </div>
                <div class="mb-3">
                  <input required
                    type="email"
                    name="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="E-Mail"
                  />
                </div>
                <div class="mb-3">
                  <input required
                    type="text"
                    name="nim"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="NIP or NIM"
                  />
                </div>
                <div class="mb-3">
                  <input required
                    type="text"
                    name="fullname"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Full Name"
                  />
                </div>
                <div class="mb-3">
                  <input required
                    type="text"
                    name="kelas"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Kelas"
                  />
                </div>
                <div class="mb-3">
                  <input required
                    type="number"
                    name="phone_number"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Phone Number"
                  />
                </div>
                <div class="mb-3">
                  <input required
                    type="password"
                    name="password"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Password"
                  />
                </div>
                <input required
                  type="password"
                  name="confirmPassword"
                  class="form-control"
                  placeholder="*Confirm Password"
                  id="exampleInputPassword1"
                />
                <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" type="submit" id="submitt">
                    Register
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jsBootstrap -->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    >
  
  </script>
    
		<?php include '../app/Views/page/footer.php';?>
    <!-- <script>
      
    // A $( document ).ready() block.
    // $('.alert-hide').hide()

    $( "#form_regis" ).submit(function( event ) {
      event.preventDefault();
      var form = $(this);
      var actionUrl = 'http://localhost:8080/register'
      // $('.alert-hide').show()
      
      // console.log(actionUrl, form);
      $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
              // console.log(data);
              // $('#alertt').html(data.message);
              // location.reload();

  //             Swal.fire(
  // 'The Internet?',
  // 'That thing is still around?',
  // 'question')
          
            },
            error: function (data) {
              console.log('An error occurred.');
              console.log(data);
          },
        });
      });

      </script> -->
      </body>
    </html>