<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\auth\AccountController;
use App\Http\Controllers\auth\RoleController;

use App\Http\Controllers\radius\NasController;
use App\Http\Controllers\radius\PoolController;
use App\Http\Controllers\radius\PolicyController;
use App\Http\Controllers\radius\ServiceController;
use App\Http\Controllers\radius\SubscriberController;
use App\Http\Controllers\radius\buglogsController;
use App\Http\Controllers\radius\ReportsController;
use App\Http\Controllers\radius\managerController;
use App\Http\Controllers\radius\CommissionController;
use App\Http\Controllers\radius\ImportController;
use App\Http\Controllers\radius\printController;
use App\Http\Controllers\radius\JumpController;
use App\Http\Controllers\radius\ProfileController;
use App\Http\Controllers\radius\RechargeController;
use App\Http\Controllers\radius\SettingController;
use App\Http\Controllers\radius\LocationInfoController;
use App\Http\Controllers\radius\OnlinePaymentController;

use App\Http\Controllers\local_api_call\NasLocalController;

use App\Http\Controllers\radius\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\UielementsController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AdvanceduiController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\IconsController;


// use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('', [Controller::class, 'index']);

// DASHBOARDS //

Route::get('index', [DashboardsController::class, 'index']);
Route::get('index2', [DashboardsController::class, 'index2']);
Route::get('index3', [DashboardsController::class, 'index3']);
Route::get('index4', [DashboardsController::class, 'index4']);
Route::get('index5', [DashboardsController::class, 'index5']);
Route::get('index6', [DashboardsController::class, 'index6']);
Route::get('index7', [DashboardsController::class, 'index7']);
Route::get('index8', [DashboardsController::class, 'index8']);
Route::get('index9', [DashboardsController::class, 'index9']);
Route::get('index10', [DashboardsController::class, 'index10']);
Route::get('index11', [DashboardsController::class, 'index11']);
Route::get('index12', [DashboardsController::class, 'index12']);

// PAGES //
Route::get('aboutus', [PagesController::class, 'aboutus']);
Route::get('blog', [PagesController::class, 'blog']);
Route::get('blog-details', [PagesController::class, 'blog_details']);
Route::get('blog-create', [PagesController::class, 'blog_create']);
Route::get('chat', [PagesController::class, 'chat']);
Route::get('contacts', [PagesController::class, 'contacts']);
Route::get('contactus', [PagesController::class, 'contactus']);
Route::get('add-products', [PagesController::class, 'add_products']);
Route::get('cart', [PagesController::class, 'cart']);
Route::get('checkout', [PagesController::class, 'checkout']);
Route::get('edit-products', [PagesController::class, 'edit_products']);
Route::get('order-details', [PagesController::class, 'order_details']);
Route::get('orders', [PagesController::class, 'orders']);
Route::get('products', [PagesController::class, 'products']);
Route::get('products-details', [PagesController::class, 'products_details']);
Route::get('products-list', [PagesController::class, 'products_list']);
Route::get('wishlist', [PagesController::class, 'wishlist']);
Route::get('mail', [PagesController::class, 'mail']);
Route::get('mail-settings', [PagesController::class, 'mail_settings']);
Route::get('empty-page', [PagesController::class, 'empty_page']);
Route::get('faqs', [PagesController::class, 'faqs']);
Route::get('filemanager', [PagesController::class, 'filemanager']);
Route::get('invoice-create', [PagesController::class, 'invoice_create']);
Route::get('invoice-details', [PagesController::class, 'invoice_details']);
Route::get('invoice-list', [PagesController::class, 'invoice_list']);
Route::get('landing', [PagesController::class, 'landing']);
Route::get('landing-jobs', [PagesController::class, 'landing_jobs']);
Route::get('notifications', [PagesController::class, 'notifications']);
Route::get('pricing', [PagesController::class, 'pricing']);
// Route::get('profile', [PagesController::class, 'profile']);
Route::get('reviews', [PagesController::class, 'reviews']);
Route::get('teams', [PagesController::class, 'teams']);
Route::get('terms-conditions', [PagesController::class, 'terms_conditions']);
Route::get('timeline', [PagesController::class, 'timeline']);
Route::get('todo-list', [PagesController::class, 'todo_list']);

// TASK //
Route::get('task-kanban-board', [TaskController::class, 'task_kanban_board']);
Route::get('task-listview', [TaskController::class, 'task_listview']);
Route::get('task-details', [TaskController::class, 'task_details']);

