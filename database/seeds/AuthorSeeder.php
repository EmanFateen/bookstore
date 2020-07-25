<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first = 0; 
        $books = Storage::disk('local')->get('books.csv');
        $file = explode("\n",$books);
        for($i=1;$i<count($file)-1;$i++){
            $row =explode(",",$file[$i]);

            if($row[2] != ""){

                $authors =explode("/",$row[2]);

                for($j=0; $j<count($authors); $j++){
                    // check on that publisher name 
                    $founded = DB::table('authors')->where(
                        'name' ,"=", $authors[$j]
                    )->get('id');
                    if(!isset($founded[0])){
                        DB::table('authors')->insert([
                            'name' => $authors[$j],
                        ]);
                    }
                }
            }
            else
                break;    
        }
        
    }
}
