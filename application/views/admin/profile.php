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
        <span class="text"><i class='bx bxs-user'></i> My Profile</span>
        <center><?= $this->session->flashdata('message') ?></center>
    </div>

    <main>
        <div class="container-fluid">

            <div class="row text-center mt-3">
                <div class="card ml-3" style="width: 30rem;">
                    <img src="<?= base_url() . '/assets/user/img/' . $user['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text">Date Created : <?= date('d F Y', $user['date_created']); ?></p>
                        <a href="<?= base_url("admin/editprofile/"); ?>" class="btn btn-primary"><i class='bx bxs-edit'></i> Edit Profile</a>
                        <a href="<?= base_url("admin/editpassword/"); ?>" class="btn btn-success"><i class='bx bxs-key'></i> Edit Password</a>
                    </div>
                </div>

                <div class="card ml-3" style="width: 30rem;"><br>
                    <h3>Data My Profile</h3>
                    <div class="card-body" align="left">
                        <h5 class="card-text"><strong>Full Name</strong> : <?= $user['name']; ?></h5>
                        <h5 class="card-text"><strong>Username</strong> : <?= $user['username']; ?></h5>
                        <h5 class="card-text"><strong>Email</strong> : <?= $user['email']; ?></h5>
                        <h5 class="card-text"><strong>Contact</strong> : <?= $user['contact']; ?></h5>
                        <h5 class="card-text"><strong>Gender</strong> : <?= $user['gender']; ?></h5>
                        <h5 class="card-text"><strong>Address</strong> : <?= $user['address']; ?></h5>
                        <h5 class="card-text"><strong>Postal Code</strong> : <?= $user['postal_code']; ?></h5>
                    </div>
                </div>
            </div>

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