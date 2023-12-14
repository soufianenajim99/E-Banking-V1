<?php

const CONFIG = [
    'db'=>'mysql:host=localhost;dbname=bank_db_br7',
    'db_user' => 'root',
    'db_password' => ''
];



class DataProvider {
    public function connect() {
        try {
            $dsn = CONFIG['db'];
            $username = CONFIG['db_user'];
            $password = CONFIG['db_password'];

            return new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            // Log or handle the exception appropriately
            error_log('Connection failed: ' . $e->getMessage());
            return null;
        }
    }

        
    
    // protected function connect() {
    //     try {
    //        return new PDO(CONFIG['db'],CONFIG['db_user'],CONFIG['db_password']);

    //     } catch (PDOException $e) {
    //         return null;
    //     }
    // }
}



function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
?>