@extends(config('app.be_layout').'.main')
@section('content')
            @if(session('error'))
                <div class="card shadow bg-danger text-white" style="margin-bottom:20px;">
                    <div class="card-body" style="overflow-x:auto;padding:10px;">{!! session('error') !!}</div>
                </div>
            @endif
            @if(session('success'))
                <div class="card shadow bg-success text-white" style="margin-bottom:20px;">
                    <div class="card-body" style="overflow-x:auto;padding:10px;">{!! session('success') !!}</div>
                </div>
            @endif
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Prestasi {{$personal->user->name}} Management</h1>
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Prestasi {{$personal->user->name}} Form</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="overflow-x:auto;padding:20px;">
                        <form method="POST" action="{{ route('admin.profile.prestasi.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row" id="div_ref_prestasi_id">
                                <label for="ref_prestasi_id" class="col-md-3 col-form-label text-md-right">{{ __('Pilih dari Daftar') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                            <select name="ref_prestasi_id" id="ref_prestasi_id" class="form-control form-control-user @error('ref_prestasi_id') is-invalid @enderror" value="{{ old('ref_prestasi_id') }}" autocomplete="ref_prestasi_id">
                                                <option value="" selected disabled>Pilih dari daftar</option>                                            
                                                @foreach($refs as $ref)
                                                    <option value="{{ $ref->id }}">{{ $ref->nama }}</option>                                            
                                                @endforeach
                                            </select>
                                            @error('ref_prestasi_id')
                                                <span class="invalid-feedback" ref_prestasi_id="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="form-group row" id="div_ref">
                                <label for="ref" class="col-md-3 col-form-label text-md-right">{{ __('Tambah Data Baru') }}</label>
                                <div class="col-md-9 mb-3 mb-sm-0">
                                    <div class="col-md-13 mb-4 mb-sm-0" style="float: left; padding: 5px;">
                                    <input id="ref" type="checkbox" {{ (old('ref') == true) ? 'checked' : '' }} class="form-control-user @error('ref') is-invalid @enderror" name="ref" autocomplete="ref">
                                    </div>
                                    @error('ref')
                                        <span class="invalid-feedback" ref="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="div_nama">
                                <label for="nama" class="col-md-3 col-form-label text-md-right">{{ __('Data Prestasi Baru') }}</label>
    
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <input id="nama" type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>
    
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row" id="div_tahun">
                                <label for="tahun" class="col-md-3 col-form-label text-md-right">{{ __('Tahun Prestasi') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <input id="tahun" type="number" class="form-control form-control-user @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" autocomplete="tahun" autofocus>    
                                    @error('tahun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="div_panitia">
                                <label for="panitia" class="col-md-3 col-form-label text-md-right">{{ __('Panitia Penyelenggara') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <input id="panitia" type="text" class="form-control form-control-user @error('panitia') is-invalid @enderror" name="panitia" value="{{ old('panitia') }}" autocomplete="panitia" autofocus>
                                    @error('panitia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis" class="col-md-3 col-form-label text-md-right">{{ __('Jenis') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <select name="jenis" id="jenis" required class="form-control @error('jenis') is-invalid @enderror" value="{{ old('jenis') }}" autocomplete="jenis">
                                        <option value="Sains">Sains</option>
                                        <option value="Seni">Seni</option>
                                        <option value="Olah Raga">Olah Raga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>    
                                    @error('jenis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="capaian" class="col-md-3 col-form-label text-md-right">{{ __('Capaian') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <select name="capaian" id="capaian" required class="form-control @error('capaian') is-invalid @enderror" value="{{ old('capaian') }}" autocomplete="capaian">
                                        <option value="Juara I">Juara I</option>
                                        <option value="Juara II">Juara II</option>
                                        <option value="Juara III">Juara III</option>
                                        <option value="Harapan I">Harapan I</option>
                                        <option value="Harapan II">Harapan II</option>
                                        <option value="Harapan III">Harapan III</option>
                                        <option value="Harapan IV">Harapan IV</option>
                                        <option value="Peserta">Peserta</option>
                                        <option value="Panitia">Panitia</option>
                                        <option value="Pengisi Acara">Pengisi Acara</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>    
                                    @error('capaian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tingkat" class="col-md-3 col-form-label text-md-right">{{ __('Tingkat') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <select name="tingkat" id="tingkat" required class="form-control @error('tingkat') is-invalid @enderror" value="{{ old('tingkat') }}" autocomplete="tingkat">
                                        <option value="RT/RW">RT/RW</option>
                                        <option value="Desa">Desa</option>
                                        <option value="Kecamatan">Kecamatan</option>
                                        <option value="Wilbi">Wilbi</option>
                                        <option value="Kabupaten">Kabupaten</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Asean">Asean</option>
                                        <option value="Internasional">Internasional</option>
                                    </select>    
                                    @error('tingkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sertifikat" class="col-md-3 col-form-label text-md-right">{{ __('Sertifikat') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0" style="text-align:center;padding:10px;">
                                    <input id="sertifikat" type="file" class="form-control form-control-user @error('sertifikat') is-invalid @enderror" name="sertifikat" value="{{ old('sertifikat') }}" autocomplete="sertifikat">
                                    @error('sertifikat')
                                        <span class="invalid-feedback" status="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                            

                            <div class="form-group row">
                                <label for="tropi" class="col-md-3 col-form-label text-md-right">{{ __('Tropi') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <select name="tropi" id="tropi" required class="form-control @error('tropi') is-invalid @enderror" value="{{ old('tropi') }}" autocomplete="tropi">
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>    
                                    @error('tropi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="ket" class="col-md-3 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                                <div class="col-md-8 mb-3 mb-sm-0">
                                    <input id="ket" type="text" class="form-control form-control-user @error('ket') is-invalid @enderror" name="ket" value="{{ old('ket') }}" autocomplete="ket">
    
                                    @error('ket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-12">
                                    <button type="submit" class="btn btn-user btn-primary btn-block">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                                <div class="col-md-6 offset-md-12">
                                    <a href="{{ route('admin.profile.prestasi.index') }}" type="submit" class="btn btn-user btn-danger btn-block text-white">
                                        {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
        <script>
        $(document).ready(function(){
            $('#ref').click(function(){
                if(this.checked){
                    $('#div_nama').show();
                }else{
                    $('#div_nama').hide();
                }
            });
            if($('#ref').is(':checked')){
                $('#div_nama').show();
            }else{
                $('#div_nama').hide();
            }
        });
    </script>
@endsection
