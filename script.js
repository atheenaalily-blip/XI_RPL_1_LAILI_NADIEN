function tampilkanNama(){
    document.getElementById("namaAnggota").innerHTML=`
    <ol style="list-style-type: decimal; padding-left:5%;">
        <li>Laili (atheenaalily@gmail.com)</li>
        <li>Nadien (nadienqurrotulaeni@gmail.com)</li>
    </ol>

   <button onclick="location.reload()">Tutup Kembali</button>
   `;
}
// Fungsi untuk zoom foto
function zoomFoto() {

    let foto = document.getElementById("fotoMakanan");

    foto.classList.toggle("zoom");

}


// Fungsi untuk mengubah warna judul
function ubahWarna() {

    let judul = document.getElementById("judulResep");

    if (judul.style.color === "rgb(18, 97, 71)") {

        judul.style.color = "black";

    } else {

        judul.style.color = "rgb(18, 97, 71)";

    }

}


// Fungsi tombol pesan
function pesan() {

    document.getElementById("teksPesan").innerHTML =
        "Pesanan berhasil! Akan segera kami proses.";

}