<form action="" method="post">
    <input type="hidden" name="id" value="<?= $b["id"] ?>">
    <fieldset>
        <legend class="bold">Edit Agenda</legend>
        <div class="form-group">
            <div class="form-label">Judul Agenda</div>
            <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30" rows="2"><?= $b['kegiatan']  ?></textarea>
        </div>
        <div class="form-group mt-4">
            <div class="form-label">Tgl Mulai</div>
            <input type="datetime-local" class="form-control" name="mulai" id="mulai" value="<?= $b['mulai']  ?>">
        </div>
        <div class="form-group mt-4">
            <div class="form-label">Tgl Selesai</div>
            <input type="datetime-local" class="form-control" name="selesai" id="selesai" value="<?= $b['selesai']  ?>">
        </div>
        <div class="form-group mt-4">
            <div class="form-label">Detail Agenda</div>
            <textarea name="nama" class="form-control" id="nama" cols="30" rows="2"><?= $b['nama']  ?></textarea>
        </div>
        <div class="form-group mt-4">
            <div class="form-label">Tempat</div>
            <textarea name="tempat" class="form-control" id="tempat" cols="30" rows="2"><?= $b['tempat']  ?></textarea>
        </div>
        <div class="form-group mt-4">
            <div class="form-label">Dihadiri Oleh</div>
            <input type="text" class="form-control" name="peserta" id="peserta" value="<?= $b['peserta']  ?>">
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </fieldset>
</form>