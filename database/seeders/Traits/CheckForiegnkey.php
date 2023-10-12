<?
namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait CheckForiegnkey{

    public function disableForiegnKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }

    public function enableForiegnKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
