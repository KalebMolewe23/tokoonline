<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxs-t-shirt'></i>
        <span class="logo_name">Dalbo Online</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?= base_url("admin"); ?>">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Home</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= base_url("admin"); ?>">home</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-book-content'></i>
                    <span class="link_name">Data</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Data Customer</a></li>
                <li><a href="<?= base_url("admin/barang"); ?>">Barang</a></li>
                <li><a href="<?= base_url("admin/pembeli"); ?>">Pembeli</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url("admin/prediksi"); ?>">
                <i class='bx bxs-edit-alt'></i>
                <span class="link_name">Prediksi</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="admin/prediksi">Prediksi</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url("admin/meeting"); ?>">
                <i class='bx bx-desktop'></i>
                <span class="link_name">Ruang Meeting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="admin/meeting">Ruang Meeting</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url("admin/history"); ?>">
                <i class='bx bx-history'></i>
                <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="admin/history">History</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="<?= base_url() ?>assets/user/img/<?= $user['image'] ?>" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?= $user['username'] ?></div>
                    <div class="job"><a href="<?= base_url("admin/profil"); ?>">
                            <font color='#ffffff'>Edit Profile</font>
                        </a></div>
                </div>
                <a href="<?= base_url("auth/logout"); ?>"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>
<section class="home-section">

    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"><i class='bx bxs-t-shirt'></i> Tambah Barang</span>
        <center><?= $this->session->flashdata('message') ?></center>
    </div>

    <main>
        <div class="container-fluid">

            <form action="<?php echo base_url() . 'admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                <div class="form_group">
                    <label>Pilih Jenis Barang :</label>
                    <select name="id_jenis" class="form-control">
                        <option value="">-Pilih Jenis Barang-</option>
                        <?php
                        foreach ($barang as $data) {
                            echo "<option value='" . $data->id_jenis . "'>" . $data->jenis . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form_group">
                    <label>Nama Barang :</label>
                    <input type="text" name="nama_barang" class="form-control">
                </div>

                <div class="form_group">
                    <label>Tanggal Masuk Barang :</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>

                <div class="form_group">
                    <label>Harga Barang :</label>
                    <input type="text" name="harga" class="form-control">
                </div>

                <div class="form_group">
                    <label>Jumlah Stok Barang :</label>
                    <input type="text" name="stok" class="form-control">
                </div>

                <div class="form_group">
                    <label>Keterangan :</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>

                <div class="form_group">
                    <label>Gambar Pertama :</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="form_group">
                    <label>Gambar Kedua :</label>
                    <input type="file" name="gambar1" class="form-control">
                </div>

                <div class="form_group">
                    <label>Gambar Ketiga :</label>
                    <input type="file" name="gambar2" class="form-control">
                </div>

                <div class="form_group">
                    <label>Gambar Keempat :</label>
                    <input type="file" name="gambar3" class="form-control">
                </div>

                <input type="hidden" name="nilai" value="0" class="form-control"><br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class='bx bxs-save'></i> Simpan</button>
                </div>
            </form>

        </div>
    </main>

</section>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>