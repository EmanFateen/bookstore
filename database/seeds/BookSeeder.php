<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookSeeder extends Seeder
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
                $founded = DB::table('publishers')->where(
                    'name' ,"=", $row[11]
                )->pluck('id');

                DB::table('books')->insert([
                    'book_id' => $row[0],
                    'title' => $row[1],
                    'avarage_rating' => $row[3],
                    'language_code' => $row[6],
                    'num_pages' => $row[7],
                    'rating_count' => $row[8],
                    'text_reviews_count' => $row[9],
                    'published_at' => Carbon::parse($row[10])->format('Y-m-d'),
                    'publisher_id' => $founded[0],
                ]);
            
            }
            else
                break;    
        }
    }
}
