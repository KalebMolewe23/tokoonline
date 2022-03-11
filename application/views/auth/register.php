<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url('assets/register/img/PSSM.png') ?>" alt="logo" width="300">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" class="user" action="<?= base_url('auth/register') ?>">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name">Full Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name'); ?>" autofocus>
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" autofocus>
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="contact">Contact</label>
                                        <input id="contact" type="text" class="form-control" name="contact" value="<?= set_value('contact'); ?>">
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

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password1" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control" name="password1">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
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
                                        <input type="text" class="form-control" name="address" value="<?= set_value('address'); ?>">
                                        <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="<?= set_value('postal_code'); ?>">
                                        <?= form_error('postal_code', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <a href="<?= base_url('auth'); ?>">Already have an account? Click Here</a>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; DalboOnline <?= date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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