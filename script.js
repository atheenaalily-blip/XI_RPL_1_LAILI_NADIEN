function tampilkanNama(){
    document.getElementById("namaAnggota").innerHTML = `
        <ol style="list-style-type: decimal; padding-left:5%;">
            <li>Laili Annisa (Laili@gmail.com)</li>
            <li>Nadien Qurrotul(Nadien@gmail.com)</li>
        </ol>

        <button onclick="location.reload()">
            Tutup Kembali
        </button>
    `;
}


function validasiForm(){
    var tglMulai = document.getElementById("tgl_mulai").value;
    var tglSelesai = document.getElementById("tgl_selesai").value;

    if(new Date(tglSelesai) > new Date(tglMulai)){
        alert('Tanggal Selesai Tidak Boleh Lebih Awal Dari Tanggal Mulai');
    }
}


function pesanSekarang() {
    alert("Akan segera Hadir");
}