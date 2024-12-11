<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('templates/head'); ?>
</head>

<body>
    <div class="wrapper">
        <!-- SideBar -->
        <?php $this->view('templates/sidebar'); ?>
        <!-- End SideBar -->
        <div class="main">
            <!-- TopBar -->
            <?php $this->view('templates/topbar'); ?>
            <!-- End TopBar -->
            <main class="content pt-4 pb-0">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><i class="align-middle" data-feather="users"></i> Halaman Manajemen User</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Daftar Data User</h5>
                                </div>
                                <div class="card-body">
                                    <table id="datatables" class="table table-striped table-bordered text-capitalize" style="white-space: nowrap; font-size: 1em;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th class="no-sort">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($data_result as $item) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $item->nama_user ?></td>
                                                    <td class="text-lowercase"><?= $item->username ?></td>
                                                    <td><?= $item->sub_role ?></td>
                                                    <td>
                                                        <?php $params = "[`$item->id_user`, `$item->nama_user`, `$item->username`]" ?>
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_form" onclick="setForm(<?= $params ?>)">
                                                                <i class="bi bi-pencil-square"></i> Edit
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++ ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="modal_form" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-capitalize" id="title_form">Edit Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="modal-form" method="POST" autocomplete="off" action="<?= base_url('user/edit') ?>">
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="text" name="id_user" id="id_user" hidden>
                            <div class="form-group col-md-6 col-12">
                                <label for="nama_user" class="form-label">Nama </label>
                                <input type="text" name="nama_user" id="nama_user" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                                <div class="form-text">Panjang Username Minimal 8 Karakter</div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="password" class="form-label">Ubah Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div style="position: relative;">
                                    <i id="eye" hidden class="bi bi-eye" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                    <i id="eye" class="bi bi-eye-slash" style="position: absolute; right: 10px; top: -30px; cursor: pointer;"></i>
                                </div>
                                <div class="form-text">Biarkan Input Password Kosong, Bila Tidak Ingin Merubah Password</div>
                                <div class="form-text">Password Minimal 8 karakter</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Form -->

    <!-- Script Modal Form -->
    <script>
        const modal_form = document.querySelector('#modal_form');
        const setForm = (data) => {
            const fields = ['id_user', 'nama_user', 'username'];
            fields.forEach((e, i) => {
                const element = modal_form.querySelector(`#${e}`);
                element.value = data[i];
            })
        }
    </script>
    <!-- End Script Modal Form -->

    <!-- Eye Icon Password -->
    <?php $this->view('templates/eye_icon_password'); ?>
    <!-- Eye Icon Password -->

    <!-- Delete Modal -->
    <?php $this->view('templates/delete_modal', ['name' => 'user/delete']); ?>
    <!-- End Delete Modal -->

    <!-- Script -->
    <?php $this->view('templates/script'); ?>
    <!-- End Script -->

    <!-- Logout Modal  -->
    <?php $this->view('templates/toasts'); ?>
    <!-- End Logout Modal  -->

    <!-- Logout Modal  -->
    <?php $this->view('templates/logout_modal'); ?>
    <!-- End Logout Modal  -->
</body>

</html>