<?php include './template/header.php'; ?>
<main>
    <div class="container">
        <h2>Featured Products</h2>
        <div class="products">
            <?php
            $id = $_GET['id'];
            function format_rupiah($angka)
            {
                $rupiah = number_format($angka, 0, ',', '.');
                return "Rp. " . $rupiah;
            }
            // Menampilkan produk dari database
            include('database.php');
            $sql = "SELECT * FROM produk WHERE produk_id = $id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product-card'>";
                    echo "<img src='./img/" . $row['gambar'] . "' alt='" . $row['nama'] . "'>";
                    echo "<h3>" . $row['nama'] . "</h3>";
                    echo "<p>" . format_rupiah($row['harga']) . "</p>";
                    echo "<a href='#' class='btn btn-primary' onclick='showPopup()'>Beli Sekarang</a>";
                    echo "</div>";
                }
            } else {
                echo "Tidak ada produk yang tersedia.";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</main>

<!-- Pop up form -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="hidePopup()">&times;</span>
        <h3>Isi Form Pembelian</h3>
        <form action="proses_pembelian.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="id_pengguna">ID Pengguna:</label>
            <input type="text" id="id_pengguna" name="id_pengguna" required><br><br>
            <label for="qris">Pembayaran melalui QRIS:</label>
            <input type="text" id="qris" name="qris" required><br><br>
            <input type="submit" value="Beli">
        </form>
    </div>
</div>

<?php include './template/footer.php'; ?>

<script>
    // Menampilkan popup
    function showPopup() {
        document.getElementById("popup").style.display = "block";
    }

    // Menyembunyikan popup
    function hidePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Menambahkan event listener untuk tombol "Beli Sekarang"
    document.querySelector('.btn').addEventListener('click', function () {
        showPopup();
    });

    // Menambahkan event listener untuk tombol "X" pada popup
    document.querySelector('.close').addEventListener('click', function () {
        hidePopup();
    });

</script>