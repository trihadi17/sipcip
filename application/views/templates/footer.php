<footer class="footer">
    <div class="container-fluid">

        <p class="copyright pull-right">
            &copy;
            <script>
            document.write(new Date().getFullYear())
            </script>
            <a href="">TEKNIK INFORMATIKA</a>, KERJA PRAKTEK
        </p>
    </div>
</footer>
</div>
</div>

</div>
</body>

</html>
<!--   Core JS Files   -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets'); ?>/../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets'); ?>/../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets'); ?>/../assets/js/material.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets'); ?>/../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url('assets'); ?>/../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url('assets'); ?>/../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?= base_url('assets/js/jquery.datatables.js'); ?>"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url('assets'); ?>/../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?= base_url('assets'); ?>/../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?= base_url('assets'); ?>/../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url('assets'); ?>/../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets/js/demo.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    demo.initFormExtendedDatetimepickers();
    md.initSliders()
});
</script>


<script type="text/javascript">
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.initVectorMap();
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->