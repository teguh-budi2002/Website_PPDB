<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    *,html,body {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      font-family: 'Roboto Condensed', sans-serif;
    }

    main {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
    }

    .header-txt {
      text-align: center;
      font-size: 18px;
      font-weight: 800;
      text-transform: uppercase;
      margin-top: 60px;
    }

    .date {
      text-align: center;
      font-size: 18px;
      font-weight: 800;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .container {
      width: 80%;
      height: auto;
      padding: 20px;
      border: 4px solid #1a1a1a;
      margin-left: auto;
      margin-right: auto;
    }

    .wrapper {
      border: 1px solid #1a1a1a;
      padding: 10px;
    }

    .instance {
      width: 100%;
      margin-top: 10px;
      margin-bottom: 20px;
      text-align: center;
    }

    .logo {
      display: block;
      width: auto;
      height: 80px;
      margin-bottom: 10px;
      margin-left: auto;
      margin-right: auto;
    }

    .instance_name {
      font-weight: 700;
      font-style: normal;
      font-size: 24px;
      margin-top: 5px;
    }

    .prefix_instance {
      color: rgb(242, 70, 70);
    }

    .student_identity {
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .student_identity p {
      margin-bottom: 8px;
    }
    
    .left-txt {
      font-weight: 800;
      color: rgb(72, 72, 72);
    }

    .right-txt {
      font-weight: 500;
      color: rgb(102, 104, 107);
     }

     .congrats {
      text-align: center
     }

     .congrats p { 
      font-weight: 600;
      font-size: 18px;
      text-transform: uppercase;
      color: rgb(57, 57, 57);
     }
  </style>
</head>
<body>
  <main>
    <p class="header-txt">Bukti Penerimaan Peserta Didik Baru (PPDB)</p>
    <p class="date">Tahun Ajaran {{ Carbon\Carbon::now()->format('Y') }}-{{ Carbon\Carbon::now()->addYear()->format('Y') }}</p>
    <div class="container">
      <div class="wrapper">
        <div class="instance">
          <img src="{{ asset('img/logo.png') }}" class="logo" alt="logo GIS">
          <p class="instance_name"><span class="prefix_instance">G</span>uh <span class="prefix_instance">I</span>nternational <span class="prefix_instance">S</span>chool</p>
        </div>
        <hr>
        <div class="student_identity">
          <p class="left-txt">Nama Peserta: <span class="right-txt">{{ Auth::user()->fullname }}</span></p>
          <p class="left-txt">NISN: <span class="right-txt">{{ Auth::user()->nisn }}</span></p>
          <p class="left-txt">Tempat/ Tgl. Lahir: <span class="right-txt">{{ Auth::user()->birth_place . ", " . Carbon\Carbon::parse(Auth::user()->birth_day)->format('d F Y') }}</span></p>
          <p class="left-txt">No HP/WA: <span class="right-txt">{{ Auth::user()->phone_number }}</span></p>
        </div>
        <hr>
        <div class="congrats">
          <p>Selamat Anda Telah Diterima Sebagai Peserta Didik Baru Di Sekolah GUH INTERNATIONAL SCHOOL (GIS) Melalui Jalur Reguler</p>
        </div>
      </div>
    </div>
  </main>
</body>
</html>