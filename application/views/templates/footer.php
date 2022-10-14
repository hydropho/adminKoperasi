<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://hydropho.id/" target="_blank">Kelompok 3</a> 2022
        </p>
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
<!-- Required vendors -->
<script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<!-- Datatable -->
<script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url(); ?>assets/vendor/apexchart/apexchart.js"></script>
<script src="<?= base_url(); ?>assets/vendor/nouislider/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/wnumb/wNumb.js"></script>

<!-- Dashboard 1 -->
<script src="<?= base_url(); ?>assets/js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dlabnav-init.js"></script>
<script src="<?= base_url(); ?>assets/js/demo.js"></script>

<script src="<?= base_url(); ?>assets/vendor/nouislider/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/wnumb/wNumb.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins-init/nouislider-init.js"></script>

<script>
function terms_changed(termsCheckBox) {
    if (termsCheckBox.checked) {
        document.getElementById("button_daftar").disabled = false;
    } else {
        document.getElementById("button_daftar").disabled = true;
    }
}
</script>

<script>
document.getElementById('simulasi_form').addEventListener('submit', computeResult);


function computeResult(e) {

    const formatIDR = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    });
    const pokokPinjaman = document.getElementById('pokokPinjaman').value;
    const jangkaWaktu = document.getElementById('jangkaWaktu').value;
    const bunga = document.getElementById('bunga').value;

    document.getElementById('outPinjamanPokok').innerHTML = formatIDR.format(pokokPinjaman);
    document.getElementById('outJangkaWaktu').innerHTML = jangkaWaktu + ' Bulan';
    document.getElementById('outBunga').innerHTML = bunga + '%';

    const angsuranPokok = pokokPinjaman / jangkaWaktu;
    const angsuranBunga = (pokokPinjaman / jangkaWaktu) * ((bunga * jangkaWaktu) / 100);
    const totalAngsuran = angsuranPokok + angsuranBunga;

    document.getElementById('outAngsuranPokok').innerHTML = formatIDR.format(angsuranPokok);
    document.getElementById('outAngsuranBunga').innerHTML = formatIDR.format(angsuranBunga);
    document.getElementById('outTotalAngsuran').innerHTML = formatIDR.format(totalAngsuran);

    e.preventDefault();
}
</script>
</body>

</html>