<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Query;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $x = new Query();
        $x = $x->cantidad();
        $y = new Query();
        $y = $y->nombres();
        $name = [];

        for ($i = 0; $i < $x; $i++) {
            $this->call('krlove:generate:model', [
                'class-name' => $y[$i],'--table-name' => $y[$i], '--output-path' => 'Models', '--namespace' => 'App\Models', '--no-timestamps' => TRUE
            ]);
            $this->call('api:generate', [
                '--model' => $y[$i]
            ]);
            $name = $y[$i];
            $tables = DB::insert("insert into laravel3.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'GET', 'http://127.0.0.1:8000/api/$name')");
            $tables = DB::insert("insert into laravel3.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'POST', 'http://127.0.0.1:8000/api/$name')");
            $tables = DB::insert("insert into laravel3.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'PUT', 'http://127.0.0.1:8000/api/$name/{{$name}}')");
            $tables = DB::insert("insert into laravel3.dbo.Apis ([ApiTable], [ApiResource], [ApiUri]) values ('$name', 'DELETE', 'http://127.0.0.1:8000/api/$name/{{$name}}')");
        }

        $this->call('optimize');
    }
}
