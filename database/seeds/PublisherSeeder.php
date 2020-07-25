<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
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

            if($row[11] != ""){
                // check on that publisher name 
                $founded = DB::table('publishers')->where(
                    'name' ,"=", $row[11]
                )->get('id');
                if(!isset($founded[0])){
                    DB::table('publishers')->insert([
                        'name' => $row[11],
                    ]);
                }
            }
            else
                break;    
        }
    
    }
}
