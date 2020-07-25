@extends('layouts.master')
@extends('includes.navbar')



@section('content')
<div class="container-wrapper">


        <div class="slideshow-container mt-3">

            <div class="mySlides  active">
                <img src="https://1.bp.blogspot.com/-7x_GMdOQQYs/WUPfUi1KPrI/AAAAAAAABag/jseFmXHAKG0DT2r0fV0Mg19KKdRqAGj_wCLcBGAs/s1600/2017-688%2Bbanner2%2B1500x760.png" style="width:100%; height:250px">
            </div>

            <div class="mySlides">
                <img src="/slide2.jpeg" style="width:100%; height:250px">
            </div>

            <div class="mySlides">
                <img src="/slide3.jpg" style="width:100%; height:250px">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>

        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
        </div>

    

    <div class="row">
        @foreach($books as $book)
            <div class="col-12 col-md-6 col-lg-3 mt-3 mb-5">
                <div class="card">
                    <img src="https://graphicburger.com/wp-content/uploads/2013/11/Hard-Cover-Book-MockUp-full.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">@if(strlen($book->title)>47){{ substr( $book->title ,0,44).'...'}}@else {{$book->title}} @endif</h5>
                        <a href="{{route('book.show',$book->id)}}" class="btn btn-success">View Book detials</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
    </script>

</div>

@endsection
