<?php

namespace App\Http\Controllers\Web\Dashboard\Comment;

use App\Http\DataProviders\Web\Dashboard\Comment\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Comment\IndexRequest;
use App\Http\Requests\Web\Dashboard\Comment\StoreRequest;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentreply;
use App\Models\Newsfeedreplycommentlike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->ajax()) {
            if ($store = $request->persist()->getComment()) {
                $comments = Newsfeedcomment::where('id', $store->id)->get();
                $count = Newsfeedcomment::where('newsfeed_id', $store->newsfeed_id)->get()->count();
                $response = array();
                foreach ($comments as $comment) {

                    $output = '<ul id="comment-el-' . $comment->id . '" class="comments-list comments_list_' . $comment->newsfeed_id . '">
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">';
                    if (isset($comment->profileImage->profile_image)) {
                        $output .= '<img loading="lazy" src="' . url('images/profile', $comment->profileImage->profile_image) . '" width="40" height="40" alt="author">';
                    } else {
                        $output .= '<img loading="lazy" src="' . url('assets/dashboard/img/noimage.jpg') . '" width="36" height="36" alt="author">';
                    }

                    $output .= '<div class="author-date">
                                <a class="h6 post__author-name fn" href="#">' . ucwords($comment->NewsfeedUser->name) . '</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">';
                    $created = new Carbon($comment->created_at);
                    $diffInDays = Carbon::parse($comment->created_at)->diffInDays();
                    $showDiff = Carbon::parse($comment->created_at)->diffForHumans();

                    if ($diffInDays > 0) {
                        $showDiff .= ', ' . Carbon::parse($comment->created_at)->addDays($diffInDays)->diffInHours() . ' Hours';
                    }
                    $showDiff;
                    $output .=  '<p>' . ucwords($showDiff) . '</p> </time>
                                </div>
                            </div>';

                    if ($comment->user_id === Auth::user()->id) {
                        $output .= '<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></div>';
                    }

                    $output .= '</div>
                        <p class="comment-txt-' . $comment->id . '"> ' .  ucwords($comment->comment) . '</p>';
                    $commentLikeStatus = "";
                    foreach ($comment->NewsfeedcommentLike as $NewsfeedCommentLike) {
                        if (isset($NewsfeedCommentLike)) {
                            if ($NewsfeedCommentLike['user_id'] === Auth::user()->id) {
                                $commentLikeStatus = "commentLikeColor";
                            } else {
                                $commentLikeStatus = "";
                            }
                        }
                    }
                    $output .=  '<a href="javascript:void(0);" class="post-add-icon inline-items likeCommentPost" comment_id="' . $comment->id . '" newsfeed_id="' . $comment->newsfeed_id . '" route="' . route('newsfeed-comment-like') . '" users_id="' . Auth::user()->id . '">
                            <svg id="" class="olymp-heart-icon ' . $commentLikeStatus . ' commentlikeColor_' . $comment['id'] . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                            <span class="total_comment_like_count_' . $comment->id . '">' . $comment->NewsfeedcommentLike->count() . '</span>
                        </a>';
                    $output .=  '<a href="javascript:void(0)" class="reply comment_reply_btn" id="' . $comment->id . '">Reply</a>
                        <div>

                        <!-- Reply Comment Form  -->

                            <form class="inline-items comment-reply-form comment_reply_add_' . $comment->id . ' cr_' . $comment->id . '" route="' . route('comment_reply_add') . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $comment->newsfeed_id . '" comment_id="' . $comment->id . '" id="">
                                <div class="post__author author vcard inline-items">';
                    if (isset($userinfo->profile_image)) {
                        $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                    }

                    $output .= '<div class="form-group with-icon-right ">
                                        <textarea class="form-control comment-reply-text-' . $comment->id . '" id="comment-reply-text-' . $comment->id . '" name="comment" placeholder=""></textarea>
                                        <span class="text-danger comment-reply-error-' . $comment->id . '" id=""></span>
                                        <div class="add-options-message">
                                            <a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
                                                <svg class="olymp-camera-icon">
                                                    <use xlink:href="#olymp-camera-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

                                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_btn" id="' . $comment->id . '">Cancel</button>

                            </form>
                        <!-- ... end Reply Comment Form  -->
                        </div>';

                    $output .= '</li>
                    </ul>
                    <a href="javascript:void(0)" newsfeed_id = "' . $comment->newsfeed_id . '" route="' . route('view-more-comments') . '" class="more-comments view-more-comment-btn-' . $comment->newsfeed_id . '">View ' . ($count - 1) . ' more comments +</a>';

                    $output .= '<!-- ... end Comments -->';
                    $response[] = $output;
                }

                return response()->json(['status' => 'success', 'title' => 'Updated!', 'text' => 'Comment updated Successfully', 'data' => $response, "insertData" => $store]);
            }
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $response = Newsfeedcomment::where('id', $request->comment_id)->first();
            return response()->json($response);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (request()->ajax()) {
            $updateNewsfeedcomment = Newsfeedcomment::where('id', $request->comment_id)->update(['comment' => $request->input('textpost')]);
            return response()->json(['status' => 'success', 'title' => 'Updated!', 'text' => 'Comment updated Successfully']);
        }
        return errorWebResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (request()->ajax()) {
            $deleted_comment = Newsfeedcomment::where('id', $request->comment_id)->delete();
            return response()->json(['status' => 'success', 'title' => 'Deleted!', 'text' => 'You have succussfully delete comment.!']);
        }
        return errorWebResponse();
    }

    public function commentReplySave(Request $request)
    {
        // print_r($request->all()); exit;
        if (request()->ajax()) {
            $store = Newsfeedcommentreply::create(['newsfeed_id' => $request->newsfeed_id, 'user_id' => $request->user_id, 'comment_id' => $request->comment_id, 'reply_comment' => $request->comment]);
            $replyComments = Newsfeedcommentreply::where('id', $store->id)->get();
            $response = array();
            foreach ($replyComments as $replyComment) {
                if ($replyComment->comment_id == $request->comment_id) {
                    $output = '<ul id="del-reply-comment_' . $replyComment->id . '" class="comments-list">
                <li class="comment-item reply_comment_add_' . $replyComment->id . '">
                    <div class="post__author author vcard inline-items">';
                    if (isset($replyComment->profileImage->profile_image)) {
                        $output .= '<img loading="lazy" src="' . url('images/profile', $replyComment->profileImage->profile_image) . '" width="40" height="40" alt="author">';
                    } else {
                        $output .= '<img loading="lazy" src="' . url('assets/dashboard/img/noimage.jpg') . '" width="36" height="36" alt="author">';
                    }
                    $output .= '<div class="author-date">
                            <a class="h6 post__author-name fn" href="#">' . ucwords($replyComment->NewsfeedUser->name) . '</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">';
                    $created = new Carbon($replyComment->created_at);
                    $diffInDays = Carbon::parse($replyComment->created_at)->diffInDays();
                    $showDiff = Carbon::parse($replyComment->created_at)->diffForHumans();

                    if ($diffInDays > 0) {
                        $showDiff .= ', ' . Carbon::parse($replyComment->created_at)->addDays($diffInDays)->diffInHours() . 'Hours';
                    }
                    $output .=  '<p>' . ucwords($showDiff) . '</p> </time>
                                </time>
                            </div>
                        </div>';
                    if ($replyComment->user_id === Auth::user()->id) {
                        $output .= '<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="javascript:void(0)" route="' . route('edit-reply-comment', $replyComment->id) . '" class="edit-reply-comment" data-toggle="modal" data-target="#replyCommentModal" reply_comment_id="' . $replyComment->id . '" comment_id="' . $replyComment->comment_id . '">Edit Comments</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" route="' . route('delete-reply-comment', $replyComment->id) . '" class="delete-reply-comment" reply_comment_id="' . $replyComment->id . '" comment_id="' . $replyComment->comment_id . '">Delete Comment</a>
                                </li>
                            </ul>
                        </div>';
                    }
                    $output .= '</div>';
                    $replyCommentLikeStatus = "";
                    foreach ($replyComment->NewsfeedreplycommentLike as $NewsfeedReplyCommentLike) {
                        if (isset($NewsfeedReplyCommentLike)) {
                            if ($NewsfeedReplyCommentLike['user_id'] === Auth::user()->id) {
                                $replyCommentLikeStatus = "commentLikeColor";
                            }
                        }
                    }
                    $output .= '<p class="comment-reply-txt-' . $replyComment->id . '">' . ucwords($replyComment->reply_comment) . '</p>
                    <a href="javascript:void(0);" class="post-add-icon inline-items likeReplyCommentPost" comment_id="' . $replyComment->comment_id . '" reply_comment_id="' . $replyComment->id . '" newsfeed_id="' . $request->newsfeed_id . '" route="' . route('newsfeed-reply-comment-like') . '" users_id="' . Auth::user()->id . '">
                        <svg id="" class="olymp-heart-icon ' . $replyCommentLikeStatus . ' replycommentlikeColor_' . $replyComment->id . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                        <span class="total_reply_comment_like_count_' . $replyComment->id . '">' . $replyComment->NewsfeedreplycommentLike->count() . '</span>
                    </a>
                    <a href="javascript:void(0)" class="reply comment_reply_child_btn" id="' . $replyComment->id . '">Reply</a>

                    <div>

                <!-- Reply Comment Form  -->

                    <form class="inline-items comment-reply-child-form comment_reply_child_add_' . $replyComment->id . ' crc_' . $replyComment->id . '" route="' . route('comment_reply_add') . '" reply_comment_id="' . $replyComment->id . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $request->newsfeed_id . '" comment_id="' . $request->comment_id . '" id="">
                        <div class="post__author author vcard inline-items">';
                    if (isset($userinfo->profile_image)) {
                        $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                    }

                    $output .= '<div class="form-group with-icon-right ">
                                <textarea class="form-control comment-reply-child-text-' . $replyComment->id . '" id="comment-reply-child-text-' . $replyComment->id . '" name="comment" placeholder=""></textarea>
                                <span class="text-danger comment-reply-child-error-' . $replyComment->id . '" id=""></span>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
                                        <svg class="olymp-camera-icon">
                                            <use xlink:href="#olymp-camera-icon"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

                        <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_child_btn" id="' . $replyComment->id . '">Cancel</button>

                    </form>
                <!-- ... end Reply Comment Form  -->
                </div>
                </li>
                <div>
                </ul>';
                }
                $response[] = $output;
            }

            return response()->json(['status' => 'success', 'text' => 'Comment updated Successfully', 'data' => $response, "insertData" => $store]);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function newsfeedReplyCommentLikes(Request $request)
    {
        $newsfeed_id = $request->newsfeed_id;
        $user_id   = $request->users_id;
        $comment_id = $request->comment_id;
        $replycomment_id = $request->reply_comment_id;

        $data = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'comment_id' => $comment_id, 'replycomment_id' => $replycomment_id);
        $get_data = Newsfeedreplycommentlike::where($data)->get();

        if ($get_data->count() >= 1) {
            $like = Newsfeedreplycommentlike::where($data)->delete();
            $is_like = false;
        } else {
            $like = Newsfeedreplycommentlike::create($data);
            $is_like = true;
        }

        $userCount = Newsfeedreplycommentlike::where(['comment_id' => $comment_id, 'newsfeed_id' => $newsfeed_id, 'replycomment_id' => $replycomment_id])->get()->count();
        $response = [
            'count' => $userCount,
            'is_like' => $is_like,
        ];
        return $response;
    }

    public function replyEditComment(Request $request)
    {
        if ($request->ajax()) {
            $response = Newsfeedcommentreply::where(['id' => $request->reply_comment_id, 'comment_id' => $request->comment_id,])->first();

            return response()->json($response);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function replyCommentUpdate(Request $request)
    {
        if (request()->ajax()) {
            $updateNewsfeedcomment = Newsfeedcommentreply::where(['id' => $request->reply_comment_id, 'comment_id' => $request->comment_id])->update(['reply_comment' => $request->input('textpost')]);
            return response()->json(['status' => 'success', 'title' => 'Updated!', 'text' => 'Reply Comment updated Successfully']);
        }
        return errorWebResponse();
    }

    public function deleteReplyComment(Request $request)
    {
        if (request()->ajax()) {
            $deleted_comment = Newsfeedcommentreply::where('id', $request->reply_comment_id)->delete();
            return response()->json(['status' => 'success', 'title' => 'Deleted!', 'text' => 'You have succussfully delete reply comment.!']);
        }
        return errorWebResponse();
    }

    public function oldviewMoreComments(Request $request)
    {
        if ($request->ajax()) {
            $comments = Newsfeedcomment::where('newsfeed_id', $request->newsfeed_id)->get();
            $replyComments = Newsfeedcommentreply::all();
            $response = array();

            foreach ($comments as $comment) {

                $output = '<ul id="del-comment_' . $comment->id . '" class="comments-list comments_list_' . $comment->newsfeed_id . '">
                    <li class="comment-item reply_comment_add_' . $comment->id . '">
                        <div class="post__author author vcard inline-items">';
                if (isset($comment->profileImage->profile_image)) {
                    $output .= '<img loading="lazy" src="' . url('images/profile', $comment->profileImage->profile_image) . '" width="40" height="40" alt="author">';
                } else {
                    $output .= '<img loading="lazy" src="' . url('assets/dashboard/images/user/01.jpg') . '" width="36" height="36" alt="author">';
                }

                $output .= '<div class="author-date">
                                <a class="h6 post__author-name fn" href="#">' . ucwords($comment->NewsfeedUser->name) . '</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">';
                $created = new Carbon($comment->created_at);
                $diffInDays = Carbon::parse($comment->created_at)->diffInDays();
                $showDiff = Carbon::parse($comment->created_at)->diffForHumans();

                if ($diffInDays > 0) {
                    $showDiff .= ', ' . Carbon::parse($comment->created_at)->addDays($diffInDays)->diffInHours() . ' Hours';
                }
                $showDiff;
                $output .=  '<p>' . ucwords($showDiff) . '</p> </time>
                                </div>
                            </div>';

                if ($comment->user_id === Auth::user()->id) {
                    $output .= '<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="javascript:void(0)" route="' . route('edit-comment', $comment->id) . '" class="edit-comment" data-toggle="modal" data-target="#commentModal" comment_id="' . $comment->id . '">Edit Comments</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" route="' . route('delete-comment', $comment->id) . '" class="delete-comment" comment_id="' . $comment->id . '" >Delete Comment</a>
                                    </li>
                                </ul>
                            </div>';
                }

                $output .= '</div>
                        <p class="comment-txt-' . $comment->id . '"> ' .  ucwords($comment->comment) . '</p>';
                $commentLikeStatus = "";
                foreach ($comment->NewsfeedcommentLike as $NewsfeedCommentLike) {
                    if (isset($NewsfeedCommentLike)) {
                        if ($NewsfeedCommentLike['user_id'] === Auth::user()->id) {
                            $commentLikeStatus = "commentLikeColor";
                        } else {
                            $commentLikeStatus = "";
                        }
                    }
                }
                $output .=  '<a href="javascript:void(0);" class="post-add-icon inline-items likeCommentPost" comment_id="' . $comment->id . '" newsfeed_id="' . $comment->newsfeed_id . '" route="' . route('newsfeed-comment-like') . '" users_id="' . Auth::user()->id . '">
                            <svg id="" class="olymp-heart-icon ' . $commentLikeStatus . ' commentlikeColor_' . $comment['id'] . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                            <span class="total_comment_like_count_' . $comment->id . '">' . $comment->NewsfeedcommentLike->count() . '</span>
                        </a>';
                $output .=  '<a href="javascript:void(0)" class="reply comment_reply_btn" id="' . $comment->id . '">Reply</a>
                        <div>

                        <!-- Reply Comment Form  -->

                            <form class="inline-items comment-reply-form comment_reply_add_' . $comment->id . ' cr_' . $comment->id . '" route="' . route('comment_reply_add') . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $comment->newsfeed_id . '" comment_id="' . $comment->id . '" id="">
                                <div class="post__author author vcard inline-items">';
                if (isset($userinfo->profile_image)) {
                    $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                }

                $output .= '<div class="form-group with-icon-right ">
                                        <textarea class="form-control comment-reply-text-' . $comment->id . '" id="comment-reply-text-' . $comment->id . '" name="comment" placeholder=""></textarea>
                                        <span class="text-danger comment-reply-error-' . $comment->id . '" id=""></span>
                                        <div class="add-options-message">
                                            <a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
                                                <svg class="olymp-camera-icon">
                                                    <use xlink:href="#olymp-camera-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

                                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_btn" id="' . $comment->id . '">Cancel</button>

                            </form>
                        <!-- ... end Reply Comment Form  -->
                        </div>';
                foreach ($replyComments as $replyComment) {
                    if ($replyComment->comment_id == $comment->id) {
                        $output .= '<ul id="del-reply-comment_' . $replyComment->id . '" class="comments-list">
                        <li class="comment-item">
                            <div class="post__author author vcard inline-items">';
                        if (isset($replyComment->profileImage->profile_image)) {
                            $output .= '<img loading="lazy" src="' . url('images/profile', $replyComment->profileImage->profile_image) . '" width="40" height="40" alt="author">';
                        } else {
                            $output .= '<img loading="lazy" src="' . url('assets/dashboard/img/noimage.jpg') . '" width="36" height="36" alt="author">';
                        }
                        $output .= '<div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">' . ucwords($replyComment->NewsfeedUser->name) . '</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">';
                        $created = new Carbon($replyComment->created_at);
                        $diffInDays = Carbon::parse($replyComment->created_at)->diffInDays();
                        $showDiff = Carbon::parse($replyComment->created_at)->diffForHumans();

                        if ($diffInDays > 0) {
                            $showDiff .= ', ' . Carbon::parse($replyComment->created_at)->addDays($diffInDays)->diffInHours() . 'Hours';
                        }
                        $output .=  '<p>' . ucwords($showDiff) . '</p> </time>
                                        </time>
                                    </div>
                                </div>';
                        if ($replyComment->user_id === Auth::user()->id) {
                            $output .= '<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="javascript:void(0)" route="' . route('edit-reply-comment', $replyComment->id) . '" class="edit-reply-comment" data-toggle="modal" data-target="#replyCommentModal" reply_comment_id="' . $replyComment->id . '" comment_id="' . $replyComment->comment_id . '">Edit Comments</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" route="' . route('delete-reply-comment', $replyComment->id) . '" class="delete-reply-comment" reply_comment_id="' . $replyComment->id . '" comment_id="' . $replyComment->comment_id . '">Delete Comment</a>
                                        </li>
                                    </ul>
                                </div>';
                        }
                        $output .= '</div>';
                        $replyCommentLikeStatus = "";
                        foreach ($replyComment->NewsfeedreplycommentLike as $NewsfeedReplyCommentLike) {
                            if (isset($NewsfeedReplyCommentLike)) {
                                if ($NewsfeedReplyCommentLike['user_id'] === Auth::user()->id) {
                                    $replyCommentLikeStatus = "commentLikeColor";
                                }
                            }
                        }
                        $output .= '<p class="comment-reply-txt-' . $replyComment->id . '">' . ucwords($replyComment->reply_comment) . '</p>
                            <a href="javascript:void(0);" class="post-add-icon inline-items likeReplyCommentPost" comment_id="' . $replyComment->comment_id . '" reply_comment_id="' . $replyComment->id . '" newsfeed_id="' . $comment->newsfeed_id . '" route="' . route('newsfeed-reply-comment-like') . '" users_id="' . Auth::user()->id . '">
                                <svg id="" class="olymp-heart-icon ' . $replyCommentLikeStatus . ' replycommentlikeColor_' . $replyComment->id . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                                <span class="total_reply_comment_like_count_' . $replyComment->id . '">' . $replyComment->NewsfeedreplycommentLike->count() . '</span>
                            </a>
                            <a href="javascript:void(0)" class="reply comment_reply_child_btn" id="' . $replyComment->id . '">Reply</a>

                            <div>

                        <!-- Reply Comment Form  -->

                            <form class="inline-items comment-reply-child-form comment_reply_child_add_' . $replyComment->id . ' crc_' . $replyComment->id . '" route="' . route('comment_reply_add') . '" reply_comment_id="' . $replyComment->id . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $comment->newsfeed_id . '" comment_id="' . $comment->id . '" id="">
                                <div class="post__author author vcard inline-items">';
                        if (isset($userinfo->profile_image)) {
                            $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                        }

                        $output .= '<div class="form-group with-icon-right ">
                                        <textarea class="form-control comment-reply-child-text-' . $replyComment->id . '" id="comment-reply-child-text-' . $replyComment->id . '" name="comment" placeholder=""></textarea>
                                        <span class="text-danger comment-reply-child-error-' . $replyComment->id . '" id=""></span>
                                        <div class="add-options-message">
                                            <a href="#" class="options-message" data-bs-toggle="modal" data-bs-target="#update-header-photo">
                                                <svg class="olymp-camera-icon">
                                                    <use xlink:href="#olymp-camera-icon"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-md-2 btn-primary" id="submit" type="submit">Post Comment</button>

                                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_reply_child_btn" id="' . $replyComment->id . '">Cancel</button>

                            </form>
                        <!-- ... end Reply Comment Form  -->
                        </div>
                        </li>
                        <div>
                        </ul>';
                    }
                }
                $output .= '</li>
                </ul>';

                $output .= '<!-- ... end Comments -->';
                $response[] = $output;
            }

            return response()->json($response);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function viewMoreComments(Request $request)
    {
        if ($request->ajax()) {
            $comments = Newsfeedcomment::where('newsfeed_id', $request->newsfeed_id)->get();
            $replyComments = Newsfeedcommentreply::all();
            $response = array();

            foreach ($comments as $comment) {

                $output = '<li class="mb-2 comment-item reply_comment_add_' . $comment->id . '">
                <div class="d-flex flex-wrap justify-content-start">
                    <div class="user-img">';
                if (isset($comment->profileImage->profile_image)) {
                    $output .= '<img loading="lazy" src="' . url('images/profile', $comment->profileImage->profile_image) . '" class="avatar-35 rounded-circle img-fluid">';
                } else {
                    $output .= '<img loading="lazy" src="' . url('assets/dashboard/images/user/01.jpg') . '" class="avatar-35 rounded-circle img-fluid">';
                }

                $output .= '</div>';

                $output .= '<div class="comment-data-block ml-3">
                                <h6>' . ucwords($comment->NewsfeedUser->name) . '</h6>
                                <p class="mb-0 comment-text-'. $comment->id . '">' . $comment->comment . '</p>
                                <div class="d-flex flex-wrap align-items-center comment-activity">
                                    <a href="javascript:void();" class="likeCommentPost" comment_id="' . $comment->id . '" newsfeed_id="' . $request->newsfeed_id . '" route="' . route('newsfeed-comment-like') . '" users_id="' . Auth::user()->id . '">like</a>
                                    <a href="javascript:void();">reply</a>
                                    <a href="javascript:void();">translate</a>
                                    <span> ' . newsfeeddateformate($comment->created_at) . ' </span>
                                </div>
                            </div>
                            <div class="iq-card-post-toolbar d-inline-block">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                        <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu m-0 p-0">
                                        <a class="dropdown-item p-3 edit-comment" href="javascript:void();" route=" ' . route('edit-comment') . '" comment_id="' . $comment->id . '" data-toggle="modal" data-target="#commentModal">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-edit-2-line"></i></div>
                                                <div class="data ml-2">
                                                    <h6>Edit comment</h6>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item p-3 delete-comment" href="javascript:void();" route=" ' . route('delete-comment', $comment->id) . '" comment_id="' . $comment->id . '">
                                            <div class="d-flex align-items-top">
                                                <div class="icon font-size-20"><i class="ri-delete-back-2-line"></i></div>
                                                <div class="data ml-2">
                                                    <h6>Delete comment</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                </div>
                <li>';

                $output .= '<!-- ... end Comments -->';
                $response[] = $output;
            }

            return response()->json($response);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }
}
