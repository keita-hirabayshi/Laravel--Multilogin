<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceContainerTest(){
    // ライフサイクルテストの設定方法(bindメソッドを用いる)
        app()->bind('lifeCycleTest',function(){
            return 'ライフサイクルテスト';
        });
    // サービスコンテナの出力
        $test = app()->make('lifeCycleTest');

        // サービスコンテナなし
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        // サービスコンテナapp()あり
        app()->bind('sample', Sample::class);
        // $sample = app()->make('sample');
        // $sample->run();

        dd($test,app());
    }
}

class Sample
{
    public $message;
    public function __construct($message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}
class Message
{
    public function send(){
        echo ('メッセージ表示');
    }
}
