<?php
class ServerSpecifics
{
    protected $serverURL = 'https://ai-analytics.n2a.mx/IPS/api/v1';

    protected $webpageURL = 'https://ai-analytics.n2a.mx/IPS';

    //DB connection LOCAL
    protected $dbHost = "localhost";
    protected $dbUser = "root";
    protected $dbPwd = "D3Vel0P3r*N2A*MYSQLR00T";
    protected $dbName = "ips";


    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance() : ServerSpecifics
    {
        if (self::$instance == null) {
            self::$instance = new ServerSpecifics();
        }
        return self::$instance;
    }


    public function fnt_getDBConnection() : mysqli | bool
    {

        $dbconn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPwd, $this->dbName);
        $dbconn->set_charset('utf8');
        return $dbconn;

    }

    public function fnt_getServerURL() : string
    {
        return $this->serverURL;
    }

    public  function fnt_getWebPageURL() : string
    {
        return $this->webpageURL;
    }

}
