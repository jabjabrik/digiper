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

            <main class="content">
                <div class="container-fluid p-0">
                    <?php if ($role == 'admin' || $role == 'validator'): ?>
                        <h1 class="h3 mb-3"><strong>Informasi</strong> Pengarsipan Kelurahan</h1>
                        <div class="row g-3">
                            <?php foreach ($kelurahan_arsip as $index => $item): ?>
                                <?php $color = ['primary', 'success', 'warning'][($index + 1) % 3]; ?>
                                <?php $kelurahan = ['wonoasih', 'jrebengkidul', 'pakistaji', 'kedunggaleng', 'kedungasem', 'sumbertaman']; ?>
                                <div class="px-3 col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <a href="<?= base_url("arsip/kelurahan/" . $kelurahan[$index]); ?>" class="card-title text-capitalize"><?= $kelurahan[$index] ?></a>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="stat text-<?= $color; ?>">
                                                        <i class="bi bi-hash"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="mt-1 mb-3"><?= $item->total ?></h1>
                                            <div class="mb-0">
                                                <span class="text-<?= $color; ?>"> <i class="mdi bi bi-stickies-fill"></i></span>
                                                <span class="text-muted"> Total Arsip <?= $item->nama ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="h3 my-3"><strong>Informasi</strong> Kategori Pengarsipan <?= $role != 'admin' && $role != 'validator' ? "Kelurahan $role" : ''; ?></h1>
                    <div class="row g-3">
                        <?php foreach ($kategori_arsip as $index => $item): ?>
                            <?php $color = ['primary', 'success', 'warning'][($index + 1) % 3]; ?>
                            <div class="px-3 col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <span class="card-title text-capitalize"><?= $item->nama_kategori ?></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="stat text-<?= $color; ?>">
                                                    <i class="bi bi-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3"><?= $item->total ?></h1>
                                        <div class="mb-0">
                                            <span class="text-<?= $color; ?>"> <i class="mdi bi bi-stickies-fill"></i></span>
                                            <span class="text-muted"> Total Arsip <?= $item->nama_kategori ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Script -->
    <?php $this->view('templates/script'); ?>
    <!-- EndScript -->

    <!-- Logout Modal  -->
    <?php $this->view('templates/logout_modal'); ?>
    <!-- End Logout Modal  -->
</body>

</html>