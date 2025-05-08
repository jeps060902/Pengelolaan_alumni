<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="/tambah_alumni" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Nama
                    <input class="form-control mb-3" type="text" placeholder="Tambahkan Nama" name="nama">
                    Jurusan
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        <select class="form-select" id="inputGroupSelect01" name="jurusan" required>
                            <option value="" selected disabled>--Pilih Jurusan--</option>
                            <option value="1">RPL</option>
                            <option value="2">Akuntansi</option>
                            <option value="3">Perhotelan</option>
                        </select>
                    </div>
                    Tahun Angkatan
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        <select class="form-select" id="inputGroupSelect01" name="angkatan">
                            <option selected>--Pilih Tahun--</option>
                            <option value="1">2013</option>
                            <option value="2">2014</option>
                            <option value="3">2015</option>
                            <option value="4">2016</option>
                            <option value="5">2017</option>
                            <option value="6">2018</option>
                            <option value="7">2019</option>
                            <option value="8">2020</option>
                            <option value="9">2021</option>
                            <option value="10">2022</option>
                            <option value="11">2023</option>
                            <option value="12">2024</option>
                            <option value="13">2025</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
    </div>
</div>
</div>