// AUTHENTICATION //
Route::get('comingsoon', [AuthenticationController::class, 'comingsoon']);
Route::get('createpassword-basic', [AuthenticationController::class, 'createpassword_basic']);
Route::get('createpassword-cover', [AuthenticationController::class, 'createpassword_cover']);
Route::get('lockscreen-basic', [AuthenticationController::class, 'lockscreen_basic']);
Route::get('lockscreen-cover', [AuthenticationController::class, 'lockscreen_cover']);
Route::get('resetpassword-basic', [AuthenticationController::class, 'resetpassword_basic']);
Route::get('resetpassword-cover', [AuthenticationController::class, 'resetpassword_cover']);
Route::get('signup-basic', [AuthenticationController::class, 'signup_basic']);
Route::get('signup-cover', [AuthenticationController::class, 'signup_cover']);
Route::get('signin-basic', [AuthenticationController::class, 'signin_basic']);
Route::get('signin-cover', [AuthenticationController::class, 'signin_cover']);
Route::get('twostep-verification-basic', [AuthenticationController::class, 'twostep_verification_basic']);
Route::get('twostep-verification-cover', [AuthenticationController::class, 'twostep_verification_cover']);
Route::get('under-maintenance', [AuthenticationController::class, 'under_maintenance']);

// ERROR //
Route::get('error401', [ErrorController::class, 'error401']);
Route::get('error404', [ErrorController::class, 'error404']);
Route::get('error500', [ErrorController::class, 'error500']);

// UI ELEMENTS //
Route::get('alerts', [UielementsController::class, 'alerts']);
Route::get('badges', [UielementsController::class, 'badges']);
Route::get('breadcrumbs', [UielementsController::class, 'breadcrumbs']);
Route::get('buttons', [UielementsController::class, 'buttons']);
Route::get('buttongroups', [UielementsController::class, 'buttongroups']);
Route::get('cards', [UielementsController::class, 'cards']);
Route::get('dropdowns', [UielementsController::class, 'dropdowns']);
Route::get('images-figures', [UielementsController::class, 'images_figures']);
Route::get('listgroups', [UielementsController::class, 'listgroups']);
Route::get('navs-tabs', [UielementsController::class, 'navs_tabs']);
Route::get('object-fit', [UielementsController::class, 'object_fit']);
Route::get('paginations', [UielementsController::class, 'paginations']);
Route::get('popovers', [UielementsController::class, 'popovers']);
Route::get('progress', [UielementsController::class, 'progress']);
Route::get('spinners', [UielementsController::class, 'spinners']);
Route::get('toasts', [UielementsController::class, 'toasts']);
Route::get('tooltips', [UielementsController::class, 'tooltips']);
Route::get('typography', [UielementsController::class, 'typography']);

// UTILITIES //
Route::get('avatars', [UtilitiesController::class, 'avatars']);
Route::get('borders', [UtilitiesController::class, 'borders']);
Route::get('breakpoints', [UtilitiesController::class, 'breakpoints']);
Route::get('colors', [UtilitiesController::class, 'colors']);
Route::get('columns', [UtilitiesController::class, 'columns']);
Route::get('css-grid', [UtilitiesController::class, 'css_grid']);
Route::get('flex', [UtilitiesController::class, 'flex']);
Route::get('gutters', [UtilitiesController::class, 'gutters']);
Route::get('helpers', [UtilitiesController::class, 'helpers']);
Route::get('positions', [UtilitiesController::class, 'positions']);
Route::get('more', [UtilitiesController::class, 'more']);

// FORMS //
Route::get('form-inputs', [FormsController::class, 'form_inputs']);
Route::get('form-check-radios', [FormsController::class, 'form_check_radios']);
Route::get('form-input-groups', [FormsController::class, 'form_input_groups']);
Route::get('form-select', [FormsController::class, 'form_select']);
Route::get('form-range', [FormsController::class, 'form_range']);
Route::get('form-input-masks', [FormsController::class, 'form_input_masks']);
Route::get('form-file-uploads', [FormsController::class, 'form_file_uploads']);
Route::get('form-datetime-pickers', [FormsController::class, 'form_datetime_pickers']);
Route::get('form-color-pickers', [FormsController::class, 'form_color_pickers']);
Route::get('floating-labels', [FormsController::class, 'floating_labels']);
Route::get('form-layouts', [FormsController::class, 'form_layouts']);
Route::get('quill-editor', [FormsController::class, 'quill_editor']);
Route::get('form-validations', [FormsController::class, 'form_validations']);
Route::get('form-select2', [FormsController::class, 'form_select2']);

