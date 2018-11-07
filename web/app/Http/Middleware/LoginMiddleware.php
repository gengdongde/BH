<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * admin后台登录.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        //检测是否有登录
        if(empty(session('login.name'))){
            return redirect('/admin/login');
        }
        if(session('id') != '1'){
            $urle = [];
        //判断权限  处理修改的权限
        $res = preg_match('/\/{1}\w+\/{1}(\d+)\/\w+/',$request->path(),$edit);
        if($res){
            foreach (session('urls') as $k => $v) {
                $vv = ltrim($v,'/');
                if(preg_match('/\/{1}\w+\/{1}(\d+)\/\w+/',$vv,$e)){
                    $urle[] = str_replace($e[1],$edit[1],$vv);
                }
            }
                $is_edit = in_array($request->path(),$urle);            
        }
        
            //处理 xxx/xxxx/id 的路由 delete 
            $dels = preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$request->path(),$del);
            if($dels && $request->isMethod("DELETE")){
                foreach (session('urls') as $k => $v) {
                $vv = ltrim($v,'/');
                    if(preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$vv,$de)){
                        $urle[] = str_replace(1,$del[1],$vv);
                    }
                }
                $is_del = in_array($request->path(),$urle);
            }             
            $shq = preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$request->path(),$shqy);
            if($shq && $request->isMethod("GET")){
                foreach (session('urls') as $k => $v) {
                $vv = ltrim($v,'/');
                    if($sb = preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$vv,$de)){
                        $urle[] = str_replace(3,$shqy[1],$vv);
                    }
                }
                $is_shq = in_array($request->path(),$urle);
            }            
            // update
            $up = preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$request->path(),$upd);
            if($up && $request->isMethod('PUT')){
                foreach (session('urls') as $k => $v) {
                $vv = ltrim($v,'/');
                    if(preg_match('/\w+\/{1}\w+\/{1}(\d+)/',$vv,$ups)){
                        $urle[] = str_replace(2,$upd[1],$vv);
                    }
                }
                $is_put = in_array($request->path(),$urle);
            }
            //处理 xxx/xxxx/xxxx/id 的路由
            $shs = preg_match('/\w+\/{1}\w+\/{1}\w+\/{1}(\d+)/',$request->path(),$sh);
            if($shs){
                foreach (session('urls') as $k => $v) {
                $vv = ltrim($v,'/');
                    if(preg_match('/\w+\/{1}\w+\/{1}\w+\/{1}(\d+)/',$vv,$de)){
                        $urle[] = str_replace($de[1],$sh[1],$vv);
                    }
                }
                $is_sh = in_array($request->path(),$urle);
            }

        $acc = true;
        if(!in_array('/'.$request->path(),session('urls'))){
            $acc = false;
            if(!empty($is_edit)){
                if(!$is_edit){
                    $acc = false;
                }else{
                    $acc = true;
                }
            }

            if(!empty($is_del)){
                if(!$is_del){
                    $acc = false;
                }else{
                    $acc = true;
                }
            }            
            if(!empty($is_shq)){
                if(!$is_shq){
                    $acc = false;
                }else{
                    $acc = true;
                }
            }

            if(!empty($is_sh)){
                if(!$is_sh){
                    $acc = false;
                }else{
                    $acc = true;
                }
            }            
            if(!empty($is_put)){
                if(!$is_put){
                    $acc = false;
                }else{
                    $acc = true;
                }
            }

        }
         // dd($is_del);
        // strpos($request->path(), 'edit');
        if(!$acc){
            return view('admin.login.access',['title'=>' ']);

        }
        }
        // if(){
        //     return view('admin.login.access',['title'=>' ']);
        // }
        //获取session中可访问的路由地址
        // $url = session('urls');
        return $next($request);
    }
}
