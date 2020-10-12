<?php
use App\Post;

function check_user_permissions($request, $actionName = NULL, $id= NULL){
            //current user
            $currentUser = $request->user();

            //current action name
            if($actionName){
                $currentActionName = $actionName;
            }
            else{

                //get current action name
                $currentActionName = $request->route()->getActionName();
            }

            list($controller, $method) = explode('@', $currentActionName);
            $controller = str_replace(["App\\Http\\Controllers\\Backend\\","Controller"],"",$controller);
            
            $crudPermissionMap = [
                'crud' => ['create','store','edit', 'update', 'destroy', 'restore','forceDestroy','index','view']
            ];
    
    
            $classesMap = [
                'Admin' => 'post',
                'Categories' => 'category',
                'Users' => 'user'
            ];
    
    
            foreach($crudPermissionMap as $permission => $methods){
                //if the current method exists in the method lists
                //we will check the permission
                if(in_array($method,$methods) && isset($classesMap[$controller])){
                    $controller = $classesMap[$controller];
                    if($controller == 'post' && in_array($method,['edit','update','destroy','restore','forceDestroy'])){
                         
                        $id = !is_null($id) ? $id : $request->route("other");
                        //if the current user has not permission to update-others-post/delete-others-post permission
                         //make sure to keep him away from modifying others posts
                         if( ($id) && (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post'))){
                            $post = Post::withTrashed()->find($id);
                            if($post->author_id !== $currentUser->id){
                                return false;
    
                            } 
                         } 
                    }
                    //if the current user has not permission don't allow the permission
                    elseif(!$currentUser->can("{$permission}-{$controller}")){
                        return false;
                    }
                break;
                    // dd("{$permission}-{$controller}");
                }
            }
            
            return true;
}