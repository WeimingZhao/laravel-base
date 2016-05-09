<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Excel;
use DB;

class ExcelController extends Controller
{
    //Excel文件导出功能 By Laravel学院
    public function export(){
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }


public function import(){
    $filePath = 'storage/ExcelFile/'.iconv('utf-8', 'gbk//IGNORE', 'test01').'.xls';
    Excel::load($filePath, function($reader) {
        $data = $reader->all()->toArray();

 /*               DB::table('users')->insert([
            ['user_code'=>'101201801002','realname'=>'张1','student_id' => '2018102'],
            ['user_code'=>'101201801003','realname'=>'张2','student_id' => '2018103'],
            ['user_code'=>'101201801004','realname'=>'张3','student_id' => '2018104'],
        ]);
*/
        $batch = time();
        foreach($data as $key => $value)
        {
            unset($data[$key]['school']);
            unset($data[$key]['grade']);
            unset($data[$key]['class']);
            unset($data[$key]['order']);
            $data[$key]['batch'] = $batch;
        }
        foreach($data as $key => $value)
        {
            if($key < 4)
                unset($data[$key]);
        }
        DB::table('users')->insert($data);
    });
}

}