<script src="<?= $fungsi->config()['url'] ?>/assets/static/js/components/dark.js"></script>
<script src="<?= $fungsi->config()['url'] ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= $fungsi->config()['url'] ?>/assets/compiled/js/app.js"></script>
<script src="<?= $fungsi->config()['url'] ?>/assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= $fungsi->config()['url'] ?>/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= $fungsi->config()['url'] ?>/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script type="text/javascript" src="<?= $fungsi->config()['url'] ?>/assets/js/jquery.PrintArea.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        });
        $("#cetak").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("print#areaprint").printArea(options);
        });

        let choices = document.querySelectorAll(".choices")
        let initChoice
        for (let i = 0; i < choices.length; i++) {
            if (choices[i].classList.contains("multiple-remove")) {
                initChoice = new Choices(choices[i], {
                    delimiter: ",",
                    editItems: true,
                    maxItemCount: -1,
                    removeItemButton: true,
                })
            } else {
                initChoice = new Choices(choices[i])
            }
        }
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
    })

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