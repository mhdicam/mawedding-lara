<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'author' => 'required',
            'comment' => 'required'
        ]);
    
        try {
            $author = strip_tags($request->author);
            $comment = strip_tags($request->comment);

            Comment::create([
                'nama' => $author,
                'komentar' => $comment
            ]);

            $data = '<li class="comment even thread-even depth-1 cui-item-comment" id="cui-item-comment-311"  data-likes="0">
                        <div id="cui-comment-311" class="cui-comment cui-clearfix">
                            <div class="cui-comment-avatar"><img src=""></div>

                            <div class="cui-comment-content">
                                <div class="cui-comment-info">
                                    <a class="cui-commenter-name" title="'.$author.'">'.$author.'</a>
                                    <span class="cui-post-author-mark cui-post-author-"></span>                
                                </div>
                                <div class="cui-comment-text">
                                    <p>'.$comment.'</p>
                                </div>
                                <div class="cui-comment-actions">
                                    <span class="cui-comment-time"><i class="far fa-clock"></i>
                                        baru saja
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>';

            return response()->json(['data' => $data, '_token' => csrf_token()]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function list(Request $request)
    {
        $comments = Comment::orderBy('id', $request->order)->limit($request->get ?? 50)->get();

        $data = '';

        foreach ($comments as $comment) {
            $data .= '<li class="comment even thread-even depth-1 cui-item-comment" id="cui-item-comment-'. $comment->id .'" data-likes="0">
                                <div id="cui-comment-'. $comment->id .'" class="cui-comment cui-clearfix">
                                    <div class="cui-comment-avatar">
                                        <img src="">
                                    </div>
                                    <div class="cui-comment-content">
                                        <div class="cui-comment-info">
                                            <a class="cui-commenter-name" title="'. $comment->nama .'">'. $comment->nama .'</a>
                                            <span class="cui-post-author-mark cui-post-author-"></span>                
                                        </div>
                                        <div class="cui-comment-text">
                                            <p>'. $comment->komentar .'</p>
                                        </div>

                                        <div class="cui-comment-actions">
                                            <span class="cui-comment-time">
                                                <i class="far fa-clock"></i> '.$comment->created_at->locale('id')->diffForHumans().
                                            '</span>
                                        </div>
                                    </div>
                                </div>
                                </li>';
        }
        
        return response()->json(['data' => $data, '_token' => csrf_token()]);
    }
}
