<?php

namespace App\Http\Controllers\Web\Dashboard\Newsfeed;

use App\Http\Controllers\Controller;
use App\Models\Newsfeed;
use App\Models\Newsfeed_gallary;
use App\Models\Userinfo;
use App\Models\Friendlist;
use App\Models\Friendrequest;
use App\Models\Newsfeedlike;
use App\Models\NewsfeedFollow;
use App\Models\Newsfeedcomment;
use App\Models\Newsfeedcommentlike;
use App\Models\User;
use App\Models\Newsfeedcommentreply;
use App\Http\DataProviders\Web\Dashboard\Newsfeed\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Newsfeed\LoadMoreDataProvider;
use App\Http\Requests\Web\Dashboard\Newsfeed\StoreRequest;
use App\Http\Requests\Web\Dashboard\Newsfeed\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Newsfeed\IndexRequest;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Web\Dashboard\Newsfeed\BlockNewsfeedRequest;
use App\Http\Requests\Web\Dashboard\Newsfeed\UnBlockNewsfeedRequest;
use App\Http\Requests\Web\Dashboard\Newsfeed\DeleteNewsfeedRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use DB;
use Carbon\Carbon;
use App\Repositories\Users\FriendRepository;

class NewsfeedController extends Controller
{
    public function loadMore(IndexDataProvider $provider)
    {
        $userinfo = Userinfo::select('*')->where('user_id', Auth::user()->id)->first();
          //exit;
        //$friends_id = Friendlist::select('friend_id')->where('user_id', Auth::user()->id)->pluck('friend_id');
        //$requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        //$sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        //get suggested friends
        //$requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());
        //$allData = $friendRepository->friendSuggestions(10);
        //$allData = User::where('id', '!=', Auth::user()->id)->whereNotIn('id', $requestedAndFrinedsId)->where('role_id', Auth::user()->role_id)->limit(10)->get();
        //$accepted_friend_ids = Friendlist::select('friend_id')->where('user_id', Auth::id())->where('friendstatus', 1)->pluck('friend_id');
        //$acceptedFriends = User::whereIn('id', $accepted_friend_ids->toArray())->limit(10)->get();
        $data = [
            'userinfo'  => $userinfo,
            //'friends'   => $allData,
           // 'acceptedFriends' => $acceptedFriends,
            'my_user_id' => Auth::user()->id
        ];
        
        return view('dashboard.layouts.posts', $provider->meta())->with($data);

        //return view('dashboard.pages.newsfeed.index', $provider->meta())->with($data);
    }

    public function index(IndexRequest $request, IndexDataProvider $provider, FriendRepository $friendRepository)
    {
        $userinfo = Userinfo::select('*')->where('user_id', Auth::user()->id)->first();
          //exit;
        //$friends_id = Friendlist::select('friend_id')->where('user_id', Auth::user()->id)->pluck('friend_id');
        //$requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        //$sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        //get suggested friends
        //$requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());
        $allData = $friendRepository->friendSuggestions(10);
        //$allData = User::where('id', '!=', Auth::user()->id)->whereNotIn('id', $requestedAndFrinedsId)->where('role_id', Auth::user()->role_id)->limit(10)->get();
        $accepted_friend_ids = Friendlist::select('friend_id')->where('user_id', Auth::id())->where('friendstatus', 1)->pluck('friend_id');
        $acceptedFriends = User::whereIn('id', $accepted_friend_ids->toArray())->limit(10)->get();
        $data = [
            'userinfo'  => $userinfo,
            'friends'   => $allData,
            'acceptedFriends' => $acceptedFriends,
            'my_user_id' => Auth::user()->id
        ];
        
        //return view('dashboard.layouts.posts', $provider->meta())->with($data);

        return view('dashboard.pages.newsfeed.index', $provider->meta())->with($data);
    }

