<!-- FOOTER -->
<div class="row">
  <div class="col-md-12">
    <div class="footer">
      <dir class="copyright">
        <p>E-Raport Tunas Jakasampurna School Copyright © <?= date('Y'); ?>. All rights reserved.</p>
      </dir>
    </div>
  </div>
</div>
<!-- END FOOTER -->
</div>
<!-- END PAGE CONTAINER-->
</div>
<!-- END WPAPPER -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<!-- Jquery JS-->
<script src="<?= base_url(); ?>assets/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= base_url(); ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= base_url(); ?>assets/vendor/slick/slick.min.js">
</script>
<script src="<?= base_url(); ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= base_url(); ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= base_url(); ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/select2.min.js">
</script>


<!-- full calendar requires moment along jquery which is included above -->
<script src="<?= base_url(); ?>aseets/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

<!-- Main JS-->
<script src="<?= base_url(); ?>assets/js/main.js"></script>

<!-- TAMPLATE DARI SB ADMIN 2 -->
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor_sbadmin/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor_sbadmin/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor_sbadmin/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js_sbadmin/sb-admin-2.min.js"></script>
<!-- END TAMPLATE DARI SB ADMIN 2 -->

<!-- UNTUK MEMBUAT TAMPILAN PADA BOOTSTRAP SAAT MENGGUNAKAN CHOOSE FILE DAPAT TERBACA DATA YANG DIMASUKAN-->
<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>
<!-- END CHOOSE FILE BOOTSTRAP -->

<!-- UNTUK MEMBUAT CHECKBOX YANG APA BILA DI CHECKED MAKA TAMBAH DAN APABILA UNCHECKED MAKA HAPUS -->
<script>
  $('.form-check-input').on('click', function() {
    const MenuID = $(this).data('menu');
    const HakAksesID = $(this).data('role');

    $.ajax({
      url: "<?= base_url('Admin/UbahAkses'); ?>",
      type: 'post',
      data: {
        MenuID: MenuID,
        HakAksesID: HakAksesID
      },
      success: function() {
        document.location.href = "<?= base_url('Admin/HakAksesAkses/'); ?>" + HakAksesID;
      }
    });

  });
</script>
<!-- END CHECKBOX -->

<script type="text/javascript">
  $(function() {
    // for now, there is something adding a click handler to 'a'
    var tues = moment().day(2).hour(19);

    // build trival night events for example data
    var events = [{
        title: "Special Conference",
        start: moment().format('YYYY-MM-DD'),
        url: '#'
      },
      {
        title: "Doctor Appt",
        start: moment().hour(9).add(2, 'days').toISOString(),
        url: '#'
      }

    ];

    var trivia_nights = []

    for (var i = 1; i <= 4; i++) {
      var n = tues.clone().add(i, 'weeks');
      console.log("isoString: " + n.toISOString());
      trivia_nights.push({
        title: 'Trival Night @ Pub XYZ',
        start: n.toISOString(),
        allDay: false,
        url: '#'
      });
    }

    // setup a few events
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      events: events.concat(trivia_nights)
    });
  });
</script>


</body>

</html>
<!-- end document-->