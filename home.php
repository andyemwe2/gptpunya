<?php include './template/header.php'; ?>
<main>
    <div class="container">
        <h2>Main Products</h2>
        <div class="products">
            <?php
            // Menampilkan produk dari database
            include('database.php');
            $sql = "SELECT * FROM main_produk";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product-card'>";
                    echo "<img src='./img/" . $row['gambar'] . "' alt='" . $row['nama'] . "'>";
                    echo "<h3>" . $row['nama'] . "</h3>";
                    echo "<a href='product.php?id=" . $row['id'] . "' class='btn btn-primary'>Lihat Produk</a>";
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
<?php include './template/footer.php'; ?>