<section id="header">
    <a href=""><img src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"></a>

    <div>
        <ul id="navbar">
            <li>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <tr>
                            <td>
                                <form action="<?= base_url('home/search/') ?>" method="get">
                                    <div class="input-group">
                                        <input type="text" class="search" name="keyword" placeholder="Search...">
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="<?= base_url('home/search'); ?>">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li><a class="active" href="<?= base_url("home"); ?>">Home</a></li>
            <li><a href="<?= base_url("home/produk"); ?>">Produk</a></li>
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

<section id="prodetails" class="section-p1">
    <?php foreach ($barang as $brg) :  ?>
        <div class="single-pro-image">
            <img src="<?= base_url() . '/assets/barang/' . $brg->gambar ?>" width="100%" id="MainImg" alt="">

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="<?= base_url() . '/assets/barang/' . $brg->gambar ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= base_url() . '/assets/barang/' . $brg->gambar1 ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= base_url() . '/assets/barang/' . $brg->gambar2 ?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="<?= base_url() . '/assets/barang/' . $brg->gambar3 ?>" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-pro-details">
            <h6>Home / Hoodie</h6>
            <h4><?= $brg->nama_barang; ?></h4>
            <h2>Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></h2>
            <input type="number" value="1">
            <a href="<?= base_url("auth"); ?>"><button class="normal">Add To Cart</button></a>
            <h4>Product Details</h4>
            <span><?= $brg->keterangan; ?></span><br>
            <span>Jumlah Stok : <?= $brg->stok; ?></span>
        </div>

    <?php endforeach; ?>
</section>

<section id="product1" class="section-p1">
    <h2>Produk Kami Lainnya</h2>
    <p>Silahkan Pilih Produk Dari Kami Kesukaan Kalian</p>
    <div class="pro-container">
        <?php foreach ($barangs as $brgs) : ?>
            <div class="pro">
                <img src="<?= base_url() . '/assets/barang/' . $brgs->gambar ?>" class="card-img-top" alt="...">
                <div class="des">
                    <span><?= $brgs->nama_barang ?></span>
                    <h5><?= $brgs->jenis ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Rp. <?php echo number_format($brgs->harga, 0, ',', '.') ?></h4>
                </div>
                <?= anchor('home/detail_produk/' . $brgs->id_barang, '<i class="fas fa-shopping-cart"></i>'); ?>
            </div>
        <?php endforeach; ?>
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

<script>
    var MainImg = document.getElementById("MainImg");
    var smalling = document.getElementsByClassName("small-img");

    smalling[0].onclick = function() {
        MainImg.src = smalling[0].src;
    }
    smalling[1].onclick = function() {
        MainImg.src = smalling[1].src;
    }
    smalling[2].onclick = function() {
        MainImg.src = smalling[2].src;
    }
    smalling[3].onclick = function() {
        MainImg.src = smalling[3].src;
    }
</script>