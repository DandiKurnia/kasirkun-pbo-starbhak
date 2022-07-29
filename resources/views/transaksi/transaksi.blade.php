@extends('layouts.partials.main')

@section('container')
    <div class="card">
        <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Menu</h5>
                </div>
                <div class="col-6 p-3 d-flex justify-content-end">
                  <div class="me-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                          Add Menu +
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="{{ url('jenismenu') }}">
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
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input type="text" name="jenis_menu" id="nameWithTitle" class="form-control" placeholder="Enter Name"/>
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
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->menu->nama_menu }}</td>
                            <td>{{ $row->menu->harga }}</td>
                            <td>{{ $row->qty }}</td>
                            <td class="d-flex">
                              <div class="me-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalCenter2-{{ $row->id }}">
                                    <i class='bx bxs-edit-alt'></i>
                                </button>
                              </div>
                              <form method="POST" action="{{ url('jenismenu/'.$row->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash'></i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              @foreach ($data as $jenis)
              <!-- Modal -->
                      <form method="POST" action="{{ url('jenismenu/'.$jenis->id) }}">
                          @csrf
                          @method('put')
                        <div class="modal fade" id="modalCenter2-{{ $jenis->id }}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Tambah Jenis Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input type="text" name="jenis_menu" id="nameWithTitle" class="form-control" placeholder="Enter Name" value="{{ $jenis->jenis_menu }}"/>
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