// ADVANCED UI //
Route::get('accordions-collapse', [AdvanceduiController::class, 'accordions_collapse']);
Route::get('carousel', [AdvanceduiController::class, 'carousel']);
Route::get('draggable-cards', [AdvanceduiController::class, 'draggable_cards']);
Route::get('modals-closes', [AdvanceduiController::class, 'modals_closes']);
Route::get('navbars', [AdvanceduiController::class, 'navbars']);
Route::get('offcanvas', [AdvanceduiController::class, 'offcanvas']);
Route::get('placeholders', [AdvanceduiController::class, 'placeholders']);
Route::get('ratings', [AdvanceduiController::class, 'ratings']);
Route::get('scrollspy', [AdvanceduiController::class, 'scrollspy']);
Route::get('swiperjs', [AdvanceduiController::class, 'swiperjs']);

// WIDGETS //
Route::get('widgets', [WidgetsController::class, 'widgets']);

// APPS //
Route::get('full-calendar', [AppsController::class, 'full_calendar']);
Route::get('gallery', [AppsController::class, 'gallery']);
Route::get('sweet-alerts', [AppsController::class, 'sweet_alerts']);
Route::get('projects-list', [AppsController::class, 'projects_list']);
Route::get('projects-overview', [AppsController::class, 'projects_overview']);
Route::get('projects-create', [AppsController::class, 'projects_create']);
Route::get('job-details', [AppsController::class, 'job_details']);
Route::get('job-company-search', [AppsController::class, 'job_company_search']);
Route::get('job-search', [AppsController::class, 'job_search']);
Route::get('job-post', [AppsController::class, 'job_post']);
Route::get('job-list', [AppsController::class, 'job_list']);
Route::get('job-candidate-search', [AppsController::class, 'job_candidate_search']);
Route::get('job-candidate-details', [AppsController::class, 'job_candidate_details']);
Route::get('nft-marketplace', [AppsController::class, 'nft_marketplace']);
Route::get('nft-details', [AppsController::class, 'nft_details']);
Route::get('nft-create', [AppsController::class, 'nft_create']);
Route::get('nft-wallet-integration', [AppsController::class, 'nft_wallet_integration']);
Route::get('nft-live-auction', [AppsController::class, 'nft_live_auction']);
Route::get('crm-contacts', [AppsController::class, 'crm_contacts']);
Route::get('crm-companies', [AppsController::class, 'crm_companies']);
Route::get('crm-deals', [AppsController::class, 'crm_deals']);
Route::get('crm-leads', [AppsController::class, 'crm_leads']);
Route::get('crypto-transactions', [AppsController::class, 'crypto_transactions']);
Route::get('crypto-currency-exchange', [AppsController::class, 'crypto_currency_exchange']);
Route::get('crypto-buy-sell', [AppsController::class, 'crypto_buy_sell']);
Route::get('crypto-marketcap', [AppsController::class, 'crypto_marketcap']);
Route::get('crypto-wallet', [AppsController::class, 'crypto_wallet']);

// TSBLES //
Route::get('tables', [TablesController::class, 'tables']);
Route::get('grid-tables', [TablesController::class, 'grid_tables']);
Route::get('data-tables', [TablesController::class, 'data_tables']);

// CHARTS //
Route::get('apex-line-charts', [ChartsController::class, 'apex_line_charts']);
Route::get('apex-area-charts', [ChartsController::class, 'apex_area_charts']);
Route::get('apex-column-charts', [ChartsController::class, 'apex_column_charts']);
Route::get('apex-bar-charts', [ChartsController::class, 'apex_bar_charts']);
Route::get('apex-mixed-charts', [ChartsController::class, 'apex_mixed_charts']);
Route::get('apex-rangearea-charts', [ChartsController::class, 'apex_rangearea_charts']);
Route::get('apex-timeline-charts', [ChartsController::class, 'apex_timeline_charts']);
Route::get('apex-candlestick-charts', [ChartsController::class, 'apex_candlestick_charts']);
Route::get('apex-boxplot-charts', [ChartsController::class, 'apex_boxplot_charts']);
Route::get('apex-bubble-charts', [ChartsController::class, 'apex_bubble_charts']);
Route::get('apex-scatter-charts', [ChartsController::class, 'apex_scatter_charts']);
Route::get('apex-heatmap-charts', [ChartsController::class, 'apex_heatmap_charts']);
Route::get('apex-treemap-charts', [ChartsController::class, 'apex_treemap_charts']);
Route::get('apex-pie-charts', [ChartsController::class, 'apex_pie_charts']);
Route::get('apex-radialbar-charts', [ChartsController::class, 'apex_radialbar_charts']);
Route::get('apex-radar-charts', [ChartsController::class, 'apex_radar_charts']);
Route::get('apex-polararea-charts', [ChartsController::class, 'apex_polararea_charts']);
Route::get('chartjs-charts', [ChartsController::class, 'chartjs_charts']);
Route::get('echarts', [ChartsController::class, 'echarts']);
Route::get('chartjs', [ChartsController::class, 'chartjs']);
Route::get('echartjs', [ChartsController::class, 'echartjs']);

