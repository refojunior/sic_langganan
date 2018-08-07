 </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Eat - Sleep - Code</b> | REPEAT
    </div>
    <strong>Copyright &copy; 2018 <a href="http://adminlte.io">Refo & Roni</a>.</strong> All rights
    reserved.
  </footer>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Datepicker -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function(){
     $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
      changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
     $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
      changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
    });
</script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- cleave js -->
<script src="<?= base_url('assets/cleave-js/dist/cleave.min.js') ?>"></script>

<!-- CHECKBOX -->
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
});
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
