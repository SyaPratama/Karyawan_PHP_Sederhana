$(".delete-handle").on("click", function () {
  Swal.fire({
    title: "Apaka Kamu Yakin?",
    text: "Kamu Harus Tau Resikonya!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
  }).then((result) => {
    if (result.isConfirmed) {
      const id = $(this).data("id");
      $.ajax({
        type: "POST",
        url: "http://localhost/tugas/app/views/Karyawan/delete-logic.php",
        data: { id: id },
      }).done(function () {
        Swal.fire({
          title: "Delete Success",
          text: "Kamu Berhasil Menghapus File.",
          icon: "success",
          showConfirmButton:false,
          timer:1500
        });

        setTimeout(() => {
            window.location.href = "http://localhost/tugas/app/views/Karyawan/";
        },2000);
      });
    }
  });
});


$("#form-edit").on('submit',function(e){
  e.preventDefault();
  const form = $(this);
  Swal.fire({
    title: "Apakaj Kamu Ingin Update?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Update",
  }).then((res) => {
    if(res.isConfirmed){
      form.off('submit');
      form.submit();
    }
  })
});

$('#form-add').on('submit',function(e){
  e.preventDefault();
  const form = $(this);
  Swal.fire({
    title: "Apakah Kamu Ingin Menambah?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Tambah",
  }).then((res) => {
    if(res.isConfirmed){
      form.off('submit');
      form.submit();
    }
  })
})