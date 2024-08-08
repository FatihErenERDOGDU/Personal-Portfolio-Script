    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\CommunicationController;
    use App\Http\Controllers\AboutController;
    use App\Http\Controllers\SkillController;
    use App\Http\Controllers\AdminSkillController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\ExperienceController;

    /*
    |--------------------------------------------------------------------------
    | Front Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/', [ExperienceController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/communication', [CommunicationController::class, 'index'])->name('communication');
    Route::post('/communication/send', [CommunicationController::class, 'send'])->name('communication.send');
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/experience', [ExperienceController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Back Routes
    |--------------------------------------------------------------------------
    */

    // Giriş yapmamış kullanıcılar için login sayfaları
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
    });

    // Çıkış işlemi
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Middleware için uygun yönlendirmeleri içeren admin sayfaları
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/blog', [AdminController::class, 'blog'])->name('admin.blog');
        Route::get('/admin/about', [AdminController::class, 'about'])->name('admin.about');

        // Admin skills routes
        Route::get('/admin/skills', [AdminSkillController::class, 'index'])->name('admin.skills');
        Route::get('/admin/skills/create', [AdminSkillController::class, 'create'])->name('admin.skills.create');
        Route::post('/admin/skills', [AdminSkillController::class, 'store'])->name('admin.skills.store');
        Route::get('/admin/skills/{id}/edit', [AdminSkillController::class, 'edit'])->name('admin.skills.edit');
        Route::put('/admin/skills/{id}', [AdminSkillController::class, 'update'])->name('admin.skills.update');
        Route::delete('/admin/skills/{id}', [AdminSkillController::class, 'destroy'])->name('admin.skills.destroy');

        Route::get('/admin/contact', [CommunicationController::class, 'adminIndex'])->name('admin.contact');
    });

    // Yalnızca oturum açmış kullanıcılar için dashboard sayfası
    Route::get('/dashboard', function () {
        return view('layouts/dashboard');
    })->middleware('auth');

    // Admin contact message delete route
    Route::delete('/communication/{id}', [CommunicationController::class, 'destroy'])->name('communication.destroy');

    Route::post('/about', [AboutController::class, 'store'])->name('about.store');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');


    use App\Http\Controllers\AdminAboutController;

    Route::get('admin/about', [AdminAboutController::class, 'index'])->name('about.index');
    Route::post('admin/about', [AdminAboutController::class, 'store'])->name('about.store');


    Route::get('admin/about', [AdminAboutController::class, 'index'])->name('admin.about');
    Route::post('admin/about', [AdminAboutController::class, 'store'])->name('about.store');

    // Admin About Routes
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('about', [AdminAboutController::class, 'index'])->name('about');
        Route::post('about', [AdminAboutController::class, 'store'])->name('about.store');
    });
    use App\Http\Controllers\AdminBlogController;

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
        Route::post('/blog', [AdminBlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
    });


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
        Route::post('/blog', [AdminBlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
        Route::get('/about', [AdminController::class, 'about'])->name('about');
        Route::get('/skills', [AdminController::class, 'skills'])->name('skills');
        Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
    });
    Route::get('/admin/skills', [SkillsController::class, 'index'])->name('admin.skills');

    Route::get('/admin/contact', [CommunicationController::class, 'adminIndex'])->name('admin.contact');
    Route::delete('/admin/contact/{id}', [CommunicationController::class, 'destroy'])->name('admin.contact.destroy');

    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');


    Route::prefix('admin')->group(function() {
        Route::get('skills', [AdminSkillController::class, 'index'])->name('admin.skills.index');
        Route::get('skills/create', [AdminSkillController::class, 'create'])->name('admin.skills.create');
        Route::post('skills', [AdminSkillController::class, 'store'])->name('admin.skills.store');
        Route::get('skills/{id}/edit', [AdminSkillController::class, 'edit'])->name('admin.skills.edit');
        Route::put('skills/{id}', [AdminSkillController::class, 'update'])->name('admin.skills.update');
        Route::delete('skills/{id}', [AdminSkillController::class, 'destroy'])->name('admin.skills.destroy');
    });

    use App\Http\Controllers\SettingsController;

    Route::get('/admin/settings/header', [SettingsController::class, 'editHeader'])->name('admin.settings.header.edit');
    Route::post('/admin/settings/header', [SettingsController::class, 'updateHeader'])->name('admin.settings.header.update');


    Route::get('/admin/settings/header', [SettingsController::class, 'editHeader'])->name('admin.settings.header.edit');
    Route::post('/admin/settings/header', [SettingsController::class, 'updateHeader'])->name('admin.settings.header.update');

    use App\Http\Controllers\FooterController;

    Route::get('/admin/footer/edit', [FooterController::class, 'edit'])->name('admin.footer.edit');
    Route::post('/admin/footer/update', [FooterController::class, 'update'])->name('admin.footer.update');
    Route::get('/admin/footer/edit', [AdminController::class, 'editFooter'])->name('admin.settings.footer.edit');

    Route::get('/admin/footer/edit', [FooterController::class, 'edit'])->name('admin.footer.edit');
    Route::post('/admin/footer/update', [FooterController::class, 'update'])->name('admin.footer.update');

    use App\Http\Controllers\AdminPageController;

    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/pages', [AdminPageController::class, 'index'])->name('pages.index');
        Route::post('/pages', [AdminPageController::class, 'store'])->name('pages.store');
        Route::delete('/pages/{id}', [AdminPageController::class, 'destroy'])->name('pages.destroy');
    });

    // Admin sayfa yönetimi rotaları
    Route::resource('admin/pages', AdminPageController::class);


    Route::get('/admin/pages', [AdminPageController::class, 'index'])->name('admin.pages.index');
    Route::get('/admin/pages/create', [AdminPageController::class, 'create'])->name('admin.pages.create');
    Route::post('/admin/pages', [AdminPageController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/{id}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/admin/pages/{id}', [AdminPageController::class, 'update'])->name('admin.pages.update');
    Route::delete('/admin/pages/{id}', [AdminPageController::class, 'destroy'])->name('admin.pages.destroy');


    Route::get('/admin/pages/{id}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/admin/pages/{id}', [AdminPageController::class, 'update'])->name('admin.pages.update');

    Route::get('/admin/pages/create', [AdminPageController::class, 'create'])->name('admin.pages.create');
    Route::post('/admin/pages', [AdminPageController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/{id}/edit', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/admin/pages/{id}', [AdminPageController::class, 'update'])->name('admin.pages.update');

    use App\Http\Controllers\UserPageController;

    Route::get('/userpages', [App\Http\Controllers\UserPageController::class, 'index']);
    Route::get('/userpages', [UserPageController::class, 'index'])->name('userpages.index');

