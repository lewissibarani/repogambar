  @push('pushcss')
  <style>   
    .wrapper_this_div {
      background-color: #fff;
      margin: 0;
      padding: 0;  
    }

    .container-custom { 
      display: flex;
      align-items: right;
      justify-content: right; 
    } 

    .message h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .message p {
      font-size: 1.1rem;
      font-weight: 500;
    }

    .image-side img {
      max-width: 80%; 
      height: auto;
    }

    @media (max-width: 100%) {
      .container-custom {
        flex-direction: column;
        text-align: center; 
      }
    }

    .btn-return {
      margin-top: 2rem;
      background-color: #5b35f0;
      color: white;
      padding: 0.6rem 2rem;
      border: none;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
    }

    .btn-return:hover {
      background-color: #472dbd;
      color: white;
    }
 

</style>  

@endpush
  

<div class="wrapper_this_div">
    <div class="container container-custom" style="padding:0px margin:0px;">
        <div class="row align-items-center w-100">
            <!-- Left Column: Message -->
            <div class="col-md-6 message text-center" style="  margin:0px; padding:0px;">
                <h1 class="display-1" style="font-size: 6rem;     line-height: 1.1;" >Maaf</h1>
                <p class ="fw-light">Satker anda tidak mendapatkan lisensi adobe <br> untuk periode tahun <span class="fw-bold">2024-2025 </span> ini,</p>
                <p class ="fw-light">Jika ini merupakan kesalahan silahkan<br>menghubungi admin <span class="fw-bold">(0821-9149-2198)</span>.</p> 
            </div> 
            <!-- Right Column: Image -->
            <div class="col-md-6 image-side text-end" style=" margin:0px; padding:0px;">
                <img src="{{ asset('img\background\background-information.jpg') }}" alt="Detective illustration">
            <!-- Replace with your actual image path -->
            </div>
        </div>
    </div>
</div>  
