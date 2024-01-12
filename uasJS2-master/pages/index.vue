<template>
  <div>
    <br />
    <AppAlert>
      <a href="/tambah" class="d-flex justify-content-center">
        <button id="tambah" class="btn btn-primary" type="button">Tambah Data Jadwal</button>
      </a>
      <br />
      <br />
      <table class="table" border="1px">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Kode MK</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Jam</th>
            <th scope="col">Kelas</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>MK1</td>
            <td>Framwork JS</td>
            <td>12:30 - 2:50</td>
            <td>Lab 1</td>
            <td><button type="button" class="btn btn-primary">Edit</button>|<button type="button" class="btn btn-danger">Hapus</button></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>MK 2</td>
            <td>Sistem Informasi Geografis</td>
            <td>12:30 - 2:50</td>
            <td>Lab 2</td>
            <td>
              <a href="/edit"><button type="button" class="btn btn-primary">Edit</button></a>|<button type="button" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>MK 3</td>
            <td>Bahasa inggris</td>
            <td>3:30 - 5:30</td>
            <td>Ruang 5</td>
            <td><button type="button" class="btn btn-primary">Edit</button>|<button type="button" class="btn btn-danger">Hapus</button></td>
          </tr>
        </tbody>
      </table>
    </AppAlert>
  </div>
</template>