    public function showNewsfeed(Request $request, IndexDataProvider $provider)
    {
        $userinfo = Userinfo::where('user_id', Auth::user()->id)->first();
        $friends_id = Friendlist::select('friend_id')->where('user_id', Auth::user()->id)->pluck('friend_id');
        $requsetFriend = Friendrequest::where('request_from', Auth::user()->id)->pluck('request_to');
        $sendRequset = Friendrequest::where('request_to', Auth::user()->id)->pluck('request_from');
        $requestedAndFrinedsId = array_merge($friends_id->toArray(), $requsetFriend->toArray(), $sendRequset->toArray());
        $allData = User::where('id', '!=', Auth::user()->id)->whereNotIn('id', $requestedAndFrinedsId)->where('role_id', Auth::user()->role_id)->limit(10)->get();


        $data = [
            'userinfo'  => $userinfo,
            'friends'   => $allData,
            'my_user_id' => Auth::user()->id
        ];
        return view('dashboard.pages.newsfeed.index', $provider->meta())->with($data);
    }

    public function store(StoreRequest $request)
    {
        if ($level = $request->persist()->getPost()) {
            //flashWebResponse('created', 'Post');
            return redirect()->back();

            return redirect()->route('newsfeed');
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if (request()->ajax()) {
            $updateNewsfeed = Newsfeed::where('id', $request->newsfeed_id)->update(['text' => $request->input('textpost')]);
            $getDatas = Newsfeed_gallary::where('newsfeed_id', $request->newsfeed_id)->get();
            $files = $request->totalFile;
            if ($getDatas && $files > 0) {
                foreach ($getDatas as $getData) {
                    $system_path = str_replace("app", "", app_path());
                    $file_path = $system_path . 'public/images/newsfeed/' . $getData->image;
                    unlink($file_path);
                }
                $deleteData = DB::table('newsfeed_gallaries')
                    ->where('newsfeed_id', $request->newsfeed_id)
                    ->delete();
            }

            if ($request->totalFile > 0) {
                for ($x = 0; $x < $request->totalFile; $x++) {

                    if ($request->hasFile('image' . $x)) {
                        $file = $request->file('image' . $x);
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images/newsfeed', $name);
                        $data1 = [
                            'newsfeed_id'     => $request->newsfeed_id,
                            'image'     => $name,
                        ];
                        $newsfeed_gallary = Newsfeed_gallary::create($data1);
                    }
                }
            }

            $responseData = Newsfeed_gallary::where('newsfeed_id', $request->newsfeed_id)->get();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'Newsfeed updated Successfully', 'data' => $responseData]);
        } else {
            return errorWebResponse();
        }
    }

    public function newsfeed_likes(Request $request)
    {
        $newsfeed_id = $request->newsfeed_id;
        $user_id   = $request->user_id;
        $likes_id = $request->likes_id;
        $face_icon = $request->face_icon;

        $data = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'likes_id' => $likes_id);
        $dataWithLikeIcon = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'likes_id' => $likes_id, 'face_icon' => $face_icon);
        $get_data = Newsfeedlike::where($data)->get();

        $a = (($get_data->count() - 1) < 0) ? 0 : $get_data->count() - 1;
        $face_icon_old = (isset($get_data[$a]) && isset($get_data[$a]->face_icon)) ? $get_data[$a]->face_icon : ''; 

        if ($get_data->count() >= 1) {
            $like = Newsfeedlike::where($data)->delete();
            $is_like = false;
        }
        
        if ($face_icon_old != $face_icon || $get_data->count() == 0) {
            $like = Newsfeedlike::create($dataWithLikeIcon);
            $is_like = true;
        }

        $userCount = Newsfeedlike::where('newsfeed_id', $newsfeed_id)->get()->count();
        $newsfeedLike = Newsfeedlike::where($data)->first();
        $response = [
            'count' => $userCount,
            'is_like' => $is_like,
            'newsfeedLike' => $newsfeedLike,
        ];
        return $response;
    }

    public function newsfeedFollow(Request $request)
    {
        if (request()->ajax()) {
            $newsfeed_id = $request->newsfeed_id;
            $user_id   = $request->user_id;
            $following_id = $request->following_id;

            $data = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'following_id' => $following_id);
            $get_data = NewsfeedFollow::where($data)->get();

            if ($get_data->count() >= 1) {
                $follow = NewsfeedFollow::where($data)->delete();
                $is_follow = false;
            } else {
                $follow = NewsfeedFollow::create($data);
                $is_follow = true;
            }
            $authUser = Auth::user()->id;
            $followingCount = NewsfeedFollow::where('following_id', $authUser)->get()->count();
            $followerCount = NewsfeedFollow::where('user_id', $authUser)->get()->count();
            $response = [
                'followingCount' => $followingCount,
                'followerCount' => $followerCount,
                'is_follow' => $is_follow,
            ];
            
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'Newsfeed was followed Successfully', 'data' => $response]);
        } else {
            return errorWebResponse();
        }
    }
    
    public function getLikedPages(Request $request){
        $likedUsers = [];
        $newsfeeds = [];
        $newsfeedLikes = Newsfeedlike::where('likes_id', Auth::user()->id)->get();
        $likeStatuses = [];
        foreach($newsfeedLikes as $newsfeedLike) {
            $likedUsers[] =  User::findOrFail($newsfeedLike->user_id);
            $newsfeeds[] = Newsfeed::findOrFail($newsfeedLike->newsfeed_id);
            $newsfeedFollows = NewsfeedFollow::where(['newsfeed_id' => $newsfeedLike->newsfeed_id, 'user_id' => $newsfeedLike->user_id, 'following_id' => Auth::user()->id])->get();
            if ($newsfeedFollows->count() >= 1) {
                $likeStatuses[] = false;
            } else {
                $likeStatuses[] = true;
            }
        }

        return view('dashboard.pages.likepage.index', compact('newsfeedLikes', 'likedUsers', 'newsfeeds', 'likeStatuses'));
    }

    public function newsfeed_comment_likes(Request $request){
        $newsfeed_id = $request->newsfeed_id;
        $user_id   = $request->users_id;
        $comment_id = $request->comment_id;
        $face_icon = $request->face_icon;

        $data = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'comment_id' => $comment_id);
        $dataWithLikeIcon = array('newsfeed_id' => $newsfeed_id, 'user_id' => $user_id, 'comment_id' => $comment_id, 'face_icon' => $face_icon);
        $get_data = Newsfeedcommentlike::where($data)->get();
         
        
        $a = (($get_data->count() - 1) < 0) ? 0 : $get_data->count() - 1;
        $face_icon_old = (isset($get_data[$a]) && isset($get_data[$a]->face_icon)) ? $get_data[$a]->face_icon : ''; 

        if ($get_data->count() >= 1) {
            $query = "DELETE FROM newsfeedcommentlikes WHERE newsfeed_id=".$data['newsfeed_id']." AND user_id=".$data['user_id']." AND comment_id=".$data['comment_id'];
            DB::select(DB::raw($query));
            //Newsfeedcommentlike::where($data)->delete(); <----this is not working for some unknown reason
            $is_like = false;
        }
        /*} else {
            $like = Newsfeedcommentlike::create($data);
            $is_like = true;
        }*/

        if ($face_icon_old != $face_icon || $get_data->count() == 0) {
            $like = Newsfeedcommentlike::create($dataWithLikeIcon);
            $is_like = true;
        }

        $userCount = Newsfeedcommentlike::where(['comment_id' => $comment_id, 'newsfeed_id' => $newsfeed_id])->get()->count();
        $newsfeedLike = Newsfeedcommentlike::where($data)->get();
        $response = [
            'count' => $userCount,
            'is_like' => $is_like,
            'newsfeedLike' => $newsfeedLike,
        ];
        return $response;
    }
    
    public function blockNewsfeed(BlockNewsfeedRequest $request, Newsfeed $newsfeed) {
        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'You have succussfully block post.!']);
        }
        return errorWebResponse();
    }

    public function unblockNewsfeed(UnBlockNewsfeedRequest $request, User $user)
    {

        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => 'You have succussfully unblock post.!']);
        }
        return errorWebResponse();
    }

    public function deleteNewsfeed(DeleteNewsfeedRequest $request, User $user)
    {

        if (request()->ajax()) {
            $msg = $request->persist()->getMsg();
            $data = $request->persist()->getData();
            return response()->json(['status' => 'success', 'title' => 'Deleted!', 'text' => 'You have succussfully delete post.!', 'deleted_id' => $data['deleted_id']]);
        }
        return errorWebResponse();
    }

    public function editNewsfeed(Request $request, IndexDataProvider $provider)
    {

        if (request()->ajax()) {

            $getData = Newsfeed::select('*')->where('id', $request->newsfeed_id)->first();

            $response = [
                "newfeed" => $getData,
                "newfeed_galary" => $getData['NewsfeedGallaries']
            ];
            return response()->json(['status' => 'success', 'text' => 'Data Found !', 'data' => $response]);
        }
        return errorWebResponse();
    }

    public function getLikeStatus(Request $request)
    {
        $getStatus = Newsfeedlike::where('likes_id', Auth::user()->id)->get();
        return response()->json($getStatus);
    }

    /*public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = config()->get('constants.PER_PAGE_RECORD');
            $results = Newsfeed::select('*')->orderBy('newsfeeds.id', 'desc')->get();
            $userinfo = Userinfo::where('user_id', Auth::user()->id)->first();
            $friends_id = Friendlist::select('friend_id')->where('user_id', Auth::user()->id)->pluck('friend_id');
            $comments = Newsfeedcomment::select('*')->get();
            $allData = User::where('id', '!=', Auth::user()->id)->whereNotIn('id', $friends_id)->where('role_id', Auth::user()->role_id)->limit(10)->get();
            $replyComments = Newsfeedcommentreply::all();

            $data = [
                'userinfo'  => $userinfo,
                'friends'   => $allData,
            ];

            $response = array();
            $i = 1;
            $j = 1;
            //return $results;
            foreach ($results as $result) {
                $profile_img = $system_path = url('images/profile/' . $result['userImageByPost']['profile_image']);
                $profile_default_img = url('assets/dashboard/img/noimage.jpg');
                $profileImg = isset($result['userImageByPost']['profile_image']) ? $profile_img : $profile_default_img;
                $output = '<div id="del-newsfeed_' . $result['id'] . '" class="ui-block main-div hide-newsfeed_' . $result['id'] . '">
                    <article class="hentry post video">
                        <div class="post__author author vcard inline-items">
                            <img loading="lazy" src="' . $profileImg . '" class="post__author_image" alt="author" width="45" height="45">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="#">' . ucwords($result['NewsfeedUser']['name']) . '</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">
                                        ' . date("F", strtotime($result['created_at'])) . ' ' . date("d", strtotime($result['created_at'])) . ' at ' . date("h:i", strtotime($result['created_at'])) . ' ' . date("a", strtotime($result['created_at'])) . '                                </time>
                                </div>
                            </div>';
                if ($result['user_id'] === Auth::user()->id) {
                    $output .= '<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="javascript:void(0)" route="' . route('edit-newsfeed', $result['id']) . '" class="edit-newsfeed" data-toggle="modal" data-target="#exampleModal" newsfeed_id="' . $result['id'] . '">Edit Post</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" route="' . route('delete-newsfeed', $result['id']) . '" class="delete-newsfeed" newsfeed_id="' . $result['id'] . '">Delete Post</a>
                                    </li>';
                    if ($result->status === 1) {
                        $output .= '<li class="block-unbolock-' . $result->id . '">
                                            <a href="javascript:void(0)" class="block-newsfeed block-hide-show-' . $result->id . '" newsfeed_id="' . $result->id . '" id="liveToastBtn">Block Post</a>
                                        </li>';
                    } else {
                        $output .= '<li class="block-unbolock-' . $result->id . '">
                                            <a href="javascript:void(0)" class="unblock-newsfeed unblock-hide-show-' . $result->id . '" newsfeed_id="' . $result->id . '" id="liveToastBtn">Unblock Post</a>
                                        </li>';
                    }
                    $output .= '</ul>
                            </div>';
                }
                $output .= '</div>';
                $output .= '<p class="newsfeed-text-' . $result->id . '">' . $result['text'] . '</p>';
                if (isset($result['NewsfeedGallaries'])) {
                    $output .= '<div class="post-video newsfeed-update-img-' . $result->id . '">';
                    foreach ($result['NewsfeedGallaries'] as $imageValue) {
                        $output .= '<img loading="lazy" src="' . url('images/newsfeed/' . $imageValue['image']) . '" alt="photo" width="488" height="194" ><br>';
                    }
                    $output .= '</div>
                <div class="post-video newsfeed-update-img-show-' . $result->id . '">
                </div>';
                }
                $output .= '<div class="post-additional-info inline-items">

                <a href="javascript:void(0);" class="post-add-icon inline-items likePost" newsfeed_id="' . $result['id'] . '" route="' . route('newsfeed-like') . '" user_id="' . $result['user_id'] . '" likes_id="' . Auth::user()->id . '">
                    <svg id="" class="olymp-heart-icon like1Color_' . $result['id'] . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                    <strong class="total_count_' . $result['id'] . '">' . $result->NewsfeedLike->count() . ' </strong>
                </a>
                <input type="hidden" id="newsfeed_id_' . $i . '" value="' . $result['id'] . '" disabled="">
                <input type="hidden" id="user_id_' . $i . '" value="' . $result['user_id'] . '" disabled="">
                <input type="hidden" id="likes_id_' . $i . '" value="' . Auth::user()->id . '" disabled="">

                <ul class="friends-harmonic">';
                if ($result->NewsfeedLike->count() > 0) {
                    $like = 0;
                    foreach ($result->NewsfeedLike as $newlike) {
                        if ($like < 7) {
                            $output .= '<li>
                            <a href="#">';

                            if (isset($newlike->NewsfeedUser->userInfo->profile_image)) {

                                $output .= '<img loading="lazy" src="' . url('images/profile/' . $newlike->NewsfeedUser->userInfo->profile_image) . '" alt="friend" width="28" height="28">';
                            } else {
                                $output .= '<img loading="lazy" src="' . url('assets/dashboard/img/noimage.jpg') . '" alt="friend" width="28" height="28">';
                            }
                            $output .= '</a>
                        </li>';
                        }
                    }
                }

                $output .= '</ul>';

                $output .= '<div class="names-people-likes">';
                if ($result->NewsfeedLike->count() > 0) {
                    $like = 0;
                    foreach ($result->NewsfeedLike as $newlike) {
                        if ($like == 0) {
                            $output .= '<a href="#">' . $newlike->NewsfeedUser->name . '</a>';
                        } else if ($like == 1) {
                            $output .= ', <a href="#">' . $newlike->NewsfeedUser->name . '</a>';
                        }
                        $like = $like + 1;
                    }
                    if ($result->NewsfeedLike->count() > 2) {
                        $output .=  'and' . '<br>' . $result->NewsfeedLike->count() - 2 . ' more liked this';
                    }
                }
                $output .= '</div>

                <div class="comments-shared">
                    <a href="javascript:void(0)" class="post-add-icon inline-items comment_btn" id="' . $result['id'] . '">
                        <svg class="olymp-speech-balloon-icon"><use xlink:href="#olymp-speech-balloon-icon"></use></svg>

                        <span></span>
                    </a>

                    <a href="#" class="post-add-icon inline-items">
                        <svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>

                        <span>16</span>
                    </a>
                </div>
            </div>
            <div class="control-block-button post-control-button">

                <a href="javascript:void(0);" class="btn btn-control likePost like2Color_' . $result['id'] . '" id="" newsfeed_id="' . $result['id'] . '" route="' . route('newsfeed-like') . '" user_id="' . $result['user_id'] . '" likes_id="' . Auth::user()->id . '">
                    <svg class="olymp-like-post-icon"><use xlink:href="#olymp-like-post-icon"></use></svg>
                </a>

                <a href="javascript:void(0)" class="btn btn-control comment_btn" id="' . $result['id'] . '">
                    <svg class="olymp-comments-post-icon"><use xlink:href="#olymp-comments-post-icon"></use></svg>
                </a>

                <a href="#" class="btn btn-control">
                    <svg class="olymp-share-icon"><use xlink:href="#olymp-share-icon"></use></svg>
                </a>

            </div>
            </article>';

                $output .= '<div>
            <form class="inline-items comment-form comment_add_' . $result->id . '" route="' . route('comment_add') . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $result->id . '" id="">
                <div class="post__author author vcard inline-items">';
                if (isset($data['userinfo']['profile_image'])) {
                    $output .= '<img loading="lazy" src="' . url('images/profile', $data['userinfo']['profile_image']) . '" width="36" height="36" alt="author" class="rounded-circle">';
                }
                $output .= '<div class="form-group with-icon-right ">
                        <textarea class="form-control comment-text-' . $result->id . '" id="" name="comment" placeholder=""></textarea>
                        <span class="text-danger comment-error-' . $result->id . '" id=""></span>
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

                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color comment_btn" id="' . $result->id . '">Cancel</button>

            </form>

                <!-- ... end Comment Form  -->

            </div>
            <!-- Comments -->';

                foreach ($result->NewsfeedComment as $key => $comment) {
                    if ($key == 1) :
                        break;
                    endif;
                    $output .= '<ul id="del-comment_' . $comment->id . '" class="comments-list comments_list_' . $result->id . '">
                <li class="comment-item reply_comment_add_' . $comment->id . '">
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
                    <p class="comment-txt-' . $comment->id . '">' .  ucwords($comment->comment) . '</p>';
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
                    $output .=  '<a href="javascript:void(0);" class="post-add-icon inline-items likeCommentPost" comment_id="' . $comment->id . '" newsfeed_id="' . $result->id . '" route="' . route('newsfeed-comment-like') . '" users_id="' . Auth::user()->id . '">
                        <svg id="" class="olymp-heart-icon ' . $commentLikeStatus . ' commentlikeColor_' . $comment['id'] . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                        <span class="total_comment_like_count_' . $comment->id . '">' . $comment->NewsfeedcommentLike->count() . '</span>
                    </a>';
                    $output .=  '<a href="javascript:void(0)" class="reply comment_reply_btn" id="' . $comment->id . '">Reply</a>
                    <div>

                    <!-- Reply Comment Form  -->

                        <form class="inline-items comment-reply-form comment_reply_add_' . $comment->id . '" route="' . route('comment_reply_add') . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $result->id . '" comment_id="' . $comment->id . '" id="">
                            <div class="post__author author vcard inline-items">';
                    if (isset($userinfo->profile_image)) {
                        $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                    }

                    $output .= '<div class="form-group with-icon-right ">
                                    <textarea class="form-control comment-reply-text-' . $comment->id . '" id="" name="comment" placeholder=""></textarea>
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
                        <a href="javascript:void(0);" class="post-add-icon inline-items likeReplyCommentPost" comment_id="' . $replyComment->comment_id . '" reply_comment_id="' . $replyComment->id . '" newsfeed_id="' . $result->id . '" route="' . route('newsfeed-reply-comment-like') . '" users_id="' . Auth::user()->id . '">
                            <svg id="" class="olymp-heart-icon ' . $replyCommentLikeStatus . ' replycommentlikeColor_' . $replyComment->id . '"><use xlink:href="#olymp-heart-icon"></use></svg>
                            <span class="total_reply_comment_like_count_' . $replyComment->id . '">' . $replyComment->NewsfeedreplycommentLike->count() . '</span>
                        </a>
                        <a href="javascript:void(0)" class="reply comment_reply_child_btn" id="' . $replyComment->id . '">Reply</a>

                        <div>

                    <!-- Reply Comment Form  -->

                        <form class="inline-items comment-reply-child-form comment_reply_child_add_' . $replyComment->id . '" route="' . route('comment_reply_add') . '" reply_comment_id="' . $replyComment->id . '" user_id="' . Auth::user()->id . '" newsfeed_id="' . $result->id . '" comment_id="' . $comment->id . '" id="">
                            <div class="post__author author vcard inline-items">';
                            if (isset($userinfo->profile_image)) {
                                $output .= '<img loading="lazy" src="' . url('images/profile', $userinfo->profile_image) . '" width="36" height="36" alt="author" class="rounded-circle">';
                            }

                            $output .= '<div class="form-group with-icon-right ">
                                    <textarea class="form-control comment-reply-child-text-' . $replyComment->id . '" name="comment" placeholder=""></textarea>
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
                }
                if ($result->NewsfeedComment->count() >= 2) {
                    $view_more = 'View ' . $result->NewsfeedComment->count() - 1 . ' more comments +';
                } else {
                    $view_more = 'No comment found.';
                }
                $output .= '<!-- ... end Comments -->
                <a href="javascript:void(0)" newsfeed_id = "' . $result->id . '" route="' . route('view-more-comments') . '" class="more-comments view-more-comment-btn-' . $result->id . '">' . $view_more . '</a>

        </div>';
                $i++;
                $j++;
                $response[] = $output;
            }

            return response()->json($response);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }*/
}
