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
        <span class="text"><i class='bx bxs-user'></i> Edit My Profile</span>
    </div>

    <main>
        <form method="POST" class="user" action="<?= base_url('admin/editprofile') ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="<?= $user['name'] ?>" autofocus>
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-6">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="<?= $user['username'] ?>" readonly>
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" readonly>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-6">
                    <label for="contact">Contact</label>
                    <input id="contact" type="text" class="form-control" name="contact" value="<?= $user['contact'] ?>">
                    <?= form_error('contact', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control selectric" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="image">Photo</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-divider">
                Your Location Information
            </div><br><br>
            <div class="row">
                <div class="form-group col-6">
                    <label>Provinces</label>
                    <select class="form-control selectric" name="prov_id" id="prov_id">
                        <?php foreach ($provinces as $row) : ?>
                            <option value="<?= $row->prov_id ?>"><?= $row->prov_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label>Cities</label>
                    <select class="form-control selectric" name="city_id" id="city_id">

                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label>Districts</label>
                    <select class="form-control selectric" name="dis_id" id="dis_id">

                    </select>
                </div>
                <div class="form-group col-6">
                    <label>Sub Districts</label>
                    <select class="form-control selectric" name="subdis_id" id="subdis_id">

                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $user['address'] ?>">
                    <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-6">
                    <label>Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" value="<?= $user['postal_code'] ?>">
                    <?= form_error('postal_code', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class='bx bxs-memory-card'></i> Save
                </button>
            </div>
        </form>
    </main>

</section>
<script src="<?php echo base_url("assets/register/js/jquery.min.js"); ?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#city_id").hide();
        $("#dis_id").hide();
        $("#subdis_id").hide();

        loadcity();
        loaddistricts();
        loadsubdistricts();
    });

    function loadcity() {
        $("#prov_id").change(function() {
            var getprovinces = $("#prov_id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url("Auth/getdatacities"); ?>",
                data: {
                    prov_name: getprovinces
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].city_id + '">' + data[i].city_name + '</option>'
                    }

                    $("#city_id").html(html);
                    $("#city_id").show();

                }
            });

        });
    }

    function loaddistricts() {
        $("#city_id").change(function() {
            var getcities = $("#city_id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url("Auth/getdatadistricts"); ?>",
                data: {
                    city_name: getcities
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].dis_id + '">' + data[i].dis_name + '</option>'
                    }

                    $("#dis_id").html(html);
                    $("#dis_id").show();

                }
            });

        });
    }

    function loadsubdistricts() {
        $("#dis_id").change(function() {
            var getdistricts = $("#dis_id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url("Auth/getdatasubdistricts"); ?>",
                data: {
                    dis_name: getdistricts
                },
                success: function(data) {
                    console.log(data);

                    var html = "";
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].subdis_id + '">' + data[i].subdis_name + '</option>'
                    }

                    $("#subdis_id").html(html);
                    $("#subdis_id").show();

                }
            });

        });
    }
</script>
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