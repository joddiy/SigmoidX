<?php
/**
 * author:       joddiyzhang <joddiyzhang@gmail.com>
 * createTime:   2018-12-13 22:02
 * fileName :    SsController.php
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class SsController extends Controller
{
    public function actionCreateUser($port = 0, $limit = "1G")
    {
        $pwd = $this->randomPassword();
        $output = shell_exec("sudo /home/ss-bash-master/ssadmin.sh add {$port} {$pwd} {$limit}");
        echo "add user {$port} {$pwd}";
    }

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
