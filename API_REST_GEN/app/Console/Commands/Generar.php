<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Query;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\api_Key;
class Generar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Generar:modelos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        shell_exec("composer install");
        $x = new Query();
        $x = $x->cantidad();
        $y = new Query();
        $y = $y->nombres();
          
        $a = new Query();
        $a = $a->crear();
        $name = [];
        $this->call("migrate");
        $this->call('passport:install');
        for ($i = 0; $i < $x; $i++) {
            $z = $y[$i];
            if($z == "apikey" or $z == "oauth_refresh_tokens" or $z == "oauth_refresh_tokensController" or $z == "failed_jobs" or $z == "migrations" or $z == "oauth_access_tokens" or $z == "oauth_auth_codes" or $z == "oauth_clients" or $z == "oauth_personal_access_clients" or $z == "password_resets" or $z == "personal_access_tokens" or $z == "users"){
                continue;
            }
            $this->info($z);
            $this->call('krlove:generate:model', [
                
                'class-name' => $z,'--table-name' => $z, '--output-path' => 'Models', '--namespace' => 'App\Models', '--no-timestamps' => TRUE
            ]);
        }


        $this->call('optimize');
        for ($i = 0; $i < $x; $i++) {
            if($y == "apikey" or $y == "oauth_refresh_tokens" or $y == "oauth_refresh_tokensController" or $y == "failed_jobs" or $y == "migrations" or $y == "oauth_access_tokens" or $y == "oauth_auth_codes" or $y == "oauth_clients" or $y == "oauth_personal_access_clients" or $y == "password_resets" or $y == "personal_access_tokens" or $y == "users"){
                continue;
            }
            $this->call('api:generate', [
                '--model' => $y[$i]
            ]);
            $name = $y[$i];
            $tables = DB::insert("insert into apiRest.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'GET', 'http://127.0.0.1:8000/api/$name')");
        $tables = DB::insert("insert into apiRest.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'POST', 'http://127.0.0.1:8000/api/$name')");
        $tables = DB::insert("insert into apiRest.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'PUT', 'http://127.0.0.1:8000/api/$name/{{$name}}')");
        $tables = DB::insert("insert into apiRest.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'DELETE', 'http://127.0.0.1:8000/api/$name/{{$name}}')");
   
           }
           
        $this->call('optimize');
        $dir = dirname( dirname(dirname(__FILE__))) . "/Models";
        $files2 = scandir($dir, 1);
        $name = array();
        foreach($files2 as $item){
            if($item == ".." || $item == "." || $item == "User.php" || $item == "api_Key.php"){
                continue;
            }
            $item = substr($item, 0, -4);
            $name[] = $item;
            $dir2 = dirname(dirname(dirname(__FILE__))) . '/Http/Controllers/Api/' . $item . "Controller.php";
            $abrir = fopen($dir2, 'r+');
            $contenido = fread($abrir, filesize($dir2));
            fclose($abrir);
            $contenido2 = explode("\n", $contenido);
            $p = "$";
            $r = "request";
            $i = "ID";
            $u = lcfirst($item);
            $contenido2[44] = "public function show($p$i){ ";
            $variable1 = "$p$u = $item::find($p$i);";
            $contenido2[45] = $variable1; 
            $variable1 = "public function update(Request $p$r, $p$i){"; 
            $contenido2[56] = $variable1;
            $variable1 = "$p$u = $item::find($p$i);";
            $contenido2[57] = $variable1;
            $variable1 = "public function destroy($item $p$u, $p$i){";
            $contenido2[70] = $variable1;
            $variable1 = "$p$u = $item::find($p$i);";
            $contenido2[71] = $variable1;
            $nuevo = implode("\n", $contenido2);    
            file_put_contents($dir2, $nuevo);
        }
        $this->call('optimize');
        $dir3 = dirname(dirname(dirname(dirname(__FILE__)))) . "/routes/api.php";
        $abrir2 = fopen($dir3, 'r+');
        $contenido3 = fread($abrir2, filesize($dir3));
        fclose($abrir2);
        $contenido2 = explode("\n", $contenido3);
        
        $key = array_search("#ind", $contenido2);
        $this->info($key);
        $key += 1;
        $contenido2[$key] = "Route::group(['middleware' => 'modkey.valid'], function () {";
        foreach($name as $n){
            $key += 1;
            $m = lcfirst($n);
            $cn = "Controller";
            $fr = "Route::apiResource('$m', $n$cn::class, ['except' => ['index','show']]);";
            $contenido2[$key] = $fr;
        }
        $key += 1;
        $contenido2[$key] = "});";
        $key += 1;
        $contenido2[$key] = "Route::group(['middleware' => 'apikey.valid'], function () {";
        foreach($name as $n){
            $key += 1;
            $m = lcfirst($n);
            $cn = "Controller";
            $fr = "Route::apiResource('$m', $n$cn::class, ['only' => ['index','show']]);";
            $contenido2[$key] = $fr;
        }
        $key += 1;
        $contenido2[$key] = "});";
        $nuevo2 = implode("\n", $contenido2);    
        file_put_contents($dir3, $nuevo2);
        $this->call('optimize');
        $User = new User();
        if(api_Key::all() == "[]"){
        $tokA = $User->createToken("Admin", ['Admin'])->accessToken;
        $tokU = $User->createToken("User", ['User'])->accessToken;
        $this->info("Token Admin: ". $tokA);
        $this->info("Token User: ". $tokU);
        $api_Key = new api_Key();
        $api_Key->key = $tokA;
        $api_Key->role = "Admin";
        $api_Key ->save();
        $api_k = new api_Key();
        $api_k->key = $tokU;
        $api_k->role = "User";
        $api_k ->save();   
        }
    }
}
