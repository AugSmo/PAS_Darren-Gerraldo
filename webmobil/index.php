<?php
include 'conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

     <title>Himalya Rent</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


     <link rel="stylesheet" href="css/font-awesome.min.css">
     



     <!-- MAIN CSS -->
     <link rel="stylesheet" href="style2.css">
     <script src="alert/sweetalert2.all.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <style>
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: none;
        padding: 15px;
        border-radius: 5px;
        background-color: #4CAF50; /* Success default */
        color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        font-family: Arial, sans-serif;
        animation: fadeInOut 4s;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; }
    }

    .toast-container.error {
        background-color: #f44336; /* Error */
    }

    .navbar-brand {
  display: flex;
  align-items: center;
  gap: 10px; /* Jarak antara gambar dan teks */
}

.navbar-logo {
  width: 40px; /* Ukuran lebar gambar */
  height: 40px; /* Ukuran tinggi gambar */
  border-radius: 50%; /* Membuat gambar berbentuk lingkaran */
  object-fit: cover; /* Menyesuaikan gambar agar tidak terdistorsi */
}
</style>
     

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="about-us.html" class="navbar-brand">
                         <img src="images/himalya.png" alt="Logo" class="navbar-logo">
                         Himalya Rent
                     </a>

               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="index.html">Home</a></li>
                         <li><a href="fleet.html">Fleet</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   <li><a href="about-us.html">About Us</a></li>
                                   <li><a href="team.html">Team</a></li>
                                   <li><a href="testimonials.html">Testimonials</a></li>
                                   <li><a href="terms.html">Terms</a></li>
                              </ul>
                         </li>
                         <li><a href="index.php">Sewa Mobil</a></li>
                    </ul>
               </div>

          </div>
     </section>
     <br><br><br><br>

     <center><h1>Masukkan data pesanan Anda!</h1></center>
     <center><h4>Periksa kembali data Anda!</h4></center>

<!-- Form Tambah Data -->
<form action="add.php" method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>Jenis Mobil:</label><br>
    <select name="jenis_mobil" required><br>
          <option value="Toyota Sedan 2015">Toyota Sedan 2015</option>
          <option value="Toyota Camry 2024">Toyota Camry 2024</option>
          <option value="Toyota SUV 2019">Toyota SUV 2019</option>
          <option value="Toyota Calya 2018">Toyota Calya 2018</option>
          <option value="Toyota Alphard 2020">Toyota Alphard 2020</option>
          <option value="Honda Civic 2016">Honda Civic 2016</option>
    </select><br><br>
    <label>Tanggal Sewa:</label><br>
    <input type="date" name="tanggal_sewa" required><br>
    <label>Lama Sewa:</label><br>
    <input type="date" name="lama_sewa" required><br>
    <label>Nomor Telepon:</label><br>
    <input type="text" name="nomor_telepon" required><br><br>
    <button type="submit">Buat Pesanan</button>
</form>

<hr>

<!-- Tabel Data -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Mobil</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
            <th>Nomor Telepon</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM datasewamobil";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['jenis_mobil']}</td>
                    <td>{$row['tanggal_sewa']}</td>
                    <td>{$row['lama_sewa']}</td>
                    <td>{$row['nomor_telepon']}</td>
                    <td class='action-buttons'>
                        <a href='edit.php?id={$row['id']}' class='edit-button'>Edit</a>
                        <a href='delete.php? id={$row['id']}' class='delete-button'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align: center;'>Tidak ada data</td></tr>";
        }
        ?>
    </tbody>
</table>
       


     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>212 Barrington Court <br>New York, ABC 10001</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="index.php">Sewa Mobil</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>
     
<script>
    const toggle = document.querySelector('.navbar-toggle');
    const collapse = document.querySelector('.navbar-collapse');

    toggle.addEventListener('click', () => {
        collapse.classList.toggle('show');
    });

    const urlParams = new URLSearchParams(window.location.search);

    // Cek jika parameter "success" ada di URL
    if (urlParams.get('success') === 'true') {
        Swal.fire({
            title: 'Pesanan Berhasil!',
            text: 'Data Anda telah tersimpan dengan sukses.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Setelah alert ditutup, hapus parameter dari URL
            window.history.replaceState(null, null, window.location.pathname);
        });
    }

    $(document).ready(function(){
        $(".close").click(function(){
            $("#myAlert").alert("close");
        });
    });
</script>

<script>
const urlParams = new URLSearchParams(window.location.search);
const status = urlParams.get('status');

if (status === 'add_success') {
    Swal.fire({
        icon: 'success',
        title: 'Pesanan Berhasil!',
        text: 'Data Anda telah tersimpan dengan sukses.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then(() => {
        window.history.replaceState(null, null, window.location.pathname);
    });
} else if (status === 'update_success') {
    Swal.fire({
        icon: 'success',
        title: 'Data Diperbarui!',
        text: 'Data berhasil diperbarui.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then(() => {
        window.history.replaceState(null, null, window.location.pathname);
    });
} else if (status === 'error') {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: 'Terjadi kesalahan saat memperbarui data.',
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    }).then(() => {
        window.history.replaceState(null, null, window.location.pathname);
    });
}
</script>

<script>
     document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Mencegah pengalihan langsung

            const href = button.getAttribute('href'); // Ambil URL dari atribut href

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(`Redirecting to: ${href}`); // Debugging
                    window.location.href = href; // Redirect ke URL asli
                }
            });
        });
    });
});
</script>

<div id="toast" class="toast-container">
    <div class="toast-message"></div>
</div>

<script>
     function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const toastMessage = document.querySelector('.toast-message');

    // Set message and type
    toastMessage.textContent = message;
    toast.className = `toast-container ${type}`;

    // Show toast
    toast.style.display = 'block';

    // Hide toast after 4 seconds
    setTimeout(() => {
        toast.style.display = 'none';
    }, 4000);
}

// Cek URL parameter hanya untuk update
const urlParams = new URLSearchParams(window.location.search);
const status = urlParams.get('status');

if (status === 'update_success') {
    showToast('Data berhasil diperbarui!', 'success');
} else if (status === 'update_error') {
    showToast('Terjadi kesalahan saat memperbarui data.', 'error');
}
</script>





</body>
</html>