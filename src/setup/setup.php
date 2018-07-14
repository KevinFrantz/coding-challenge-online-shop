<?php 
    use core\Core;
    
    require __DIR__. '/../vendor/autoload.php';
    
    /**
     * Maintainance script - Not written nice ;)
     **/
    
    function loadAndExec(string $file){
        $core = new Core();
        $pdo = $core->getDatabase();
        echo "Create database $file...\n";
        $pdo->exec(file_get_contents(__DIR__.'/database/'.$file.'.sql'));
    }
    
    echo "Create databases...\n";
    foreach(['order_product','order','product','user'] as $file){
        loadAndExec($file);
    }
    
?>