// MAPS //
Route::get('google-maps', [MapsController::class, 'google_maps']);
Route::get('leaflet-maps', [MapsController::class, 'leaflet_maps']);
Route::get('vector-maps', [MapsController::class, 'vector_maps']);

// ICONS //
Route::get('icons', [IconsController::class, 'icons']);























// ALL NEW ROUTES

// AUTHENTICATION //
// Route::get('signin', [AuthenticationController::class, 'signin'])->middleware('guest')->name('signin');
Route::get('signup', [AuthenticationController::class, 'signup'])->middleware('guest');
Route::any('/signin_function', [AuthenticationController::class, 'signin_function'])->name('signin_function');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/notfound', [AuthenticationController::class, 'notfound'])->name('notfound')->middleware('auth_token');

// PRINT
Route::get('/print/{tranID}', [printController::class, 'print_invoice'])->name('print_invoice')->middleware('auth_token');


// PROFILE
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth_token');

Route::post('/jump', [JumpController::class, 'jump'])->name('jump')->middleware('auth_token');
// DASHBOARDS
Route::get('/', [AuthenticationController::class, 'signin'])->middleware('guest')->name('signin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth_token');

Route::get('/roles', [RoleController::class, 'role_list'])->name('roles')->middleware('auth_token');
Route::get('/account', [AccountController::class, 'account_list'])->name('account')->middleware('auth_token');

Route::get('/manager', [managerController::class, 'manager_list'])->name('manager')->middleware('auth_token');
Route::get('/manager/profile/{managername}', [AccountController::class, 'manager'])->name('manager_profile')->middleware('auth_token');
Route::get('/manager/add', [AccountController::class, 'manager_add'])->name('manager/add')->middleware('auth_token');
// Route::get('/manager/{id}', [AccountController::class, 'manager_list'])->name('manager')->middleware('auth_token');

Route::get('/admin', [AccountController::class, 'admin_list'])->name('admin')->middleware('auth_token');
Route::get('/franchise', [AccountController::class, 'franchise_list'])->name('franchise')->middleware('auth_token');
Route::get('/dealer', [AccountController::class, 'dealer_list'])->name('dealer')->middleware('auth_token');
Route::get('/subdealer', [AccountController::class, 'subdealer_list'])->name('subdealer')->middleware('auth_token');
Route::get('/juniordealer', [AccountController::class, 'juniordealer_list'])->name('juniordealer')->middleware('auth_token');


Route::get('/subscriber', [SubscriberController::class, 'subscribers'])->name('subscribers')->middleware('auth_token');
Route::get('/subscribers', [SubscriberController::class, 'subscribers'])->name('subscriberss')->middleware('auth_token');
Route::get('/subscriber_add', [SubscriberController::class, 'subscriber_add_page'])->name('subscriber_add')->middleware('auth_token');
Route::get('/subscriber_info/{username}', [SubscriberController::class, 'subscriber_info_page'])->name('subscriber_info')->middleware('auth_token');

Route::get('/subscriber/active/list', [SubscriberController::class, 'subscriber_active'])->name('subscriber_active')->middleware('auth_token');
Route::get('/subscriber/expire/list', [SubscriberController::class, 'subscriber_expire'])->name('subscriber_expire')->middleware('auth_token');
Route::get('/subscriber/upcomingexpire/list', [SubscriberController::class, 'subscriber_upcoming_expire'])->name('subscriber_upcoming_expire')->middleware('auth_token');


Route::get('/subscriber/online', [SubscriberController::class, 'subscriber_online'])->name('subscriber_online')->middleware('auth_token');
Route::get('/subscriber/online_ajax', [SubscriberController::class, 'subscriber_online_ajax'])->name('subscriber_online_ajax')->middleware('auth_token');
Route::get('/subscriber/onlinelist', [SubscriberController::class, 'subscriber_online_list'])->name('subscriber_online_list')->middleware('auth_token');

