<?php

use Illuminate\Database\Seeder;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Storage::disk('local')->get('books.csv');
        $file = explode("\n",$books);
        for($i=1;$i<count($file)-1;$i++){
            $row =explode(",",$file[$i]);

            if($row[0] != ""){
                // check on that publisher name 
                $founded_book = DB::table('books')->where(
                    'book_id' ,"=", $row[0]
                )->pluck('id');

                $authors =explode("/",$row[2]);

                for($j=0; $j<count($authors); $j++){

                    // check on that publisher name 
                    $founded_author = DB::table('authors')->where(
                        'name' ,"=", $authors[$j]
                    )->pluck('id');

                    //dd($founded_author[0]);
                    DB::table('book_author')->insert([
                        'book_id' => $founded_book[0],
                        'author_id' => $founded_author[0],
                    ]);

                }
              
            
            }
            else
                break;    
        }
    }
}
