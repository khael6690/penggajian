<div class="col-md-8">
    <div class="card">
        <h5 class="card-header info-color white-text py-4">
            <strong>Tambah Data</strong>
        </h5>
        <div class="card-body px-lg-5 pt-0">
            <form method="post" class="needs-validation" style="color: #757575;" novalidate>
                <div class="md-form">
                    <select name="nip" class="mdb-select">
                        <?php
                        $row = $data->viewDB('pegawai');
                        foreach ($row as $val) { ?>
                            <option value="<?= $val['nip']; ?>"><?= $val['nama']; ?> - <?= $val['nip']; ?></option> ';
                        <?php
                        }
                        ?>
                    </select>
                    <label>Pegawai </label>
                    <div class="invalid-feedback">
                        Tolong Diisi.
                    </div>
                </div>
                <div class="md-form">
                    <input type="number" name="jumlah_uang" class="form-control" required>
                    <label>Jumlah Uang</label>
                    <div class="invalid-feedback">
                        Tolong Diisi.
                    </div>
                </div>
                <label>Tanggal</label>
                <div class="md-form">
                    <input type="date" name="tanggal" class="form-control" required>
                    <div class="invalid-feedback">
                        Tolong Diisi.
                    </div>
                </div>
                <div class="md-form">
                    <textarea class="form-control" rows="4" name="keterangan" style="resize:none ;"></textarea>
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <div class="invalid-feedback">
                        Tolong Diisi.
                    </div>
                </div>
                <div class="md-form">
                    <select name="jenis" class="mdb-select">
                        <option value="1">Pengeluaran</option>
                        <option value="2">Pemasukan</option>
                    </select>
                    <label>Jenis </label>
                    <div class="invalid-feedback">
                        Tolong Diisi.
                    </div>
                </div>
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Tambah</button>
            </form>
        </div>
    </div>
</div>