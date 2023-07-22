<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - User</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/icon.png" alt="">
        <span class="d-none d-lg-block"> Disabled</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Mohammed</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Mohammed Ali</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="courses.html">
          <i class="bi bi-book"></i>
          <span>Courses</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link " href="jobs.html">
          <i class="bi bi-laptop"></i>
          <span>Jobs</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link " href="Coins.html">
          <i class="bi bi-journal-richtext"></i>
          <span>Coins</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item out">
        <a class="nav-link " href="index.html">
          <i class="bi bi-arrow-bar-left"></i>
          <span>Sign out </span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="index.html">Job</a></li>
          <li class="breadcrumb-item active">Create Website Modern ..</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="d-flex justify-content-between gap-3">
      <div class="col-md-8">
        <div class="card-body bg-white mb-2">
          <div>
            <h5 class="tilte">
              Project Description
            </h5>
            <hr>
            <pre>
      <code style="font-family: sans-serif; font-size: 16px; color: black;">
  Hello
  I currently have a site, but it is incomplete, and I want to build and
  equip the site in a new and appropriate way
  A site for a perfume company, I do not want to sell online, 
  I only display products according to ratings

  The requirement will be as follows:
  1 - Home page.
  2 - Our products page and within the following categories page
  Example :
  Men's perfumes
  Women's perfumes
  room fresheners
  Bedspread fresheners
  ...etc. Of course, when clicking on the classification, all products appear,
  and when clicking on one of the products, 
  its details appear alone
  3 - Who we are, including our agents and their numbers
  5 - Company news
  4 - Contact us         
      </code>
  </pre>

          </div>
        </div>
        <div class="card-body bg-white mb-2">
          <h5>Requeired Skills</h5>
          <hr>
          <div class="d-flex flex-wrap gap-1">
            <span class="bg-primary text-white rounded-1 py-1 px-2 ">Web Desinge</span>
            <span class="bg-primary text-white rounded-1 py-1 px-2 ">Programing</span>
            <span class="bg-primary text-white rounded-1 py-1 px-2 ">Front-end</span>
          </div>
        </div>

        <!-- Start Add your offer now -->
        <div class="card-body bg-white">
          <h5 class="card-title">Add your offer now</h5>
          <hr>

          <form class="row g-3">
            <div class="container">
              <div class="row">
                <!--Start Delivery period -->
                <div class="d-flex justify-content-between  gap-lg-3 flex-wrap mt-3">
                  <div class="col-md-4 mb-1 ">
                    <div class="form-group">
                      <label for="inputField">Delivery period</label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" class="form-control" aria-label="Small"
                          aria-describedby="inputGroup-sizing-sm">
                        <div class="input-group-prepend ">
                          <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                            id="inputGroup-sizing-sm">Days</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Delivery period -->

                  <div class="col-md-4 mb-1">
                    <div class="form-group">
                      <label for="inputField">Delivery period</label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" class="form-control" id="inputField1" aria-label="Small"
                          aria-describedby="inputGroup-sizing-sm" onchange="calculateDiscount()">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0 rounded-end-1 disabled text-black-50"
                            id="inputGroup-sizing-sm">$</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 mb-1 balance">
                    <div class="form-group">
                      <label for="inputField">Balance</label>
                      <div class="input-group input-group-sm mt-1">
                        <input type="text" class="form-control bg-secondary-light" id="inputField2" aria-label="Small"
                          aria-describedby="inputGroup-sizing-sm" readonly>
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0 rounded-end-1 text-black-50 bg-secondary-light"
                            id="inputGroup-sizing-sm">$</span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="form-group mt-2">
                  <label for="inputField">Offer details *</label>
                  <div class="input-group">
                    <textarea class="form-control border rounded-1 border-secondary-subtle" name="" id="" cols="100"
                      rows="10"></textarea>
                  </div>
                </div>



              </div>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
        <!-- End Add your offer now -->


      </div>
      <div class="col-md-4">
        <div class="card-body bg-white mb-2">
          <div>
            <h5 class="tilte">
              Project card
            </h5>
            <hr>
            <pre class="">
                <code style="font-family: sans-serif; font-size: 16px; color: black;">
    Project status is <button class="bg-success text-white border-0 rounded-1 ms-2 " disabled>open</button>
    Posted: <span class="text-black-50">11 hours ago</span>
    Budget: <span class="text-black-50">$500.00 - $1000.00</span>
    The implementation period is: <span class="text-black-50">30 days</span>
    Average bids are: <span class="text-black-50">$675.00</span>
    The number of offers is: <span class="text-black-50">15</span> 
                </code>
            </pre>

          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <a type="button" class="btn btn-primary mt-3 pe-3 fs-5" href="./index.html">Submit</a>
    </div>

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <span>2023</span>. All Rights Reserved <strong>Disabled</strong>
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!--  Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>