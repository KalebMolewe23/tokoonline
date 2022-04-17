<section id="header">
    <a href=""><img src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"></a>

    <div>
        <ul id="navbar">
            <li><a href="<?= base_url("user"); ?>">Home</a></li>
            <li><a class="active" href="<?= base_url("user/produk"); ?>">Produk</a></li>
            <li><a href="">Chat</a></li>
            <li id="lg-bag"><?php $keranjang = '<i class="fas fa-shopping-cart"></i>' . $this->cart->total_items() . '' ?>
                <?= anchor('user/detail_keranjang', $keranjang) ?>
            </li>
            <li><a href="">About</a></li>
            <li><a href="">Profil</a></li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
        </ul>
    </div>
    <div id="mobile">
        <a href=""><i class="fas fa-shopping-cart"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>

<section id="page-header">
    <h2> #StayAtHome </h2>
    <p>Save More With Coupons & Up To 70% off! </p>
</section>   

<section id="product1" class="section-p1">
    <div class="pro-container">
        <?php foreach ($barang as $brg) : ?>
            <div class="pro">
                <img src="<?= base_url() . '/assets/barang/' . $brg->gambar ?>" class="card-img-top" alt="...">
                <div class="des">
                    <span><?= $brg->nama_barang ?></span>
                    <h5><?= $brg->jenis ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></h4>
                </div>
                <?= anchor('user/detail_produk/' . $brg->id_barang, '<i class="fas fa-shopping-cart"></i>'); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
</section>

<section id="newsletter" class="section-p1">
    <div class="newstext">
        <h4>Anda Belum Punya Akun??</h4>
        <p>Silahkan daftarkan akun anda menggunakan email anda<span> dan dapatkan layanan terbaik dari kami!.</span>
        </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Masukkan Email Anda">
        <button class="normal">Sign Up</button>
    </div>
</section>

<script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('navbar');

    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        })
    }

    if (close) {
        close.addEventListener('click', () => {
            nav.classList.remove('active');
        })
    }
</script>