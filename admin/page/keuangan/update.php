<div class="col-md-8">
    <div class="card">
        <h5 class="card-header info-color white-text py-4">
            <strong>Tambah Data</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
            <form method="post" class="form form-vertical needs-validation" style="color: #757575;" novalidate>
                <input type="hidden" name="id_keuangan" value="<?= $result[0]['id_keuangan'] ?>" readonly>
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nip">Pegawai </label>
                                <select name="nip" class="choices form-select">
                                    <?php
                                    $row = $data->viewDB('pegawai');
                                    foreach ($row as $val) { ?>
                                        <option value="<?= $val['nip']; ?>" <?= $result[0]['nip'] == $val['nip'] ? 'selected' : '' ?>><?= $val['nama']; ?> - <?= $val['nip']; ?></option> ';
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Tolong Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jumlah_uang">Jumlah Uang</label>
                                <input type="number" value="<?= $result[0]['jumlah_uang'] ?>" name="jumlah_uang" class="form-control" required>
                                <div class="invalid-feedback">
                                    Tolong Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="<?= $result[0]['tanggal'] ?>" name="tanggal" class="form-control" required>
                                <div class="invalid-feedback">
                                    Tolong Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea class="form-control" rows="4" name="keterangan" style="resize:none ;"><?= $result[0]['keterangan'] ?></textarea>
                                <div class="invalid-feedback">
                                    Tolong Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis </label>
                            <select name="jenis" class="choices form-select">
                                <option value="1" <?= $result[0]['jenis'] == 1 ? 'selected' : '' ?>>Pengeluaran</option>
                                <option value="2" <?= $result[0]['jenis'] == 2 ? 'selected' : '' ?>>Pemasukan</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                            <a href="<?= $fungsi->config()['url'] ?>/admin/keuangan.php" class="btn btn-danger me-1 mb-1">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>