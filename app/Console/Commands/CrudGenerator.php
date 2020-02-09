<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Artisan;

class CrudGenerator extends Command
{



    protected $signature = 'Crud:Generator {name : Class (singular) for example User}';




    protected $description = 'Create Crud Operations';




    public function __construct()
    {
        parent::__construct();
    }



     public function handle(){
    $name = $this->argument('name');
   $this->model($name);
   $this->controller($name);
   $this->request($name);

   File::append(base_path('routes/api.php'), "\rRoute::resource('" . Str::plural(strtolower($name)) . "', '{$name}Controller');");
   Artisan::call('make:migration create_'. strtolower(Str::plural($name)) .'_table --create='. strtolower(Str::plural($name)));
  }

  protected function getStub($type){
   return file_get_contents(resource_path("stubs/$type.stub"));
  }

  protected function model($name){
   $plantilla = str_replace(
    ['{{modelName}}']
    ,[$name]
    ,$this->getStub('Model')
   );
   file_put_contents(app_path("/{$name}.php"), $plantilla);
  }

  protected function controller($name){
   $plantilla = str_replace(
    [
     '{{modelName}}'
                ,'{{modelNamePluralLowerCase}}'
                ,'{{modelNameSingularLowerCase}}'
    ],[
     $name
     ,strtolower(Str::plural($name))
     ,strtolower($name)
    ],
    $this->getStub('Controller')
   );
   file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $plantilla);
  }
  protected function request($name){
    $plantilla = str_replace(
       ['{{modelName}}']
       ,[$name]
       ,$this->getStub('Request')
    );

    if(!file_exists($path = app_path('/Http/Requests')))
       mkdir($path, 0777, true);

    file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $plantilla);
  }
}
