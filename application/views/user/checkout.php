<section id="header">
    <a href=""><img src="<?= base_url("assets/admin/logo/logoig.jpg") ?>" class="logo" alt="" width="50px"></a>

    <div>
        <ul id="navbar">
            <li><a href="<?= base_url("user"); ?>">Home</a></li>
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

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Remove</td>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <?php foreach ($this->cart->contents() as $items) : ?>
            <tbody>
                <tr>
                    <td><a href=""><i class="far fa-times-circle"></i></a></td>
                    <td><img src="<?= base_url() . '/assets/barang/' . $items['image'] ?>" alt=""></td>
                    <td><?= $items['name'] ?></td>
                    <td>Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                    <td><input type="number" value="<?= $items['qty'] ?>"></td>
                    <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Anda Memiliki Kupon?</h3>
        <div>
            <input type="text" placeholder="Masukkan Kupon Anda Disini">
            <button class="normal">Proses</button>
        </div>
    </div>

    <div id="subtotal">
        <h3>Total Belanja</h3>
        <table>
            <tr>
                <td>Diskon</td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></strong></td>
            </tr>
        </table>
        <a href="<?= base_url("user/checkout"); ?>"><button class="normal">Proses Checkout</button></a>
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