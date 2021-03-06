<section id="header">
    <a href=""><img src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"></a>

    <div>
        <ul id="navbar">
            <li>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <tr>
                            <td>
                                <form action="<?= base_url('user/search/') ?>" method="get">
                                    <div class="input-group">
                                        <input type="text" class="search" name="keyword" placeholder="Search...">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="<?= base_url('user/search'); ?>">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li><a class="active" href="<?= base_url("user"); ?>">Home</a></li>
            <li><a href="<?= base_url("user/produk"); ?>">Produk</a></li>
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

<section id="hero">
    <h4> Trade-in-offer </h4>
    <h2> Super Value Deals </h2>
    <h1> On All Products </h1>
    <p>Save More With Coupons & Up To 70% off! </p>
    <button class="btn btn-success">Shop Now</button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/ship.png") ?>" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/order.png") ?>" alt="">
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/money.png") ?>" alt="">
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/promotion.png") ?>" alt="">
        <h6>Promotion</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/happy.png") ?>" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="<?= base_url("assets/admin/icon/support.png") ?>" alt="">
        <h6>Support</h6>
    </div>

</section>

<section id="product1" class="section-p1">
    <h2>Product Hoodie</h2>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <p>Silahkan Pilih Produk Hoodie Kami</p>
        </div>
        <div class="col-sm-2">
            <a href="<?= base_url('user/produk'); ?>">
                <p>Produk Lainnya<i class="far fa-arrow-alt-circle-right"></i></p>
            </a>
        </div>
    </div>
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

<section id="banner" class="section-m1">
    <h4>Pengembalian Barang</h4>
    <h2>Jika Barang Tidak Sesuai Dapat Dikembalikan Dalam Waktu <span>- 2 Minggu -</span></h2>
    <button class="normal">Selengkapnya Klik Disini!!!</button>
</section>

<section id="product1" class="section-p1">
    <h2>Product Crewneck</h2>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
            <p>Silahkan Pilih Produk Crewneck Kami</p>
        </div>
        <div class="col-sm-2">
            <a href="<?= base_url('user/produk'); ?>">
                <p>Produk Lainnya<i class="far fa-arrow-alt-circle-right"></i></p>
            </a>
        </div>
    </div>
    <div class="pro-container">
        <?php foreach ($barang2 as $brg2) : ?>
            <div class="pro">
                <img src="<?= base_url() . '/assets/barang/' . $brg2->gambar ?>" class="card-img-top" alt="...">
                <div class="des">
                    <span><?= $brg2->nama_barang ?></span>
                    <h5><?= $brg2->jenis ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp. <?php echo number_format($brg2->harga, 0, ',', '.') ?></h4>
                </div>
                <?= anchor('user/detail_produk/' . $brg2->id_barang, '<i class="fas fa-shopping-cart"></i>'); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Crazy Diskon</h4>
        <h2>Dapatkan Diskon Dari Kami</h2>
        <span>Dengan Terus Belanja Pada Toko Kami Minimal 2 Produk</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>Anda Mengalami Kesulitan?</h4>
        <h2>Silahkan Hubungi Kami!!!</h2>
        <span>Nomor Ada Di Menu About, Silahkan Cek</span>
        <button class="white">Learn More</button>
    </div>
</section>

<section id="banner3">
    <div class="banner-box">
        <h2>Diskon Bulanan</h2>
        <h3>Dapatkan Diskon Bulanan Hingga 50%</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>Diskon Bulanan</h2>
        <h3>Dapatkan Diskon Bulanan Hingga 50%</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>Diskon Bulanan</h2>
        <h3>Dapatkan Diskon Bulanan Hingga 50%</h3>
    </div>
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