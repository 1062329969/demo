<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $where = array(
//            array('sex','>',0),
//            array('email','!=','NULL'),
//        );
        $data['list'] = User::orderBy('id','desc')->paginate(5);
        return view('home/home',$data);
    }

    public function add(){
        return view('home/add');
    }

    public function doadd(Request $request){
        $data = $request->get('data');
        $User = new User();
//        getLastSql();
        $res = $User->insert($data);
        if($res){
            return redirect('home')->with('success','添加成功');
        }else{
            return redirect()->back();
        }
//        echo('<pre>');var_dump($data);die('</pre>');
    }

    public function delete(Request $request){
        $id = $request->get('id');
//        dd($id);
        $User = User::find($id);
//        User::where('id', '=', $id)->delete();

        if( $User->delete()){
            echo '删除成功';
        }else{
            echo '删除失败';
        }
    }

    public function edit(Request $request,$id){
        $info['user'] = User::find($id);
        if($request->isMethod('post')){
            $data = $request->get('data');
            User::where('id', $id)->update($data);
            return redirect('home')->with('success','添加成功');
        }else{
            $info['edit'] = 1;
            return view('home/add',$info);
        }
    }
}
