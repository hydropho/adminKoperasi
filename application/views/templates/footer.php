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
<script src="<?= base_url(); ?>assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>

<!-- Datatable -->
<script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins-init/datatables.init.js"></script>

<!-- Card -->
<script src="<?= base_url(); ?>assets/vendor/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard/cards-center.js"></script>

<!-- Apex Chart -->
<script src="<?= base_url(); ?>assets/vendor/apexchart/apexchart.js"></script>
<script src="<?= base_url(); ?>assets/vendor/nouislider/nouislider.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/wnumb/wNumb.js"></script>
<script src="<?= base_url(); ?>assets/vendor/wnumb/wNumb.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins-init/nouislider-init.js"></script>

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

<script>
    function cardsCenter() {

        /*  testimonial one function by = owl.carousel.js */



        jQuery('.card-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            center: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: false,
            navText: ['', ''],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                800: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1600: {
                    items: 3
                }
            }
        })
    }

    jQuery(window).on('load', function() {
        setTimeout(function() {
            cardsCenter();
        }, 1000);
    });
</script>
<script>
    var polarChart = function() {
        var ctx = document.getElementById("chartData").getContext('2d');
        Chart.defaults.global.legend.display = false;
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["Simpanan", "Pinjaman"],
                datasets: [{
                    backgroundColor: [
                        "#496ecc",
                        "#68e365"
                    ],
                    data: [<?= $simpanan . ',' . $pinjaman ?>]
                }]
            },
            options: {
                maintainAspectRatio: false,
                scale: {
                    scaleShowLine: false,
                    display: false,
                    pointLabels: {
                        fontSize: 0
                    },
                },
                tooltips: {
                    enabled: false,
                }
            }
        });
    }
</script>
</body>

</html>