@include('templates.header', ['title' => 'List Students'])

<div class="container">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1>Nnado</h1>
            </div>
            <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Add Student</h3>
            <form method="POST" action="{{ route('list-siswa.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="col-lg-6 col-12">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-person"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name"
                            name="name"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-lg-6 col-12">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-home"></i></span>
                        <select class="form-control" name="classes">
                            <option value="" disabled selected>Select Class</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>

                        </select>
                    </div>
                    @error('classes')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-lg-6 col-12">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                        <select class="form-control" name="major">
                            <option value="" disabled selected>Select Major</option>
                            <option value="PPLG">PPLG</option>
                            <option value="TJKT">TJKT</option>
                            <option value="TBSM">TBSM</option>
                            <option value="TKRO">TKRO</option>
                            <option value="MPLB">MPLB</option>
                            <option value="DKV">DKV</option>
                            <option value="HOTEL">HOTEL</option>
                            <option value="TMP">TMP</option>

                        </select>
                    </div>
                    @error('major')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Birth Date Input -->
                <div class="col-lg-6 col-12">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                        <input
                            type="date"
                            class="form-control"
                            name="birth_date"
                            value="{{ old('birth_date') }}">
                    </div>
                    @error('birth_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Photo Profile Input -->
                <div class="col-lg-6 col-12">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                        <input
                            type="file"
                            class="form-control"
                            name="photo_profile">
                    </div>
                    @error('photo_profile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button class="btn btn-primary w-100 login-btn" type="submit">Tambah</button>
                </form>

                <div class="table table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Major</th>
                                <th>Profile Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $d)

                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->classes }}</td>
                                <td>{{ $d->major }}</td>
                                <td>
                                    <img
                                        width="250"
                                        class="img-thumbnail" src="{{ $d->photo_profile}}" />
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between gap-2">
                                        <a
                                            class="btn btn-warning"
                                            href="{{route('list-siswa.show', $d->id) }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('list-siswa.destroy', $d->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-3">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

@include('templates.footer')