@extends('layouts.partials.main')

@section('container')
    <div class="card">
        <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Menu</h5>
                </div>
                <div class="col-6 p-lg-3 p-2 d-flex justify-content-end">
                  <div class="me-lg-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Add Menu +
                        </button>
                        <!-- Modal -->
                        <form method="POST" action="{{ url('menu') }}" enctype="multipart/form-data">
                          @csrf
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah Jenis Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Gambar</label>
                                    <input class="form-control" type="file" name="gambar" id="formFile" />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-2">
                                    <label for="emailWithTitle" class="form-label">kode menu</label>
                                    <input type="text" name="kode_menu" id="emailWithTitle" class="form-control" placeholder="xxxxxxxxx"/>
                                  </div>
                                  <div class="col mb-2">
                                    <label for="dobWithTitle" class="form-label">nama menu</label>
                                    <input type="text" name="nama_menu" id="dobWithTitle" class="form-control" placeholder="Enter Name"/>
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-2">
                                    <label for="emailWithTitle" class="form-label">jenis</label>
                                    <select class="form-select" name="jenis_menu_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                      <option selected>Jenis Menu</option>
                                      @foreach ($jenismenu as $menu)
                                        <option value="{{$menu->id}}">{{ $menu->jenis_menu }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col mb-2">
                                    <label for="dobWithTitle" class="form-label">deskripsi</label>
                                    <input type="text" name="deskripsi" id="dobWithTitle" class="form-control" placeholder="Enter Deskripsi"/>
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-2">
                                    <label for="emailWithTitle" class="form-label">Satuan</label>
                                    <input type="text" name="satuan" id="emailWithTitle" class="form-control" placeholder="Enter Satuan"/>
                                  </div>
                                  <div class="col mb-2">
                                    <label for="dobWithTitle" class="form-label">harga</label>
                                    <input type="number" name="harga" id="dobWithTitle" class="form-control" placeholder="Enter Harga"/>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                  </div>
                </div>
            </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kode Menu</th>
                        <th>Nama Menu</th>
                        <th>Jenis Menu</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                            <img src="{{ asset('imageagenda/'.$row->gambar) }}" alt="" style="width: 50px;">
                            </td>
                            <td>{{ $row->kode_menu }}</td>
                            <td>{{ $row->nama_menu }}</td>
                            <td>{{ $row->jenis_menu->jenis_menu }}</td>
                            <td>{{ $row->satuan }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>
                              <div class="d-flex">
                              <div class="me-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalCenter2-{{ $row->id }}">
                                    <i class='bx bxs-edit-alt'></i>
                                </button>
                              </div>
                              <form method="POST" action="{{ url('menu/'.$row->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
                              </form>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @foreach ($data as $menu)
                <!-- Modal edit -->
                <form method="POST" action="{{ url('menu/'.$menu->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                          <div class="modal fade" id="modalCenter2-{{ $menu->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalCenterTitle">Tambah Jenis Menu</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-3">
                                      <label for="nameWithTitle" class="form-label">Gambar</label>
                                      <input class="form-control" type="file" name="gambar" id="formFile" />
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col mb-2">
                                      <label for="emailWithTitle" class="form-label">kode menu</label>
                                      <input type="text" name="kode_menu" id="emailWithTitle" class="form-control" placeholder="xxxxxxxxx" value="{{ $menu->kode_menu }}"/>
                                    </div>
                                    <div class="col mb-2">
                                      <label for="dobWithTitle" class="form-label">nama menu</label>
                                      <input type="text" name="nama_menu" id="dobWithTitle" class="form-control" placeholder="Enter Name" value="{{ $menu->nama_menu }}"/>
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col mb-2">
                                      <label for="emailWithTitle" class="form-label">jenis</label>
                                      <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option selected>Jenis Menu</option>
                                        @foreach ($jenismenu as $menu1)
                                          <option value="{{$menu1->id}}">{{ $menu1->jenis_menu }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col mb-2">
                                      <label for="dobWithTitle" class="form-label">deskripsi</label>
                                      <input type="text" name="deskripsi" id="dobWithTitle" class="form-control" placeholder="Enter Deskripsi" value="{{ $menu->deskripsi }}"/>
                                    </div>
                                  </div>
                                  <div class="row g-2">
                                    <div class="col mb-2">
                                      <label for="emailWithTitle" class="form-label">Satuan</label>
                                      <input type="text" name="satuan" id="emailWithTitle" class="form-control" placeholder="Enter Satuan" value="{{ $menu->satuan }}"/>
                                    </div>
                                    <div class="col mb-2">
                                      <label for="dobWithTitle" class="form-label">harga</label>
                                      <input type="number" name="harga" id="dobWithTitle" class="form-control" placeholder="Enter Harga" value="{{ $menu->harga }}"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                              </div>
                            </div>
                          </div>
                </form>
                @endforeach
    </div>
@endsection