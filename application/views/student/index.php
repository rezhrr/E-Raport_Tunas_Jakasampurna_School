<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?> </h2>
          </div>
        </div>
      </div>
      <!-- ISI -->
      <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c1">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-accounts"></i>
                </div>
                <div class="text">
                  <h2><?= $this->db->count_all_results('guru');  ?> </h2>
                  <span>
                    <legend>Teachers</legend>
                  </span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart1"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c2">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-home"></i>
                </div>
                <div class="text">
                  <h2><?= $this->db->count_all_results('kelas'); ?> </h2>
                  <span>
                    <legend>Class</legend>
                  </span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart2"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c3">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-graduation-cap"></i>
                </div>
                <div class="text">
                  <h2><?= $this->db->count_all_results('siswa'); ?> </h2>
                  <span>
                    <legend>Student</legend>
                  </span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart3"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="overview-item overview-item--c4">
            <div class="overview__inner">
              <div class="overview-box clearfix">
                <div class="icon">
                  <i class="zmdi zmdi-collection-plus"></i>
                </div>
                <div class="text">
                  <h2>18</h2>
                  <span>
                    <legend>Ekskul</legend>
                  </span>
                </div>
              </div>
              <div class="overview-chart">
                <canvas id="widgetChart4"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- UNTUK PROFILE SEKOLAH -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <i class="zmdi zmdi-balance"></i>
              <strong class="card-title pl-2">Profile SMA Tunas Jakasampurna School</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <!-- <img class="rounded-circle mx-auto d-block" src="assets/foto_tjs/profile school/tunas.school.jpg" alt="Card image cap" /> -->
                <table class="table table-borderless">
                  <tr>
                    <td><strong>NPSN</strong></td>
                    <td>:</td>
                    <td>20223024</td>
                  </tr>
                  <tr>
                    <td><strong>Address</strong></td>
                    <td>:</td>
                    <td>Jl. Sadwa Raya Blok C No.1, Jakasetia</td>
                  </tr>
                  <tr>
                    <td><strong>Zip Code</strong></td>
                    <td>:</td>
                    <td>17147</td>
                  </tr>
                  <tr>
                    <td><strong>Accreditation</strong></td>
                    <td>:</td>
                    <td>Accreditation A</td>
                  </tr>
                  <tr>
                    <td><strong>Phone Number</strong></td>
                    <td>:</td>
                    <td>021-8209156</td>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>smatjs@yahoo.co.id</td>
                  </tr>
                  <tr>
                    <td><strong>Study Time</strong></td>
                    <td>:</td>
                    <td>Morning School</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>


        <!-- END UNTUK PROFILE SEKOLAH -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-user"></i>
              <strong class="card-title pl-2">Image School</strong>
            </div>
            <div class="card-body">
              <div class="mx-auto d-block">
                <img class="rounded mx-auto d-block" src="<?= base_url('assets/foto_tjs/profile school/tunas.school.jpg') ?>" />
                <h5 class=" text-sm-center mt-3 mb-2">SMA Tunas Jakasampurna School</h5>
                <div class="location text-sm-center">
                  <i class="fa fa-fw fa-map-marker"></i> Jakasetia, Bekasi City
                </div>
                <div class="location text-sm-center">
                  <i class="fas fa-fw fa-flag"></i> Indonesia
                </div>
                <div class="location text-sm-center">
                  <i class="fas fa-fw fa-map-marked-alt"></i>
                  <a href="https://www.google.com/maps/dir/-6.2423369,106.9948948/google+maps+sma+tunas+jakasampurna+school/@-6.2557415,106.9654333,14z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2e698daeda16a1bf:0x79a75472a63f152b!2m2!1d106.9688765!2d-6.2610094">
                    <i><u>view maps</u></i>
                  </a>
                </div>
              </div>
              <hr />
              <div class="card-text text-sm-center">
                <a href="https://www.facebook.com/Tunas-Jakasampurna-School-215870605110887/">
                  <i class="fab fa-facebook pr-1"></i>
                </a>
                <a href="https://twitter.com/tjs_school">
                  <i class="fab fa-twitter pr-1"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCh8luZ9aaltKr7bJx3il7uw">
                  <i class="fab fa-youtube pr-1"></i>
                </a>
                <a href="https://smatunasjakasampurna.blogspot.com/">
                  <i class="fab fa-chrome pr-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>



      <!-- END ISI -->
    </div>
  </div>

</div>
<!-- END MAIN CONTENT-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>