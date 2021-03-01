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
      <div class="row">
        <div class="col-sm-11">

          <!-- SUPAYA MENAMPILKAN ERROR KESERULUHAN-->
          <?php if (validation_errors()) : ?>
            <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert mb-3" role="alert">
              <span class="content-danger"><?= validation_errors(); ?></span>
              <button class=" close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <i class="zmdi zmdi-close-circle">
                  </i>
                </span>
              </button>
            </div>
          <?php endif; ?>
          <!-- END SUPAYA MENAMPILKAN ERROR -->

          <!-- TAMPILAN SUKSES -->
          <?= $this->session->flashdata('message');  ?>
          <!-- END TAMPILAN SUKSES -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Raport Information</h5>
            </div>
            <div class="card-body">Tunas Jakasampurna High School has a policy regarding assessment index in Student Learning Outcomes. The grading index based on the predicate include :
              <table class="table table-borderless">
                <thead class="text-center">
                  <tr>
                    <th>Grade</th>
                    <th>Value Range</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td>A</td>
                    <td>More than 85</td>
                  </tr>
                  <tr>
                    <td>B+</td>
                    <td>More than 75</td>
                  </tr>
                  <tr>
                    <td>B</td>
                    <td>More than 70</td>
                  </tr>
                  <tr>
                    <td>C+</td>
                    <td>More than 65</td>
                  </tr>
                  <tr>
                    <td>C</td>
                    <td>More than 60</td>
                  </tr>
                  <tr>
                    <td>D</td>
                    <td>Less than 55</td>
                  </tr>
                  <tr>
                    <td>E</td>
                    <td>Less than 40</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Raport Student</h5>
            </div>
            <div class="card-body">
              Student Report Card is a book that contains the value of intelligence and <strong> Student Achievement</strong> in school, serves as a teacher's report to parents or guardians of students.
              <div class="row mt-4">
                <div class="col">
                  <a href="<?= base_url('Student/DetailInfoRaport') ?>" class="au-btn au-btn-icon au-btn--blue mb-3"><i class="zmdi zmdi-arrow-forward"></i> See My Raport!</a>
                </div>
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