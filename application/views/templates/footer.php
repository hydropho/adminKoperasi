<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://hydropho.id/" target="_blank">Kelompok 3</a> 2022</p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->



</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<<<<<<< HEAD
<!-- Required vendors -->
<script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
=======
    <!-- Required vendors -->
    <script src="<?= base_url();?>assets/vendor/global/global.min.js"></script>
	<script src="<?= base_url();?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="<?= base_url();?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Datatable -->
    <script src="<?= base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins-init/datatables.init.js"></script>
	
	<!-- Apex Chart -->
	<script src="<?= base_url();?>assets/vendor/apexchart/apexchart.js"></script>
	<script src="<?= base_url();?>assets/vendor/nouislider/nouislider.min.js"></script>
	<script src="<?= base_url();?>assets/vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?= base_url();?>assets/js/dashboard/dashboard-1.js"></script>
>>>>>>> a4c77192131400a893a7c452e5d5be0f88c5a9b9

<!-- Apex Chart -->
<script src="<?= base_url(); ?>assets/vendor/apexchart/apexchart.js"></script>
<script src="<?= base_url(); ?>assets/vendor/nouislider/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/wnumb/wNumb.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url(); ?>assets/js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dlabnav-init.js"></script>
<script src="<?= base_url(); ?>assets/js/demo.js"></script>

<script>
    function terms_changed(termsCheckBox) {
        if (termsCheckBox.checked) {
            document.getElementById("button_daftar").disabled = false;
        } else {
            document.getElementById("button_daftar").disabled = true;
        }
    }
</script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('6410a382e507c476b50f', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data_notifikasi) {
        //alert(JSON.stringify(data_notifikasi));
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url('notification/list-notifikasi') ?>",
            success: function(response) {
                $('.list-notifikasi').html(response);
            }
        })
    });
</script>
</body>

</html>