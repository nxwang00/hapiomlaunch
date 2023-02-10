<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Dashboard\Auth\LoginController;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Dashboard\Newsfeed\NewsfeedController;
use App\Http\Controllers\Web\Dashboard\Globalnewsfeed\GlobalNewsfeedController;
use App\Http\Controllers\Web\Dashboard\Search\SeacrhController;
use App\Http\Controllers\Web\Dashboard\Chat\ChatController;
use App\Http\Controllers\Web\Dashboard\Profile\ProfileController;
use App\Http\Controllers\Web\Dashboard\FriendListSearch\FriendListSearchController;
use App\Http\Controllers\Web\Dashboard\Blockfriends\BlockfriendsController;
use App\Http\Controllers\Web\Dashboard\Product\ProductController;
use App\Http\Controllers\Web\Dashboard\Course\CourseController;
use App\Http\Controllers\Web\Dashboard\Session\SessionController;
use App\Http\Controllers\Web\Dashboard\Free\FreeController;
use App\Http\Controllers\Web\Dashboard\Product\ProductDetailsController;
use App\Http\Controllers\Web\Dashboard\Course\CourseDetailsController;
use App\Http\Controllers\Web\Dashboard\Free\FreeDetailsController;
use App\Http\Controllers\Web\Dashboard\Session\SessionDetailsController;
use App\Http\Controllers\Web\Dashboard\Shopping\ShoppingCartController;
use App\Http\Controllers\Web\Dashboard\Mebership\MebershipController;
use App\Http\Controllers\Web\Dashboard\Storemaster\StoremasterController;
use App\Http\Controllers\Web\Dashboard\User\UserController;
use App\Http\Controllers\Web\Dashboard\Inviteuser\InviteController;
use App\Http\Controllers\Web\Dashboard\InviteGroupUser\GroupInviteController;
use App\Http\Controllers\Web\Dashboard\Groupmaster\GroupMasterController;
use App\Http\Controllers\Web\Dashboard\GroupUserAdmin\UserAdminGroupController;
use App\Http\Controllers\Web\Dashboard\UserGroup\UserGroupController;
use App\Http\Controllers\Web\Dashboard\Polls\PollsController;
use App\Http\Controllers\Web\Dashboard\Comment\CommentController;
use App\Http\Controllers\Web\Dashboard\Ads\AdsController;
use App\Http\Controllers\Web\Dashboard\Payment\StripePaymentController;
use App\Http\Controllers\Web\Dashboard\Checkout\CheckoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Dashboard\Settings\SettingController;
use App\Http\Controllers\Web\Dashboard\Notification\NotificationController;
use App\Http\Controllers\Web\Dashboard\Event\EventController;
use App\Http\Controllers\Web\Dashboard\Photo\PhotoController;
use App\Http\Controllers\Web\Dashboard\Store\StoreController;
use App\Http\Controllers\SocialShareButtonsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'userLoginForm');
    Route::get('registration', 'registration');

    Route::get('/registration/{token}/{groupId}', 'registration')->name('invite-registration');
    Route::get('super-admin-login', 'showLoginForm')->name('super-admin-login');
    Route::get('admin-login/{slug?}', 'adminLoginForm')->name('admin-login');
    Route::get('user-login', 'userLoginForm')->name('admin-login');
    Route::post('admin-registration', 'userRegistration')->name('admin-registration');

    Route::get('admin', 'showLoginForm')->name('login');
    Route::post('user-login', 'login')->name('userlogin');
    Route::post('registration', 'userRegistration');
    Route::get('signout', 'signOut')->name('signout');
    // Route::get('login', 'LoginController@showLoginForm')->name('login');
    //    Route::get('signin', 'LoginController@showLoginForm')->name('signin');
    //    Route::post('login', 'LoginController@login');
    //    Route::post('logout', 'LoginController@logout')->name('logout');

});
/**
|-----------------------------------------------
| Reset password Routes.......
|-----------------------------------------------
 */
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
/**
|-----------------------------------------------
| Payment Routes.......
|-----------------------------------------------
 */
