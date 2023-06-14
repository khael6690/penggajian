<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery-2.1.0.js"></script>
<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/compiled.min.js"></script>
<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery.PrintArea.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false
        });

        $('.mdb-select').material_select();

        $("#cetak").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("print#areaprint").printArea(options);
        });
    });

    $('.pendapatan').keyup(function() {
        let sum = 0;
        $('.pendapatan').each(function() {
            sum += Number($(this).val());
        });
        $('#gajikotor').val(sum);
    });
    $('.potongan').keyup(function() {
        let sum = 0;
        $('.potongan').each(function() {
            sum += Number($(this).val());
        });
        $('#totalpotongan').val(sum);
    });
</script>