<section id="header">
    <a href=""><img src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"></a>

    <div>
        <ul id="navbar">
            <li>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <tr>
                            <td>
                                <input type="text" placeholder="Search" class="search">
                            </td>
                            <td>
                                <a href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li><a href="<?= base_url("home"); ?>">Home</a></li>
            <li><a class="active" href="<?= base_url("home/produk"); ?>">Produk</a></li>
            <li id="lg-bag"><a href="<?= base_url("auth"); ?>"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="<?= base_url("home/about"); ?>">About</a></li>
            <li><a href="<?= base_url("auth"); ?>">Login</a>/<a href="<?= base_url("auth/register"); ?>">Register</a></li>
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

<section id="category" class="section-p1">
    <div class="card">
        <div class="head-card">
        </div>
        <div class="body-card">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class=list-group>
                            <a class="list-group-item">
                                <h3><strong>Category</strong></h3>
                            </a>
                            <a href="<?= base_url('home/produk'); ?>" class="list-group-item">Semua</a>
                            <a href="<?= base_url('home/hoodie'); ?>" class="list-group-item">Hoodie</a>
                            <a href="<?= base_url('home/crewneck'); ?>" class="list-group-item">Crewneck</a>
                        </div>
                    </div>
                    <div class="col">
                        <div id="slider">
                            <figure>
                                <img src="<?= base_url('assets/image/testing.jpg') ?>" class="responsive" alt></img>
                                <img src="<?= base_url('assets/image/testing.jpg') ?>" class="responsive" alt></img>
                                <img src="<?= base_url('assets/image/testing.jpg') ?>" class="responsive" alt></img>
                                <img src="<?= base_url('assets/image/testing.jpg') ?>" class="responsive" alt></img>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<section class="section-p1">
    <?= $this->pagination->create_links(); ?>
</section>

<section id="newsletter" class="section-p1">
    <div class="newstext">
        <h4>Anda Belum Punya Akun??</h4>
        <p>Silahkan daftarkan akun anda menggunakan email anda<span> dan dapatkan layanan terbaik dari kami!.</span>
        </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Masukkan Email Anda">
        <a href="<?= base_url("auth/register"); ?>"><button class="normal">Sign Up</button></a>
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