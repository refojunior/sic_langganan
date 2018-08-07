<?php 
//wajib
include "config/koneksi.php";
cek_login();
 
//header
$title = 'Points';
$user = $_SESSION['username'];

require_once 'layout/header.php';
//navbar 
require_once 'layout/navbar.php';

//sidebar (menu)
require_once 'layout/sidebar.php';
?>

<style>
/* style auto complete list */
.member-ul{
  margin:0;
  padding:0;
  cursor:pointer;
  list-style:none;
  background:#f2f2f2;
}

.member-li {
  padding:5px 0px 5px 10px;
  display:block;
}

.member-li:hover {
  background:#e5e5e5;
}

</style>

    <section class="content">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Points</h3>
          </div>
          <form action="proses/add.php?to=points" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Member</label>
                <input type="text" class="form-control" id="member" name="member" placeholder="Masukan Kode / Nama Member">
                <div id="member-list"></div>
              </div>
              <div class="form-group">
                <label>Nomor Nota</label>
                <input type="text" name="nota" class="form-control" placeholder="No. Nota" required>
              </div>
              <div class="form-group">
                <label>Nominal</label>
                <input type="text" name="nominal" class="form-control" id="nominal" placeholder="Nominal" required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success btn-flat">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>
<?php require_once('layout/footer.php') ?>

<script>
$(document).ready(function(e){
  $('#member').keyup(function(){
    var member = $(this).val();
    if(member != ''){
      $.ajax({
        url:"search-member.php",
        method:"GET",
        data:{data:member},
        success:function(data){
          $('#member-list').fadeIn();
          $('#member-list').html(data);
        }
      });
    }
  });
});

$(document).on('click', 'li', function(){
  $('#member').val($(this).text());
  $('#member-list').fadeOut();
});

$("body").mouseup(function(e){
  if($(e.target).closest('#member').length==0){
    $('#member-list').stop().fadeOut();
  }
});

//number format 
var cleave = new Cleave('#nominal', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});

</script>