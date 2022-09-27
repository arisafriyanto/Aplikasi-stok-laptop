<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="https://github.com/DashboardPack/architectui-html-theme-free" class="nav-link text-dark">
                            Copyright &copy; 2021 Aris Afriyanto - Theme : By DashboardPack
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


</div>
</div>

</div>

<script src="./assets/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
<script src="./assets/DataTables/datatables.min.js"></script>
<script src="./assets/DataTables/dataTables.responsive.min.js"></script>
<script src="./assets/jQuery-3.3.1/jquery-ui.js"></script>
<script src="./assets/scripts/main.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        // autocomplete kode_brg

        $("#kode_brg").autocomplete({
            source: './helper/autocomplete-brg.php'
        });

        // autocomplete kode_supplier

        $("#kode_supplier").autocomplete({
            source: './helper/autocomplete-spl.php'
        });
    });


    $(document).ready(function() {
        $('#datatables').DataTable({
            responsive: true
        })
    });


    // convert int to rupiah
    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
</body>

</html>