Route::controller(StripePaymentController::class)->group(function () {
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::controller(InviteController::class)->group(function () {
    Route::get('/invite', 'invite')->name('invite');
    Route::post('/invite', 'process')->name('process');
    Route::get('/accept/{token}', 'accept')->name('accept');
});
Route::controller(GroupInviteController::class)->group(function () {
    Route::post('/group-invite', 'processGroupInvite')->name('group-process');
    Route::get('/join-group/{token}/{groupId}', 'joinGroup')->name('join-group');
    Route::get('/group-invite', 'groupInvite')->name('group-invite');
});

// Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
Route::group(['middleware' => ['auth']], function () {
    /**
    |-----------------------------------------------
    | Dashboard Routes.......
    |-----------------------------------------------
     */
    Route::controller(DashboardController::class)->group(function () {
        // Route::get('/dashboard', 'index');
        Route::get('/dashboard', 'index')->name('dashboard');
        // Route::get('customer/dashboard', 'customerdashboad')->name('customer-dashboard');
    });
    /**
    |-----------------------------------------------
    | Ad's Routes.......
    |-----------------------------------------------
     */
    Route::controller(AdsController::class)->group(function () {
        Route::resource('ads', AdsController::class);
    });
    /**
    |-----------------------------------------------
    | Users Routes.......
    |-----------------------------------------------
     */
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('user.index');
        Route::get('/users/list/{user}', 'userList')->name('user.list');
        Route::get('/user/block/{user}', 'blockUser')->name('user.block');
        Route::get('/user/unblock/{user}', 'unblockUser')->name('user.unblock');
        Route::get('/user/edit/{user}', 'editUser')->name('user-edit');
        Route::post('/user/admin-update/{user}', 'adminUpdate')->name('admin.update');
        Route::get('/user/delete/{user}', 'delete')->name('user-delete');
        Route::get('/user/details/{user}', 'admindetails')->name('user.viewdetails');
        Route::post('/user/addcomment', 'addUserComment')->name('user.addcomment');
        Route::get('/user/create', 'createUser')->name('admin.create');
        Route::post('/user/admin-add', 'adminRegistration')->name('admin.store');
        Route::get('/user/alerts', 'alerts')->name('user.alert');
    });
    /**
    |-----------------------------------------------
    | Storemaster Routes.......
    |-----------------------------------------------
     */
    Route::controller(StoremasterController::class)->group(function () {
        Route::get('/store-master', 'index')->name('store-master');
        Route::get('/store-master/create', 'create')->name('store-master-create');
        Route::post('/store-master/store', 'store')->name('store-master-save');
        Route::get('/store-master/edit/{id}', 'edit')->name('store-master-edit');
        Route::post('/store-master/update/{storemasters}', 'update')->name('store-master-update');
        Route::get('/store-master/delete/{storemasters}', 'destroy')->name('store-master-delete');
    });
    /**
    |-----------------------------------------------
    | Store Master Routes.......
    |-----------------------------------------------
     */
    Route::controller(MebershipController::class)->group(function () {
        Route::get('/mebership', 'index')->name('mebership');
        Route::get('/mebership/create', 'create')->name('mebership-create');
        Route::post('/mebership/store', 'store')->name('mebership-save');
        Route::get('/mebership/edit/{id}', 'edit')->name('mebership-edit');
        Route::post('/mebership/update/{meberships}', 'update')->name('mebership-update');
        Route::get('/mebership/delete/{mebership}', 'destroy')->name('mebership-delete');
    });
    /**
    |-----------------------------------------------
    | Group Type Master Routes.......
    |-----------------------------------------------
     */
    Route::controller(GroupMasterController::class)->group(function () {
        Route::get('/group', 'index')->name('group');
        Route::get('/group/show/{id}', 'showGroupUsers')->name('group-users.show');
        Route::get('/group/create', 'create')->name('group-create');
        Route::post('/group/store', 'store')->name('group-save');
        Route::get('/group/edit/{id}', 'edit')->name('group-edit');
        Route::post('/group/update/{group}', 'update')->name('group-update');
        Route::get('/group/delete/{group}', 'destroy')->name('group-delete');
    });
    /**
    |-----------------------------------------------
    | Super Admin Settings Routes.......
    |-----------------------------------------------
     */
    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings', 'index')->name('admin-settings');
        Route::post('/settings/save-agreement', 'saveAgreement')->name('agreement-save');
        Route::get('/privacy', 'privacy')->name('privacy-policy');
        Route::post('/settings/privacy', 'savePrivacy')->name('privacy-save');
        Route::get('/termsofuse', 'termsofuse')->name('terms-of-use');
        Route::post('/settings/termsofuse', 'saveTermsofUse')->name('terms-of-use-save');
    });
    /**
    |-----------------------------------------------
    | Newsfeed Routes.......
    |-----------------------------------------------
     */
    Route::controller(NewsfeedController::class)->group(function () {
        Route::get('/newsfeed/{group_id?}', 'index')->name('newsfeed');
        Route::get('/load-more-newsfeed', 'loadMore')->name('load-more-newsfeed');
        Route::get('/newsfeed/post/newsfeed_likes', 'newsfeed_likes')->name('newsfeed-like');
        Route::post('/newsfeed/newsfeed-follow', 'newsfeedFollow')->name('newsfeed-follow');
        Route::get('/newsfeed/post/newsfeed_comment_likes', 'newsfeed_comment_likes')->name('newsfeed-comment-like');
        Route::post('/newsfeed/store', 'store')->name('newsfeed-create');
        Route::post('/newsfeed/update', 'update')->name('newsfeed-update');
        Route::get('/block-newsfeed/{newsfeed_id}', 'blockNewsfeed')->name('block-newsfeed');
        Route::get('/unblock-newsfeed/{newsfeed_id}', 'unblockNewsfeed')->name('unblock-newsfeed');
        Route::get('/delete-newsfeed/{newsfeed_id}', 'deleteNewsfeed')->name('delete-newsfeed');
        Route::get('/edit-newsfeed/{newsfeed_id}', 'editNewsfeed')->name('edit-newsfeed');
        Route::get('/get-like-status', 'getLikeStatus')->name('get-like-status');
        Route::get('/shownewsfeed/{newsfeed_id}', 'showNewsfeed')->name('newsfeed-show');
        Route::get('/liked-pages', 'getLikedPages')->name('liked-page');
    });
    /**
    |-----------------------------------------------
    | GlobalNewsfeed Routes.......
    |-----------------------------------------------
     */
    Route::controller(GlobalNewsfeedController::class)->group(function () {
        Route::get('/globalnewsfeed', 'index')->name('globalnewsfeed');
    });
    /**
    |-----------------------------------------------
    | Search Routes.......
    |-----------------------------------------------
     */
    Route::controller(SeacrhController::class)->group(function () {
        Route::get('/search', 'index')->name('search');
        Route::get('/search-users', 'searchUser')->name('search-users');
        Route::get('/search-users-list', 'searchUserList')->name('search-users-list');
    });
    /**
    |-----------------------------------------------
    | Chat Routes.......
    |-----------------------------------------------
     */
    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index')->name('chat');
        //  Route::get('/chat/alert/{id}', 'alertMessage')->name('messages-alert');
        Route::get('/messages/{ids}', 'chat')->name('messages.chat');
        Route::post('/fetchMessages', 'fetchMessages')->name('messages-fetch');
        Route::post('/sendMessage', 'sendMessage');
        Route::post('/unreadMessages', 'unreadMessages')->name('messages-unread');
    });
    /**
    |-----------------------------------------------
    | Notification Routes.......
    |-----------------------------------------------
     */
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/notification', 'index')->name('notification');
        Route::get('/notification/delete/{id}', 'deleteNotification')->name('notification-delete');
    });
    /**
    |-----------------------------------------------
    | Profile Routes.......
    |-----------------------------------------------
     */
    Route::controller(ProfileController::class)->group(function () {
        // Route::get('/profile', 'index')->name('profile');
        // Route::get('/profile-setting', 'profileSetting')->name('profile-setting');
        Route::post('profile/profile-image-upload','saveProfileImageUpload')->name('profile-image-upload-save');
        Route::get('/profile-setting', 'personalInformation')->name('profile-setting');
        Route::get('/personal-information', 'personalInformation')->name('personal-information');
        Route::post('/personal-information/store', 'store')->name('personal-information-save');
        Route::get('profile/search', 'userProfile')->name('user-profile');
        Route::get('profile/friend-request', 'friendRequest')->name('user-friend-request');
        Route::get('profile-setting/change-password', 'changePassword')->name('change-password');
        Route::post('/change-password/updatePassword', 'updatePassword')->name('change-password-save');
        Route::get('profile/about', 'aboutProfile')->name('about');
        Route::get('profile/user/{user}', 'friendlistUserProfile')->name('user-profile');

        Route::get('/load-more-profilefeed/{user}', 'loadMore')->name('load-more-profilefeed');

        Route::get('payment/setting', 'paymentSetting')->name('payment-setting');
        Route::post('/change/payment/setting', 'updatePaymentSetting')->name('payment-setting-post');
        Route::get('plan/upgrade', 'planUpgrade')->name('plan-upgrade');
        Route::get('plan/amount', 'getPlanValue')->name('plan-amount');
    });
    /**
    |-----------------------------------------------
    | Social Media Routes.......
    |-----------------------------------------------
     */
    Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget']);
    /**
    |-----------------------------------------------
    | Friend list and search Routes.......
    |-----------------------------------------------
     */
    Route::controller(FriendListSearchController::class)->group(function () {
        Route::get('/friendlist', 'index')->name('friendlist');
        Route::get('/add-friend/{user}', 'addFriend')->name('add-friend');
        Route::get('/accept-friend-request/{user}', 'acceptFriendRequest')->name('accept-friend-request');
        Route::get('/block-friend/{user}', 'blockFriend')->name('block-friend');
        Route::get('/unblock-friend/{user}', 'unblockFriend')->name('unblock-friend');
        Route::get('/friendlist-user/{user}', 'friendListUser')->name('friendlist-user');
        Route::get('/un-friend/{user}', 'unFriend')->name('un-friend');
        Route::get('/suggest-friend', 'ajaxSuggestFriend')->name('ajax-suggest-friend');
    });
    /**
    |-----------------------------------------------
    | Friend list and search Routes.......
    |-----------------------------------------------
     */
    Route::controller(BlockfriendsController::class)->group(function () {
        Route::get('/blockfriends', 'index')->name('blockfriends');
    });
    /**
    |-----------------------------------------------
    | Store Routes.......
    |-----------------------------------------------
     */
    Route::controller(StoreController::class)->group(function () {
        Route::get('/store', 'index')->name('store-index');
        Route::get('/store/detail/{id}', 'detail')->name('store-detail');
        Route::get('/store/admin', 'indexAdmin')->name('store-index-admin');
        Route::post('/store/save', 'save')->name('store-save');
        Route::get('/store/product/create', 'createProduct')->name('store-product-create');
        Route::post('/store/product/save', 'saveProduct')->name('store-product-save');
        Route::get('/store/product/edit/{id}', 'editProduct')->name('store-product-edit');
        Route::post('/store/product/update', 'updateProduct')->name('store-product-update');
        Route::post('/store/product/delete', 'deleteProduct')->name('store-product-delete');
        Route::get('/store/product/detail/{id}', 'detailProduct')->name('store-product-detail');
    });
    /**
    |-----------------------------------------------
    | Session Routes.......
    |-----------------------------------------------
     */
    Route::controller(SessionController::class)->group(function () {
        Route::get('/session', 'index')->name('session');
        Route::get('/session/create', 'create')->name('session-create');
        Route::post('/session/store', 'store')->name('session-save');
        Route::get('/session/edit/{session_detail}', 'edit')->name('session-edit');
        Route::post('/session/update/{session_detail}', 'update')->name('session-update');
        Route::get('/session/delete/{session_detail}', 'destroy')->name('session-delete');
        Route::get('/session/session-list', 'sessionlist')->name('session-list');
    });
    /**
    |-----------------------------------------------
    | Free Routes.......
    |-----------------------------------------------
     */
    Route::controller(FreeController::class)->group(function () {
        Route::get('/free', 'index')->name('free');
        Route::get('/free/create', 'create')->name('free-create');
        Route::post('/free/store', 'store')->name('free-save');
        Route::get('/free/edit/{free}', 'edit')->name('free-edit');
        Route::post('/free/update/{free}', 'update')->name('free-update');
        Route::get('/free/delete/{free}', 'destroy')->name('free-delete');
        Route::get('/free/free-list', 'freelist')->name('free-list');
    });
    /**
    |-----------------------------------------------
    | Polls Routes.......
    |-----------------------------------------------
     */
    Route::controller(PollsController::class)->group(function () {
        Route::get('/polls', 'index')->name('polls');
        Route::get('/polls/create', 'create')->name('polls-create');
        Route::post('/polls/store', 'store')->name('polls-save');
        Route::get('/polls/edit/{polls}', 'edit')->name('polls-edit');
        Route::post('/polls/update/{polls}', 'update')->name('polls-update');
        Route::get('/polls/delete/{polls}', 'destroy')->name('polls-delete');
        Route::post('/polls/polls_result', 'polls_result')->name('polls-result');
        Route::get('/polls/detail/{polls}', 'polls_detail')->name('polls-detail');
    });
    /**
    |-----------------------------------------------
    | Free Details Routes.......
    |-----------------------------------------------
     */
    Route::controller(FreeDetailsController::class)->group(function () {
        Route::get('/free-details/{free}', 'index')->name('free-details');
    });
    /**
    |-----------------------------------------------
    | Session Details Routes.......
    |-----------------------------------------------
     */
    Route::controller(SessionDetailsController::class)->group(function () {
        Route::get('/session-details/{session_detail}', 'index')->name('session-details');
    });
    /**
    |-----------------------------------------------
    | Shopping cart Routes.......
    |-----------------------------------------------
     */
    Route::controller(ShoppingCartController::class)->group(function () {
        Route::get('/shopping-cart', 'index')->name('shopping-cart');
        Route::get('/cart/remove/{id}', 'removeCart')->name('remove-cart');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/cart/add/{id}', 'addToCart')->name('add-cart');
    });
    /**
    |-----------------------------------------------
    | User Admin Create Group Routes.......
    |-----------------------------------------------
     */
    Route::controller(UserAdminGroupController::class)->group(function () {
        Route::get('/groups', 'index')->name('groups');
        Route::get('admin/group/create', 'create')->name('user.group.create');
        Route::post('admin/group/store', 'store')->name('user.group.save');
        Route::get('admin/group/edit/{id}', 'edit')->name('user.group.edit');
        Route::post('admin/group/update/{group}', 'update')->name('user.group.update');
        Route::get('admin/group/delete/{group}', 'destroy')->name('user.group.delete');

        Route::get('/group/details/{id}', 'groupDetail')->name('group-details');
        Route::get('/group/action/{id}/{user_id}/{status}', 'groupAction')->name('group-action');
    });
    /**
    |-----------------------------------------------
    | User Group Routes.......
    |-----------------------------------------------
     */
    Route::controller(UserGroupController::class)->group(function () {
        Route::get('/user-groups', 'index')->name('user-groups');
        Route::get('/user-group/members/{id}', 'getMembers')->name('get-group-members');
        Route::get('/user-group/{id}', 'viewDetail')->name('group-detail');
        Route::post('/user/join-group', 'joinGroup')->name('user-join-group');
        Route::post('/user/leave-group', 'leaveGroup')->name('user-leave-group');
        Route::post('/user-group/pay', 'payGroup')->name('user-pay-group');
        Route::get('/user-group/group-info/{id}', 'showGroupInfo')->name('group.info');
        Route::get('/user/group-detail-leave/{id}', 'leaveGroupDetail')->name('leave-group-detail');
        Route::get('/user/group-detail-join/{id}', 'joinGroupDetail')->name('join-group-detail');
    });
    /**
    |-----------------------------------------------
    | User Event Routes.......
    |-----------------------------------------------
     */
    Route::controller(EventController::class)->group(function () {
        Route::post('/event/create', 'create')->name('create-event');
        Route::get('/event/list/{group_id}', 'getEvents')->name('get-events');
        Route::post('/event/edit', 'edit')->name('edit-event');
        Route::get('/event/delete', 'delete')->name('delete-event');
        Route::get('/event/approve/{id}', 'approve')->name('approve-event');
        Route::get('/event/reject/{id}', 'reject')->name('reject-event');
        Route::post('/event/visible', 'visible')->name('visible-event');
    });
    /**
    |-----------------------------------------------
    | User Photo Routes.......
    |-----------------------------------------------
     */
    Route::controller(PhotoController::class)->group(function () {
        Route::post('/photo/create', 'create')->name('create-photo');
        Route::get('/photo/list/{group_id}', 'getPhotos')->name('get-photos');
        Route::post('/photo/edit', 'edit')->name('edit-photo');
        Route::get('/photo/delete', 'delete')->name('delete-photo');
    });
    /**
    |-----------------------------------------------
    | Comment Routes.......
    |-----------------------------------------------
     */
    Route::controller(CommentController::class)->group(function () {
        Route::post('/comment', 'store')->name('comment_add');
        Route::post('/comment-update', 'update')->name('comment-update');
        Route::get('/edit-comment', 'edit')->name('edit-comment');
        Route::get('/delete-comment/{comment_id}', 'destroy')->name('delete-comment');
        Route::get('/view-more-comments', 'viewMoreComments')->name('view-more-comments');

        //  comment reply routes
        Route::get('/edit-reply-comment', 'replyEditComment')->name('edit-reply-comment');
        Route::post('/reply-comment-update', 'replyCommentUpdate')->name('reply-comment-update');
        Route::get('/delete-reply-comment/{reply_comment_id}', 'deleteReplyComment')->name('delete-reply-comment');
        Route::post('/comment-reply', 'commentReplySave')->name('comment_reply_add');
        Route::get('/newsfeed/newsfeed_rep_comment_likes', 'newsfeedReplyCommentLikes')->name('newsfeed-reply-comment-like');
    });
    /**
    |-----------------------------------------------
    | Checkout & Payment Routes.......
    |-----------------------------------------------
     */
    Route::controller(CheckoutController::class)->group(function () {
        // Route::get('/user-groups', 'index')->name('user-groups');
        Route::post('/user/checkout', 'userCheckoutPost')->name('user.checkout.post');
        Route::get('/payment/invoice/{id}', 'paymentInvoice')->name('payment-invoice');
        Route::post('/upgrade-plan/checkout', 'upgradePlanCheckoutPost')->name('admin.upgradeplan.post');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
