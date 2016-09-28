<?php

namespace App\Http\Controllers;

use App\contact;
use App\post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPost($id, $user_id)
    {
        $user = User::find($user_id);
        $contact = contact::find($id);
        return view('post.create', compact('contact', 'user'));
    }

    public function storePost(Request $request,$id)
    {
        $contact = contact::find($id);
        $users = User::all();
        //return $contact;
        $flag = 0;
        foreach ($users as $user) {
            if ($user->phone_number == $contact->phone_number) {
                $flag = 1;
                break;
            }
        }

        if ($flag == 0) {
            return view('post.error',compact('contact'));
        }
        if ($flag == 1) {
            $this->validate($request,[
                'text'=>'required',
                'picture_name'=>'image|max:2048',
            ]);

            $pic_name=$request->file('picture_name');
            if(isset($pic_name)){
            $filename=$pic_name->getClientOriginalName();
            $filenameDontRetretive=time().$filename;
            $success=$pic_name->move(public_path().'/Uploads/',$filenameDontRetretive);
            if($success) {
                $post = new post;
                $post->destination_user_id = $user->id;
                $post->creator_post_id = Auth::user()->id;
                $post->text = trim($request->input('text'));
                $post->picture_name = $filenameDontRetretive;
                $post->time_visit =0;
                $post->save();
                $path = '/contacts/' . $contact->id . '/show/'.User::find(Auth::user()->id)->id.'/sent';
                return redirect($path);
            }

                }
            $post = new post;
            $post->destination_user_id = $user->id;
            $post->creator_post_id = Auth::user()->id;
            $post->text = trim($request->input('text'));
            $post->picture_name ='';
            $post->time_visit = 0;
            $post->save();
            $path = '/contacts/' . $contact->id . '/show/'.User::find(Auth::user()->id)->id.'/sent';
            return redirect($path);
            }
        }
    public function showInbox($id_contact,$user_id)
    {
        $posts=post::all()->sortByDesc('created_at');
        $contact=contact::find($id_contact);
        $user=User::find($user_id);
        $users=User::all();
        $contact_u='';
        $flag=0;
        foreach ($users as $u)
        {
            if ($u->phone_number==$contact->phone_number)
            {
                $flag=1;
                $contact_u=$u;
               break; 
            }

        }
        if($flag==0){return view('post.error',compact('contact'));}
        return view('post.showPost',compact('posts','contact_u','contact','user','users'));
    }

    public function Inbox()
    {
//        $data=Carbon::now()->addDay();
        //return Carbon::getLocale();
//        return $data;
        $posts=post::all()->sortByDesc('created_at');
       // $contact=contact::find($id);
        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        $users=User::all();
        return view('post.show',compact('posts','users','user'));
    }
    public function showSent($id_contact,$user_id)
    {
        $posts=post::all()->sortByDesc('created_at');
        $contact=contact::find($id_contact);
        $user=User::find($user_id);
        $users=User::all();
        $contact_u='';
        $flag=0;
        foreach ($users as $u)
        {
            if ($u->phone_number==$contact->phone_number)
            {
                $flag=1;
                $contact_u=$u;
                break;
            }

        }
        if($flag==0)
        {
            return view('post.error',compact('contact'));
        }
        return view('post.showSent',compact('posts','contact_u','contact','user','users'));
    }
    public function editPost($id_contact,$user_id,$post_id)
    {
       // $contact=contact::find($id_contact);
       // $user=User::find($user_id);
        $post=post::find($post_id);
        $post->time_visit=Carbon::now();
        $post->save();
        $path='/contacts/'.$id_contact.'/show/'.$user_id.'/inbox';
        return redirect($path);

    }
    public function postInbox($post_id)
    {
        $post=post::find($post_id);
        $post->time_visit=Carbon::now();
        $post->save();
        $path='/contacts/inbox';
        return redirect($path);
    }
}