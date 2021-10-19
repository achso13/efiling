<?= $this->extend('layouts/auth/authtemplate'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="py-5 px-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('msg'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url() ?>/auth/login" method="POST">
                            <div class="form-group my-4">
                                <input type="text" class="form-control form-control-user" name="nip" placeholder="Masukkan NIP...">
                            </div>
                            <div class="form-group my-4">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>