<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use DB;
use Exception;
use App\User;

class Appinit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init  {--local} {--seed} {--admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install or upgrade App --seed 数据迁移与填充 --local 本地模式 ';

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
     * @return mixed
     */
    public function handle()
    {
        system("php -r \"if (!file_exists('.env')) copy('.env.example', '.env');\"");
        $this->comment('Attempting to install or upgrade App.');
        $this->comment('Remember, you can always install/upgrade manually following the guide here:');
        if (!config('app.key')) {
            $this->info('Generating app key');
            Artisan::call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }


        //本地模式
        if ($this->option('local') ){

            $this->comment('App data init');

            system('yarn install');
        }else{
            $this->comment('local develop -- skipping');
        }
        if ($this->option('seed') ) {
            $this->info('Migrating database');
            $this->info('Seeding initial data');

            try {
                User::count();
            } catch (Exception $e) {
                $this->error('Unable to connect to database.');
                $this->error('Please fill valid database credentials into .env and rerun this command.');
                return;
            }


            Artisan::call('migrate', ['--force' => true]);

            if (!User::count()) {
                Artisan::call('db:seed', ['--force' => true]);
            } else {
                $this->comment('Data seeded -- skipping');
            }

        }
        //admin 初始化
        if ($this->option('admin') ) {
            Artisan::call('admin:install');
        }

        $this->comment('🎆 Success! You can now run app from localhost with `php artisan serve`.');

    }

    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';

        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

        $contentArray->transform(function ($item) use ($data){
            foreach ($data as $key => $value){
                if(str_contains($item, $key)){
                    return $key . '=' . $value;
                }
            }

            return $item;
        });

        $content = implode($contentArray->toArray(), "\n");

        \File::put($envPath, $content);
    }
}
