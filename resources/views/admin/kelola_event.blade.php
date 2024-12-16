<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="./assets/css/DashboardStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet">
        
    </head>

    <body>
        <section class="d-flex items-center overflow-hidden" style="min-height: 100vh">
            <div class="d-flex flex-column align-items-center text-white"
                style="width: 20rem; background-color:#006B95;">
                <div class="navbar d-flex justify-content-center gap-2 border-bottom w-100" style="height: 125px;">
                    <img src="./assets/IconSidebar.svg" alt="" />
                    <div>Eventku</div>
                </div>

                <div class="link-nav d-flex flex-column align-items-center text-white w-100">
                    <a class="text-white border-bottom w-100" href="javascript:void(0);">Dashboard</a>
                    <a class="text-white border-bottom w-100" href="javascript:void(0);">Tambah Event</a>
                    <a class="text-white border-bottom w-100" href="javascript:void(0);">Kelola Event</a>
                    <a class="text-white border-bottom w-100" href="javascript:void(0);">Partisipan</a>
                </div>
            </div>

            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center" style="height: 125px">
                    <div class="content header-title ms-3" id="lihat-partisipan1">
                        Kelola Event
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px;">
                                Admin
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#" style="font-size: 20px;">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}" style="font-size: 20px;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        <img src="logoprofil.svg" alt="Profile Logo" class="profile-logo">
                    </div>
                </div>

                <div class="bg-body-secondary" style="height: 100%">
                    <!-- Konten Konten -->

                    <div id="lihat-event" class="content pt-5">
                        <div class="container mt-5">
                            <div class="table-container">
                                <h5 class="mb-4">Kelola Event</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Event</th>
                                            <th>Lokasi</th>
                                            <th>Tanggal</th>
                                            <th>Harga Tiket</th>
                                            <th>Deskripsi</th>
                                            <th>Update/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Konser MCR</td>
                                            <td>GBK</td>
                                            <td>27 Januari 2025</td>
                                            <td>700000</td>
                                            <td>Konser Band Legendaris</td>
                                            <td class="action-icons">
                                                <button class="btn-edit rounded-3" data-bs-toggle="modal"
                                                    data-bs-target="#editEventModal"><img src="pencil.svg"
                                                        alt="Edit" style="width: 20px; height: 20px;"></button>
                                                <button class="btn-hapus rounded-3"><img src="delete.svg"
                                                        alt="hapus" style="width: 20px; height: 20px;"></button>
                                            </td>
                                        </tr>
                                        <!-- Tambahkan data lainnya jika perlu -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEventModalLabel">Update</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editEventForm">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="editEventName"
                                                placeholder="Masukkan Nama Event" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="editEventLocation"
                                                placeholder="Lokasi Event" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="date" class="form-control" id="editEventDate"
                                                placeholder="Tanggal" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="editEventPrice"
                                                placeholder="Harga Tiket" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" id="editEventDescription" rows="3" placeholder="Deskripsi Event" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
        </section>

        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

</html>