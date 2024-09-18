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
        url: "http://localhost/tugas/app/views/Karyawan/delete.php",
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
          window.location.reload();
        }, 1500);
      });
    }
  });
});