Route::get('/buglogs', [buglogsController::class, 'buglogs'])->name('buglogs')->middleware('auth_token');

//  NAS
Route::get('/nas', [NasController::class, 'nas_list'])->name('nas')->middleware('auth_token');
Route::get('/graph/{nas}/{username}', [NasController::class, 'graph'])->name('graph')->middleware('auth_token');

// POOL
Route::get('/pool', [PoolController::class, 'pool_list'])->name('pool')->middleware('auth_token');

// POLICY
Route::get('/policy', [PolicyController::class, 'policy_list'])->name('policy')->middleware('auth_token');
Route::get('/policy/grouplist/{id}', [PolicyController::class, 'group_list'])->name('group_list')->middleware('auth_token');

// SERVICE
Route::get('/service', [ServiceController::class, 'service_list'])->name('service')->middleware('auth_token');

// MODAL AJAX
Route::get('/update_nas_modal/{id}', [NasController::class, 'update_nas_modal'])->name('update_nas_modal')->middleware('auth_token');
Route::get('/update_pool_modal/{id}', [PoolController::class, 'update_pool_modal'])->name('update_pool_modal')->middleware('auth_token');
Route::get('/update_policy_modal/{id}', [PolicyController::class, 'update_policy_modal'])->name('update_policy_modal')->middleware('auth_token');
Route::get('/update_policy_group_modal/{id}', [PolicyController::class, 'update_policy_group_modal'])->name('update_policy_group_modal')->middleware('auth_token');
Route::get('/update_service_modal/{id}', [ServiceController::class, 'update_service_modal'])->name('update_service_modal')->middleware('auth_token');
Route::get('/refund_modal/{tranId}', [RechargeController::class, 'refund_modal'])->name('refund_modal');


// Reports
Route::get('/topup/invoices', [ReportsController::class, 'topupinvoice'])->name('topupinvoice')->middleware('auth_token');
Route::get('/commission/invoices', [ReportsController::class, 'commissioninvoice'])->name('commissioninvoice')->middleware('auth_token');
Route::get('/recharge/invoices', [ReportsController::class, 'rechargeinvoice'])->name('rechargeinvoice')->middleware('auth_token');
Route::get('/recharge/invoices/admin', [ReportsController::class, 'rechargeinvoiceadmin'])->name('rechargeinvoiceadmin')->middleware('auth_token');
Route::get('/wallet/ledger', [ReportsController::class, 'walletledger'])->name('walletledger')->middleware('auth_token');


Route::get('/setting', [SettingController::class, 'setting'])->name('setting')->middleware('auth_token');


Route::get('/import/checker', [ImportController::class, 'importchecker'])->name('importchecker')->middleware('auth_token');
Route::get('/export', [SubscriberController::class, 'exports'])->name('exports')->middleware('auth_token');



Route::get('/city', [LocationInfoController::class, 'city'])->name('city')->middleware('auth_token');
Route::get('/update_city/{id}', [LocationInfoController::class, 'update_city_modal'])->name('update_city_modal')->middleware('auth_token');
Route::get('/dplc', [LocationInfoController::class, 'dplc'])->name('dplc')->middleware('auth_token');
Route::get('/update_dplc/{id}', [LocationInfoController::class, 'update_dplc_modal'])->name('update_dplc_modal')->middleware('auth_token');


// LOCAL API CALLS
Route::any('/commission', [CommissionController::class, 'commission_dashboard'])->name('commission_dashboard')->middleware('auth_token');


// PAYMENT ONLINE list
Route::get('/1link', [OnlinePaymentController::class, 'onelinklist'])->name('onelinklist')->middleware('auth_token');
Route::get('/jazz', [OnlinePaymentController::class, 'jazzlist'])->name('jazzlist')->middleware('auth_token');


// jazzcash Merchant

Route::get('/portal', [OnlinePaymentController::class, 'portal'])->name('portal');
Route::get('/jazzcash/invoice/{username}/{password}', [OnlinePaymentController::class, 'jazzcash_merchant'])->name('jazzcash_merchant');
Route::get('/jazz/inv/{username}/{password}', [OnlinePaymentController::class, 'jazz_merchant_new'])->name('jazz_merchant_new');
Route::get('/jazzcashstatus/{status}', [OnlinePaymentController::class, 'jazzcash_merchant_status'])->name('jazzcash_merchant_status');
Route::post('/jazzcash_status', [OnlinePaymentController::class, 'jazzcash_merchant_form'])->name('jazzcash_merchant_form');



