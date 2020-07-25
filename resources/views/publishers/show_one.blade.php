@extends('layouts.master')
@extends('includes.navbar')



@section('content')
<div class="container-wrapper">
<p class="mt-4 page-title" > Publishers Page</p>

    <div class="row mt-5 mb-3">
        <div class="col-12 col-md-6 col-lg-2 author-publisher-list" >
        <div class="mt-3">
            <p class="book-details-title">Publishers List:</p>
            @foreach($Publishers as $one_publisher)
                <a href="{{route('publisher.show',$one_publisher->id)}}">{{ $one_publisher->name }}</a>
                <br>
            @endforeach
        </div>
        </div>
        <div class="col-12 col-md-6 col-lg-9 mt-2 ml-4">
        <h6 class="author-publisher-name">{{$publisher->name}}'s Books </h6>
        <div class="row mt-5">
                @foreach($publisher->books as $book)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="https://graphicburger.com/wp-content/uploads/2013/11/Hard-Cover-Book-MockUp-full.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ substr( $book->title ,0,44).'...'}}</h5>
                                <a href="{{route('book.show',$book->id)}}" class="btn btn-success">View Book detials</a>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>
        </div>
    </div>    

</div>

@endsection
