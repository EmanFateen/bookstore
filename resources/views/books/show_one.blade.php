@extends('layouts.master')
@extends('includes.navbar')



@section('content')
<div class="container-fluid">
    <div class="row book-details mb-5">
        <div class="col-12 col-md-12 col-lg-6 mt-5">
            <img src="https://graphicburger.com/wp-content/uploads/2013/11/Hard-Cover-Book-MockUp-full.jpg" class="card-img-top" alt="...">
        </div>
        <div class="col-12 col-md-12 col-lg-6 mt-5">
            <div class="row">
                <div class="col-9">
                    <p class="book-details-title">Book Title</p>
                    <h5 class="book-details-content">{{ $book->title }}</h5>
                </div>
            </div>            
            <hr> 
            <p class="book-details-title">Avarage Rating: 
            <span class="book-details-content">{{ $book->avarage_rating }}</span></p>

            <div class="row">
                <div class="col-6">
                    <p class="book-details-title">Number Of ratings:
                    <span class="book-details-content">{{ $book->rating_count }}</span></p>
                </div>
                <div class="col-6">
                    <p class="book-details-title">Number Of reviews: 
                    <span class="book-details-content">{{ $book->text_reviews_count }}</span></p> 
                </div>
            </div>

            <hr>
           
         
            <div class="row">
                <div class="col-6">
                    <p class="book-details-title">Publisher Name</p>
                    <a class="book-details-content" href="#publisher">{{ $book->publisher->name }}</a>
                </div>
                <div class="col-6">
                    <p class="book-details-title">Authors</p>
                        @foreach($book->authors as $author)
                            <a class="book-details-content" href="#author_{{ str_replace(" ","_",$author->name) }}">{{ $author->name }} </a><br>
                        @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-6">
            <p class="book-details-title">Published at:
            <span class="book-details-content">{{ Carbon\Carbon::parse($book->published_at)->format('d-m-Y') }}</span></p>
            </div>
            <div class="col-6">
                    <p class="book-details-title">Number Of pages: 
                    <span class="book-details-content">{{ $book->num_pages }}</span> </p>
            </div>
            </div>
         


        </div>
    </div>

    <hr  id="publisher">
    <h6  class="author-publisher-title"> Publisher books - {{$book->publisher->name}} </h6>
    <div class="container-wrapper">
        <div class="row mt-3 mb-5" >
            <div class="row">
                @foreach($book->publisher->books as $book)
                    <div class="col-12 col-md-6 col-lg-3 mt-4">
                        <div class="card">
                            <img src="https://graphicburger.com/wp-content/uploads/2013/11/Hard-Cover-Book-MockUp-full.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">@if(strlen($book->title)>43){{ substr( $book->title ,0,40).'...'}}@else {{$book->title}} @endif</h5>
                                <a href="{{route('book.show',$book->id)}}" class="btn btn-success">View Book detials</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 
    @foreach($book->authors as $author)
    <hr  id="author_{{str_replace(" ","_",$author->name)}}">
    <h6 class="author-publisher-title">{{$author->name}}'s Books </h6>
    <div class="container-wrapper">
        <div class="row mt-3 mb-5" >
            <div class="row">
                @foreach($author->books as $book)
                    <div class="col-12 col-md-6 col-lg-3 mt-4">
                        <div class="card">
                            <img src="https://graphicburger.com/wp-content/uploads/2013/11/Hard-Cover-Book-MockUp-full.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">@if(strlen($book->title)>43){{ substr( $book->title ,0,40).'...'}}@else {{$book->title}} @endif</h5>
                                <a href="{{route('book.show',$book->id)}}" class="btn btn-success">View Book detials</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
    @endforeach
   
      
</div>
@endsection