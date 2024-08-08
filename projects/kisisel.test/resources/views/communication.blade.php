@extends('layouts.template')

@section('title', 'Communication')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101275.60034046444!2d33.968045930404664!3d37.511160779472696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d795b0ae27dd7b%3A0xfc945903e711a3c!2sPixron%20Digital%20Media%20-%20Web%20Tasar%C4%B1m%20-%20Yaz%C4%B1l%C4%B1m%20Geli%C5%9Ftirme%20ve%20Kurumsal%20Bar%C4%B1nd%C4%B1rma%20Ajans%C4%B1!5e0!3m2!1str!2str!4v1720172738032!5m2!1str!2str" style="height: 430px; width: 100%;" margin="50px"></iframe>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">İletişim Formu</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('communication.send') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Adınız</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">E-posta Adresiniz</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Mesajınız</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
