<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Konsultasi Pasien</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body style="font-family:georgia">
    <h2 style="text-align:center; margin-top:30px;">Form Konsultasi</h2>
    <div class="container">
        <form action="{{route('addKonsultasi')}}" method="POST">
            @csrf
            <div class="col-md-12">
                @if($errors->any())
                <!-- <div class="alert alert-success">success</div> -->
                <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach  
                    </ul>  
                </div> 
                @endif
            
            <div class="col-md-12">
                <label for="">Nama : </label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Anda">
            </div>
            <div class="col-md-12">
                <label for="">Kategori Konsultasi</label>
                <select name="category_id" class="form-control">
                    <option value="" selected disabled>Pilih kategori</option>
                    @foreach ($category as $data)
                    <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label for="" style="margin-top:7px;">Pilih dokter</label>
                <select name="doctor_id" class="form-control">
                    <option value="" selected disabled>Pilih Dokter</option>
                    @foreach ($doctor as $data)
                    <option value="{{$data->doctor_id}}">{{$data->doctor_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label for="" style="margin-top:7px;">Konsultasi</label>
                <textarea class="form-control" name="consult" placeholder="Isi konsultasi anda" rows="15"></textarea>
            </div>

            <div style="margin-top:12px; margin-left:12px;">
                <button class="btn btn-primary" type="submit">Ok</button>
                <a class="btn btn-danger" href="{{url('/')}}">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>