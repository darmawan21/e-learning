@extends('pages.home')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="col-12">
                        <h6 class="mb-0">Informasi Ujian</h6>
                        <p class="text-end" style="margin-right: 20px;" id="waktu"></p>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('ujian.result', $ujian->id) }}" method="POST">
                        @csrf
                        <ul class="list-group">
                            @foreach ($ujian->soal as $soals)
                            <li class="list-group-item border-0 justify-content-star p-4 mb-2 bg-gray-100 border-radius-lg">
                                <strong># {{$loop->iteration}}</strong> {{$soals->soal}}
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="radio" name="{{ $soals->id }}" id="ujian{{ $soals->id }}1" value="pilihan1">
                                    <label class="form-check-label" for="ujian{{$ujian->id}}1">
                                        {{$soals->pilihan1}}
                                    </label>
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="radio" name="{{ $soals->id }}" id="ujian{{ $soals->id }}2" value="pilihan2">
                                    <label class="form-check-label" for="ujian{{$ujian->id}}2">
                                        {{$soals->pilihan2}}
                                    </label>
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="radio" name="{{ $soals->id }}" id="ujian{{ $soals->id }}3" value="pilihan3">
                                    <label class="form-check-label" for="ujian{{$ujian->id}}3">
                                        {{$soals->pilihan3}}
                                    </label>
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="radio" name="{{ $soals->id }}" id="ujian{{ $soals->id }}4" value="pilihan4">
                                    <label class="form-check-label" for="ujian{{$ujian->id}}4">
                                        {{$soals->pilihan4}}
                                    </label>
                                </div>
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="radio" name="{{ $soals->id }}" id="ujian{{ $soals->id }}5" value="pilihan5">
                                    <label class="form-check-label" for="ujian{{$ujian->id}}5">
                                        {{$soals->pilihan5}}
                                    </label>
                                </div> 
                            </li>
                            <hr class="horizontal dark">
                            
                            @endforeach 
                            <button class="btn btn-primary btn-sm w-100 ms-auto" type="submit" id="submit">Sumbit</button>
                        </ul>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("{{$ujian->waktu}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("waktu").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("submit").click();
  }
}, 1000);
</script>
@endsection
